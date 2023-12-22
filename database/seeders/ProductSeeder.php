<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Product = new Product();
        $Product->store_id = 1;
        $Product->name = "Grilled Chicken";
        $Product->price = "150";
        $Product->stock = 20;
        $Product->picture_path = '/products/chicken-655a9fb15ce7d.jpg';
        $Product->save();
   
        $Product = new Product();
        $Product->store_id = 1;
        $Product->name = "Grilled Liempo";
        $Product->price = "250";
        $Product->stock = 20;
        $Product->picture_path = '/products/liempo-655a9ff773348.jpg';
        $Product->save();
        
        $Product = new Product();
        $Product->store_id = 1;
        $Product->name = "Isaw";
        $Product->price = "10";
        $Product->stock = 15;
        $Product->picture_path = '/products/isaw-6580d05ce780e.jpg';
        $Product->save();
       
        $Product = new Product();
        $Product->store_id = 1;
        $Product->name = "Pork Barbecue";
        $Product->price = "20";
        $Product->stock = 15;
        $Product->picture_path = '/products/barbecue-657fc5fa03a9d.jpg';
        $Product->save();
        
        $Product = new Product();
        $Product->store_id = 2;
        $Product->name = "Milk Tea Original";
        $Product->price = "39";
        $Product->stock = 15;
        $Product->picture_path = '/products/milk-tea-655aa04f6c696.png';
        $Product->save();
        
        $Product = new Product();
        $Product->store_id = 2;
        $Product->name = "Milk Tea Matcha";
        $Product->price = "39";
        $Product->stock = 15;
        $Product->picture_path = '/products/milk-tea-matcha-657fc63f83ee0.png';
        $Product->save();
    }
}
