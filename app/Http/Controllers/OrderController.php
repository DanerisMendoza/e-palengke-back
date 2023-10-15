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
    public function Order(Request $request)
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
            $OrderDetail->save();
        }
        foreach ($orderDetailsArr as $order_details) {
            $Product = Product::where('id', $order_details['product_id'])->first();
            $Product->stock -= $order_details['quantity'];
            $Product->save();
        }
        $cartItems = Cart::where('carts.user_id', $userId);
        $cartItems->delete();

        $UserDetail = UserDetail::where('user_id', $userId)->first();
        $UserDetail->balance = $UserDetail->balance - $Order->total;
        $UserDetail->save();
        return 'success';
    }

    public function GetOrdersByStoreId(String $id)
    {
        $Order = Order::join('order_details', 'order_details.order_id', 'orders.id')
            ->where('order_details.store_id', $id)
            ->distinct('orders.id')
            ->join('user_details', 'user_details.user_id', 'orders.user_id')
            ->select('user_details.name as customer_name', 'orders.id', 'orders.status', 'orders.created_at')
            ->get()
            ->each(function ($q) use ($id) {
                $q->order_details = OrderDetail::where('order_id', $q->id)
                    ->where('order_details.store_id', $id)
                    ->join('products', 'products.id', 'order_details.product_id')
                    ->select('order_details.quantity', 'products.name', 'products.price')
                    ->get();
                $total = 0;
                foreach ($q->order_details as $item) {
                    $total += ($item->price * $item->quantity);
                }
                $q->total = $total;
            });
        return $Order;
    }

    public function GetOrdersByUserId(){
        $userId = Auth::user()->id;
        $Order = Order::where('user_id',$userId)
        ->get()
        ->each(function ($q){
            $q->order_details = OrderDetail::where('order_id', $q->id) 
            ->join('products', 'products.id', 'order_details.product_id')
            ->join('stores', 'stores.id', 'order_details.store_id')
            ->select('stores.address','stores.name as store_name','order_details.quantity', 'products.name', 'products.price')
            ->get();
        });
        return $Order;
    }
}