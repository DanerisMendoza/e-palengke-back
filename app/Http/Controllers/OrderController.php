<?php

namespace App\Http\Controllers;

use App\Events\OrderEvent;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Transaction;
use App\Models\Product;
use App\Models\Cart;
use App\Models\UserDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function ORDER(Request $request)
    {
        $userId = Auth::user()->id;
        $cartItems = Cart::where('carts.user_id', $userId)
            ->join('products', 'products.id', 'carts.product_id')
            ->select('products.price', 'products.name', 'products.id', 'products.id as product_id', 'products.stock', 'carts.quantity')
            ->get();

        $total = 0;
        foreach ($cartItems as $item) {
            $remainingStock = $item->stock - $item->quantity;
            $item->stock = $remainingStock;
            if ($remainingStock < 0) {
                return 'invalid';
            }
            $total += ($item['price'] * $item['quantity']);
        }

        $userDetail = DB::table('users')
            ->join('user_details', 'users.id', 'user_details.user_id')
            ->where('users.id',  $userId)
            ->select('users.username', 'users.id as user_id', 'user_details.*')
            ->first();

        if ($userDetail->balance < $total) {
            return 'insufficient balance';
        }

        $Transaction = new Transaction();
        $Transaction->user_id = $userId;
        $Transaction->status = 'Pending';
        $Transaction->save();

        $groupedCart = collect($request['cart'])->groupBy('store_id')->toArray();
        foreach ($groupedCart as $storeOrders) {
            $total = 0;
            foreach ($storeOrders as $OrderDetailInput) {
                $total += $OrderDetailInput['price'];
            }
            $Order = new Order();
            $Order->user_id = $userId;
            $Order->transaction_id = $Transaction->id;
            $Order->store_id = $storeOrders[0]['store_id'];
            $Order->total = $total;
            $Order->status = 'Pending';
            $Order->save();

            $UserDetail = UserDetail::where('user_id', $userId)->first();
            $UserDetail->balance = $UserDetail->balance - $Order->total;
            $UserDetail->save();

            foreach ($storeOrders as $OrderDetailInput) {
                $OrderDetail = new OrderDetail();
                $OrderDetail->order_id = $Order->id;
                $OrderDetail->product_id = $OrderDetailInput['product_id'];
                $OrderDetail->store_id = $OrderDetailInput['store_id'];
                $OrderDetail->quantity = $OrderDetailInput['quantity'];
                $OrderDetail->status = 'Pending';
                $OrderDetail->save();

                $Product = Product::where('id', $OrderDetailInput['product_id'])->first();
                $Product->stock -= $OrderDetailInput['quantity'];
                $Product->save();
                $product = Product::find($OrderDetailInput['product_id']);
                //alert store owner that there is new order
                $ownerDetails = $product->ownerDetails()->first();
                broadcast(new OrderEvent($ownerDetails->user_id));
            }
        }
        //alert also the customer
        broadcast(new OrderEvent($userId));

        $cartItems = Cart::where('carts.user_id', $userId);
        $cartItems->delete();
        return 'success';
    }

    public function GET_ORDERS(Request $request)
    {
        $store_id = $request->input('store_id');
        $userId = Auth::user()->id;
        if (!!$request->input('mode')) {
            $order = DB::table('orders')
                ->join('order_details', 'order_details.order_id', 'orders.id')
                ->join('transactions', 'transactions.id', 'orders.transaction_id')
                //customer
                ->when($request->input('mode') == 'customer', function ($q) use ($userId) {
                    $q->join('stores', 'stores.id', 'order_details.store_id')
                        ->select(
                            'orders.status',
                            'orders.id as order_id',
                            'order_details.store_id',
                            'orders.created_at',
                            'stores.name',
                            'transactions.id as transaction_id',
                        )
                        ->where('orders.user_id', $userId)
                        ->groupBy('orders.created_at', 'order_details.store_id', 'orders.status', 'orders.id', 'stores.name', 'transactions.id');
                })
                //store
                ->when($request->input('mode') == 'store', function ($q) use ($store_id) {
                    $q->join('user_details', 'user_details.user_id', 'orders.user_id')
                        ->where('order_details.store_id', $store_id)
                        ->distinct('orders.id')
                        ->select(
                            'user_details.id as customer_id',
                            DB::raw("CONCAT_WS(' ', user_details.first_name, user_details.middle_name, user_details.last_name) as customer_name"),
                            'orders.id as order_id',
                            'orders.status',
                            'orders.created_at',
                            'order_details.store_id',
                            'transactions.id as transaction_id',
                            'transactions.status as transactions_status'
                        );
                })
                ->get()
                ->each(function ($q) {
                    $q->order_details = OrderDetail::where('order_id', $q->order_id)
                        ->join('products', 'products.id', 'order_details.product_id')
                        ->join('stores', 'stores.id', 'order_details.store_id')
                        ->where('stores.id', $q->store_id)
                        ->select('stores.address', 'stores.name as store_name', 'order_details.id as order_detail_id', 'order_details.quantity', 'order_details.status', 'products.name', 'products.price')
                        ->get();
                    $total = 0;
                    foreach ($q->order_details as $item) {
                        $total += ($item->price * $item->quantity);
                    }
                    $q->total = $total;
                });
            return $order;
        }
    }


    public function ACCEPT_ORDER(Request $request)
    {
        $Order = Order::find($request['order_id']);
        if ($Order) {
            $Order->update(['status' => 'Preparing']);
            broadcast(new OrderEvent($Order->user_id));
            return 'success';
        }
    }

    public function ORDER_TO_SHIP(Request $request)
    {
        $Order = Order::find($request['order_id']);
        if ($Order) {
            $Order->update(['status' => 'To Ship']);
            broadcast(new OrderEvent($Order->user_id));
            return 'success';
        }
    }

    public function CANCEL_ORDER(Request $request)
    {
        $userId = Auth::user()->id;
        $Order = DB::table('orders')
            ->where('id', $request['order_id'])
            ->where('status', 'Pending')
            ->first();
        $UserDetail = UserDetail::where('user_id', $userId)->first();
        $UserDetail->balance = $UserDetail->balance + $Order->total;
        $UserDetail->save();
        $order = DB::table('orders')
            ->where('id', $request['order_id'])
            ->where('status', 'Pending')
            ->delete();
        if ($order) {
            DB::table('order_details')
                ->where('order_id', $request['order_id'])
                ->delete();
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function DECLINE_ORDER(Request $request)
    {
        $userId = $request['customer_id'];
        $Order = DB::table('orders')
            ->where('id', $request['order_id'])
            ->where('status', 'Pending')
            ->first();
        $UserDetail = UserDetail::where('user_id', $userId)->first();
        $UserDetail->balance = $UserDetail->balance + $Order->total;
        $UserDetail->save();
        $order = DB::table('orders')
            ->where('id', $request['order_id'])
            ->where('status', 'Pending')
            ->delete();
        if ($order) {
            DB::table('order_details')
                ->where('order_id', $request['order_id'])
                ->delete();
            broadcast(new OrderEvent($Order->user_id));
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function CANCEL_ORDER_DETAIL(Request $request)
    {
        $userId = Auth::user()->id;
        $UserDetail = UserDetail::where('user_id', $userId)->first();
        $UserDetail->balance = $UserDetail->balance + $request['item']['price'];
        $UserDetail->save();
        $order_details = DB::table('order_details')
            ->where('id', $request['item']['order_detail_id'])
            ->where('status', 'Pending')
            ->delete();
        if ($order_details) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function FIND_ORDER_WITHIN_RADIUS(Request $request)
    {
        $user_id = $request['user_id'];
        $latitude = $request['latitude'];
        $longitude = $request['longitude'];
        $radiusInMeters = $request['radius'];
        $declinedTransactions = $request['declinedTransactions'];
        $radiusInKm = ($radiusInMeters + 1) / 1000;

        if (count($declinedTransactions) != 0) {
            $transactions = DB::table('transactions')->where('id', $declinedTransactions[count($declinedTransactions) - 1]);
            if ($transactions) {
                $transactions->update(['delivery_id' => null]);
            }
        }

        $result = DB::table('transactions')
            ->join('user_roles', 'user_roles.user_id', 'transactions.user_id')
            ->join('customer_locations', 'customer_locations.user_role_id', 'user_roles.id')
            ->join('user_details', 'user_details.user_id', 'user_roles.user_id')
            ->select(
                DB::raw("CONCAT_WS(' ', user_details.first_name, user_details.middle_name, user_details.last_name) as customer_name"),
                'user_details.phone_number',
                'transactions.status',
                'user_details.address as customer_address',
                'transactions.id as transaction_id',
                'customer_locations.latitude',
                'customer_locations.longitude'
            )
            ->selectRaw('(6371 * acos(cos(radians(?)) * cos(radians(customer_locations.latitude)) * cos(radians(customer_locations.longitude) - radians(?)) + sin(radians(?)) * sin(radians(customer_locations.latitude)))) AS distance', [$latitude, $longitude, $latitude])
            ->having('distance', '<', $radiusInKm)
            ->whereNull('transactions.delivery_id')
            ->orderBy('transactions.id', 'asc')
            ->when(count($declinedTransactions) != 0, function ($q) use ($declinedTransactions) {
                $q->whereNotIn('transactions.id', $declinedTransactions);
            })
            ->get()
            ->each(function ($q) {
                $q->orders = DB::table('orders')
                    ->join('stores', 'stores.id', 'orders.store_id')
                    ->select('orders.status', 'orders.transaction_id', 'orders.id as order_id', 'stores.name', 'stores.latitude', 'stores.longitude', 'stores.address')
                    ->where('orders.transaction_id', $q->transaction_id)
                    ->get()
                    ->each(function ($q2) {
                        $q2->order_details = DB::table('order_details')
                            ->join('products', 'products.id', 'order_details.product_id')
                            ->where('order_details.order_id', $q2->order_id)
                            ->select('products.name', 'products.price', 'order_details.quantity')
                            ->get();
                    });
            })
            ->reject(function ($transaction) {
                // Reject transactions where any order has a status other than 'To Ship'
                return $transaction->orders->isEmpty() || $transaction->orders->contains('status', '!=', 'To Ship');
            });

        if ($result->isNotEmpty()) {
            $firstResult = $result[0];
            $transactions = DB::table('transactions')->where('id', $firstResult->transaction_id);
            if ($transactions) {
                $transactions->update(['delivery_id' => $user_id]);
            }
        }
        return $result;
    }

    public function GET_IN_PROGRESS_TRANSACTION(Request $request)
    {
        $result = DB::table('transactions')
            ->join('user_roles', 'user_roles.user_id', 'transactions.user_id')
            ->join('customer_locations', 'customer_locations.user_role_id', 'user_roles.id')
            ->join('user_details', 'user_details.user_id', 'user_roles.user_id')
            ->where('transactions.delivery_id', $request['user_id'])
            ->where(function ($query) {
                $query->where('transactions.status', 'To Pickup')
                    ->orWhere('transactions.status', 'Picked up');
            })
            ->select(
                DB::raw("CONCAT_WS(' ', user_details.first_name, user_details.middle_name, user_details.last_name) as customer_name"),
                'user_details.phone_number',
                'user_details.address as customer_address',
                'transactions.status',
                'transactions.id as transaction_id',
                'customer_locations.latitude',
                'customer_locations.longitude'
            )
            ->get()
            ->each(function ($q) {
                $q->orders = DB::table('orders')
                    ->join('stores', 'stores.id', 'orders.store_id')
                    ->select('orders.status', 'orders.transaction_id', 'orders.id as order_id', 'stores.name', 'stores.latitude', 'stores.longitude', 'stores.address')
                    ->where('orders.transaction_id', $q->transaction_id)
                    ->get()
                    ->each(function ($q2) {
                        $q2->order_details = DB::table('order_details')
                            ->join('products', 'products.id', 'order_details.product_id')
                            ->where('order_details.order_id', $q2->order_id)
                            ->select('products.name', 'products.price', 'order_details.quantity')
                            ->get();
                    });
            });
        if ($result) {
            return $result;
        }
    }

    public function GET_TRANSACTION_BY_ID(Request $request)
    {
        $result = DB::table('transactions')
            ->join('user_details', 'user_details.user_id', 'transactions.delivery_id')
            ->where('transactions.id', $request['transaction_id'])
            ->select(
                DB::raw("CONCAT_WS(' ', user_details.first_name, user_details.middle_name, user_details.last_name) as delivery_name"),
                'user_details.phone_number',
                'transactions.status',
                'transactions.id as transaction_id'
            )
            ->first();
        if ($result) {
            return $result;
        }
    }

    public function DROP_OFF(Request $request)
    {
        $result = DB::table('transactions')
            ->where('id', $request['transaction_id']);
        if ($result) {
            $result->update(['status' => 'Dropped off']);
            return 'success';
        }
    }

    public function PICKUP_ORDERS(Request $request)
    {
        $result = DB::table('transactions')
            ->where('id', $request['transaction_id'])
            ->where('transactions.status', 'To Pickup');
        if ($result) {
            $result->update(['status' => 'Picked up']);
            $result = DB::table('orders')
                ->where('transaction_id', $request['transaction_id'])
                ->update(['status' => 'To Receive']);
            return 'success';
        }
    }

    public function ACCEPT_TRANSACTION(Request $request)
    {
        $result = DB::table('transactions')
            ->where('id', $request['transaction_id'])
            ->where('delivery_id', $request['user_id']);
        if ($result) {
            $result->update(['delivery_id' =>  $request['user_id'], 'status' => 'To Pickup']);
        }
    }

    public function REMOVE_TRANSACTION_DELIVERY_ID(Request $request)
    {
        $result = DB::table('transactions')
            ->where('id', $request['transaction_id'])
            ->where('delivery_id', $request['user_id'])
            ->where('status', 'Pending');
        if ($result) {
            $result->update(['delivery_id' => null]);
        }
    }

    public function GET_ORDER_DETAILS(Request $request)
    {
        $result = DB::table('order_details')
            ->join('products', 'products.id', 'order_details.product_id')
            ->join('stores', 'stores.id', 'order_details.store_id')
            ->where('order_details.order_id', $request['order_id'])
            ->where('order_details.store_id', $request['store_id'])
            ->select('stores.name as store_name', 'stores.address', 'order_details.id as order_detail_id', 'order_details.quantity', 'order_details.status', 'products.name', 'products.price')
            ->get();
        return $result;
    }
}
