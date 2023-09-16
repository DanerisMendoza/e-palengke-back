<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductTypeDetail as ProductTypeDetailModel;
class ProductTypeDetail extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ProductTypeDetail = new ProductTypeDetailModel();
        $ProductTypeDetail->name = 'raw food';
        $ProductTypeDetail->save();

        $ProductTypeDetail = new ProductTypeDetailModel();
        $ProductTypeDetail->name = 'vegetable';
        $ProductTypeDetail->save();
        
        $ProductTypeDetail = new ProductTypeDetailModel();
        $ProductTypeDetail->name = 'meat';
        $ProductTypeDetail->save();
     
        $ProductTypeDetail = new ProductTypeDetailModel();
        $ProductTypeDetail->name = 'school_supplies';
        $ProductTypeDetail->save();

        $ProductTypeDetail = new ProductTypeDetailModel();
        $ProductTypeDetail->name = 'hardware';
        $ProductTypeDetail->save();
    }
}
