<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\UserDetail;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function ORDER(Request $request)
    {
        $data = $request->all();
        $length = count($data);
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
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->where('users.id', '=', $userId)
            ->select('users.username', 'users.id as user_id', 'user_details.*')
            ->first();

        if ($userDetail->balance < $total) {
            return 'insufficient balance';
        }

        $Order = new Order();
        $Order->user_id = $userId;
        $Order->status = $data['status'];
        $Order->total = $data['total'];
        $Order->save();

        $orderDetailsArr = $data['cart'];
        foreach ($orderDetailsArr as $order_details) {
            $OrderDetail = new OrderDetail();
            $OrderDetail->order_id = $Order->id;
            $OrderDetail->product_id = $order_details['product_id'];
            $OrderDetail->store_id = $order_details['store_id'];
            $OrderDetail->quantity = $order_details['quantity'];
            $OrderDetail->status = 'pending';
            $OrderDetail->save();
        }
        foreach ($orderDetailsArr as $order_details) {
            $Product = Product::where('id', $order_details['product_id'])->first();
            $Product->stock -= $order_details['quantity'];
            $Product->save();
        }
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
                //customer
                ->when($request->input('mode') == 'customer', function ($q) use($userId){
                    $q->join('stores', 'stores.id', 'order_details.store_id')
                    ->select(
                        'orders.status',
                        'orders.id as order_id',
                        'order_details.store_id',
                        'orders.created_at',
                        'stores.name',
                    )
                    ->where('orders.user_id', $userId)
                    ->groupBy('orders.created_at', 'order_details.store_id', 'orders.status', 'orders.id', 'stores.name');
                })
                //store
                ->when($request->input('mode') == 'store', function ($q) use($store_id){
                    $q->join('user_details', 'user_details.user_id', 'orders.user_id')
                    ->where('order_details.store_id', $store_id)
                    ->distinct('orders.id')
                    ->select(
                        'user_details.name as customer_name',
                        'orders.id as order_id', 
                        'orders.status', 
                        'orders.created_at', 
                        'order_details.store_id'
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


    public function AcceptOrder(Request $request)
    {

        // $UserDetail = UserDetail::where('user_id', $userId)->first();
        // $UserDetail->balance = $UserDetail->balance - $Order->total;
        // $UserDetail->save();
    }

    public function CANCEL_ORDER(Request $request)
    {
        $order = DB::table('order_details')
            ->where('order_id', $request['item']['order_id'])
            ->where('store_id', $request['item']['store_id'])
            ->where('status', 'pending')
            ->delete();
        if ($order) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function CANCEL_ORDER_DETAIL(Request $request)
    {
        $order = DB::table('order_details')
            ->where('id', $request['item']['order_detail_id'])
            ->where('status', 'pending')
            ->delete();
        if ($order) {
            return 'success';
        } else {
            return 'fail';
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
