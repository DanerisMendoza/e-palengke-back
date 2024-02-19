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
        $Product->product_type_details_id = 4;
        $Product->name = "Grilled Chicken";
        $Product->price = "150";
        $Product->stock = 20;
        $Product->picture_path = '/products/chicken-655a9fb15ce7d.jpg';
        $Product->save();
   
        $Product = new Product();
        $Product->store_id = 1;
        $Product->product_type_details_id = 4;
        $Product->name = "Grilled Liempo";
        $Product->price = "250";
        $Product->stock = 20;
        $Product->picture_path = '/products/liempo-655a9ff773348.jpg';
        $Product->save();
        
        $Product = new Product();
        $Product->store_id = 1;
        $Product->product_type_details_id = 4;
        $Product->name = "Isaw";
        $Product->price = "10";
        $Product->stock = 15;
        $Product->picture_path = '/products/isaw-6580d05ce780e.jpg';
        $Product->save();
       
        $Product = new Product();
        $Product->store_id = 1;
        $Product->product_type_details_id = 4;
        $Product->name = "Pork Barbecue";
        $Product->price = "20";
        $Product->stock = 15;
        $Product->picture_path = '/products/barbecue-657fc5fa03a9d.jpg';
        $Product->save();
        
        $Product = new Product();
        $Product->store_id = 2;
        $Product->product_type_details_id = 3;
        $Product->name = "Milk Tea Original";
        $Product->price = "39";
        $Product->stock = 15;
        $Product->picture_path = '/products/milk-tea-655aa04f6c696.png';
        $Product->save();
        
        $Product = new Product();
        $Product->store_id = 2;
        $Product->product_type_details_id = 3;
        $Product->name = "Milk Tea Matcha";
        $Product->price = "39";
        $Product->stock = 15;
        $Product->picture_path = '/products/milk-tea-matcha-657fc63f83ee0.png';
        $Product->save();
        
        $Product = new Product();
        $Product->store_id = 3;
        $Product->product_type_details_id = 6;
        $Product->name = "Hammer";
        $Product->price = "180";
        $Product->stock = 15;
        $Product->picture_path = '/products/hammer-5b7b94004ee527.1342253915348254723232.png';
        $Product->save();
        
        $Product = new Product();
        $Product->store_id = 3;
        $Product->product_type_details_id = 6;
        $Product->name = "Pliers";
        $Product->price = "150";
        $Product->stock = 15;
        $Product->picture_path = '/products/pliers-80560122151377484609082214.png';
        $Product->save();
        
        $Product = new Product();
        $Product->store_id = 4;
        $Product->product_type_details_id = 7;
        $Product->name = "Hotdog";
        $Product->price = "15";
        $Product->stock = 15;
        $Product->picture_path = '/products/hotdog-aslkdjaslkdj65as4d026098as7d897.png';
        $Product->save();
        
        $Product = new Product();
        $Product->store_id = 4;
        $Product->product_type_details_id = 7;
        $Product->name = "Fishball";
        $Product->price = "10";
        $Product->stock = 15;
        $Product->picture_path = '/products/fishball-5asd5as4d6sa54d68as7d498z321.png';
        $Product->save();
        
        $Product = new Product();
        $Product->store_id = 5;
        $Product->product_type_details_id = 5;
        $Product->name = "Earphone";
        $Product->price = "10";
        $Product->stock = 15;
        $Product->picture_path = '/products/earphone-aslkdjasd687as987d0asd687.png';
        $Product->save();
        
        $Product = new Product();
        $Product->store_id = 5;
        $Product->product_type_details_id = 5;
        $Product->name = "Speaker";
        $Product->price = "10";
        $Product->stock = 15;
        $Product->picture_path = '/products/speaker-as60d4as687d.png';
        $Product->save();
    }
}
