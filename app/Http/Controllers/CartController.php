<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function AddCartProduct(Request $request)
    {
        $userId = Auth::user()->id;
        $productId = $request->input('product_id');
        // Check if there is an existing cart entry with the same product_id and user_id
        $existingCart = Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();
        if (!$existingCart) {
            // If no existing cart entry, create a new one
            $cart = new Cart();
            $cart->product_id = $productId;
            $cart->store_id = $request->input('store_id');
            $cart->quantity = $request->input('quantity');
            $cart->user_id = $userId;
            $cart->save();
            return response()->json(['message' => 'Added to cart successfully']);
        } else {
            // If an existing cart entry is found, increment the quantity
            $existingCart->quantity += $request->input('quantity');
            $existingCart->save();
            return response()->json(['message' => 'Quantity incremented in the cart']);
        }
    }

    public function IncreaseCartProduct(Request $request)
    {
        $userId = Auth::user()->id;
        $existingCart = Cart::where('user_id', $userId)
            ->where('product_id', $request['product_id'])
            ->first();
        $existingCart->quantity += 1;
        $existingCart->save();
        return response()->json(['message' => 'Quantity incremented in the cart']);
    }

    public function DecreaseCartProduct(Request $request)
    {
        $userId = Auth::user()->id;
        $existingCart = Cart::where('user_id', $userId)
            ->where('product_id', $request['product_id'])
            ->first();

        if ($existingCart) {
            $existingCart->quantity -= 1;

            if ($existingCart->quantity <= 0) {
                // If quantity is less than or equal to 0, delete the cart entry
                $existingCart->delete();
                return response()->json(['message' => 'Product removed from the cart']);
            } else {
                // If quantity is greater than 0, save the updated quantity
                $existingCart->save();
                return response()->json(['message' => 'Quantity decremented in the cart']);
            }
        } else {
            // Handle the case when the product does not exist in the cart
            return response()->json(['message' => 'Product not found in the cart']);
        }
    }


    public function RemoveCartProduct(Request $request)
    {
        $userId = Auth::user()->id;
        Cart::where('user_id', $userId)
            ->where('product_id', $request['product_id'])
            ->delete();
        return response()->json(['message' => 'Quantity incremented in the cart']);
    }


    public function GetCart(Request $request)
    {
        $userId = Auth::user()->id;
        $cartItems = Cart::where('carts.user_id', $userId)
            ->join('products', 'products.id', 'carts.product_id')
            ->join('stores', 'stores.id', 'carts.store_id')
            ->select('stores.id', 'stores.name as store_name', 'products.picture_path', 'products.price', 'products.name', 'products.id', 'products.id as product_id', 'products.stock', 'carts.quantity', 'carts.store_id')
            ->get()
            ->each(function ($q) {
                $image_type = substr($q->picture_path, -3);
                $image_format = '';
                if ($image_type == 'png' || $image_type == 'jpg') {
                    $image_format = $image_type;
                }
                $base64str = '';
                $base64str = base64_encode(file_get_contents(public_path($q->picture_path)));
                $q->base64img = 'data:image/' . $image_format . ';base64,' . $base64str;
            });

        foreach ($cartItems as $item) {
            $remainingStock = $item->stock - $item->quantity;
            $item->stock = $remainingStock;
        }

        return $cartItems;
    }
}
