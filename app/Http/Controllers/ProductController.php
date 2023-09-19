<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
   
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
        return;
    }

    public function update(Request $request, string $id)
    {
   
    }

    public function destroy(string $id)
    {
   
    }
}
