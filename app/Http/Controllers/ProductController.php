<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function GetProductByType(Request $request)
    {
        $result = Product::select('products.*')
        ->join('product_type_details','product_type_details.id','products.product_type_details_id')
        ->where('product_type_details.id',$request['id'])
        ->get()->each(function ($q) {
            $image_type = substr($q->picture_path, -3);
            $image_format = '';
            if ($image_type == 'png' || $image_type == 'jpg') {
                $image_format = $image_type;
            }
            $base64str = '';
            $base64str = base64_encode(file_get_contents(public_path($q->picture_path)));
            $q->base64img = 'data:image/' . $image_format . ';base64,' . $base64str;
        });
        return $result;
    }

    public function index()
    {
        $Product = DB::table('products')
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
        return $Product;
    }

    public function store(Request $request)
    {
        $form = json_decode($request['data'], true);
        $file = $request->file('file');
        $file_name = $file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();
        $name = explode('.', $file_name)[0] . '-' . uniqid() . '.' . $ext;
        $name = str_replace(' ', '', $name);
        $file->move(public_path('products'), $name);

        $Product = new Product();
        $Product->store_id = $form['store_id'];
        $Product->name = $form['name'];
        $Product->price = $form['price'];
        $Product->stock = $form['stock'];
        $Product->picture_path = '/products/' . $name;
        $Product->save();
        return 'success';
    }

    public function show(string $id)
    {
        $userId = Auth::user()->id;
        $Product = DB::table('products')
            ->where('store_id', $id)
            ->whereNull('products.deleted_at')
            ->get()
            ->each(function ($q) use ($userId) {
                $image_type = substr($q->picture_path, -3);
                $image_format = '';
                if ($image_type == 'png' || $image_type == 'jpg') {
                    $image_format = $image_type;
                }
                $base64str = '';
                $base64str = base64_encode(file_get_contents(public_path($q->picture_path)));
                $q->base64img = 'data:image/' . $image_format . ';base64,' . $base64str;
                // Check if the product exists in cartItems by product_id
                $cartItem = Cart::where('product_id', $q->id)
                    ->where('user_id', $userId)
                    ->first();
                // If a matching product is found in cartItems, subtract cart item's quantity from stock
                if ($cartItem) {
                    $q->stock -= $cartItem->quantity;
                }
            });
        return $Product;
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $Product = Product::findOrFail($id);
        $Product->name = $request->input('name');
        $Product->price = $request->input('price');
        $Product->stock = $request->input('stock');
        $Product->save();

        return 'success';
    }

    public function destroy(string $id)
    {
        $Product = Product::findOrFail($id);
        if (!$Product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        $Product->delete();
        return 'success';
    }
}
