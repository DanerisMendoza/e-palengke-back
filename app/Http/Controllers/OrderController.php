<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function Order(Request $request){
        $data = $request->all();
        $length = count($data); 
        
        $userId = Auth::user()->id;
        $cartItems = Cart::where('carts.user_id', $userId)
            ->join('products', 'products.id', 'carts.product_id')
            ->select('products.price','products.name','products.id', 'products.id as product_id', 'products.stock', 'carts.quantity')
            ->get();
    
        foreach ($cartItems as $item) {
            $remainingStock = $item->stock - $item->quantity;
            $item->stock = $remainingStock;
            if($remainingStock < 0){
                return 'invalid';
            }
        }


        

        return 'success';
    }
    // public function GetOrders(Request $request){
    //     \Log::info($request);
    // }
}
