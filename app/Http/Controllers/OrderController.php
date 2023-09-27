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

        //validation through server side not yet implemented
        // $userDetail = DB::table('users')
        //     ->join('user_details', 'users.id', '=', 'user_details.user_id')
        //     ->where('users.id', '=', $userId)
        //     ->select('users.username','users.id as user_id', 'user_details.*')
        //     ->first();

        $cartItems = Cart::where('carts.user_id', $userId)
            ->join('products', 'products.id', 'carts.product_id')
            ->select('products.price', 'products.name', 'products.id', 'products.id as product_id', 'products.stock', 'carts.quantity')
            ->get();

        foreach ($cartItems as $item) {
            $remainingStock = $item->stock - $item->quantity;
            $item->stock = $remainingStock;
            if ($remainingStock < 0) {
                return 'invalid';
            }
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
            $Product = Product::where('id',$order_details['product_id'])->first();
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
    // public function GetOrders(Request $request){
    //     \Log::info($request);
    // }
}
