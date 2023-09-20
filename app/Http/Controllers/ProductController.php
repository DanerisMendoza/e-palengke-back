<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $Product = DB::table('products')
        ->get()
        ->each(function ($q){
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
        $Product = DB::table('products')
        ->where('store_id',$id)
        ->get()
        ->each(function ($q){
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

    public function update(Request $request, string $id)
    {
   
    }

    public function destroy(string $id)
    {
        $Product = Product::findOrFail($id);
        $Product->delete();
        return 'success';
    }
}
