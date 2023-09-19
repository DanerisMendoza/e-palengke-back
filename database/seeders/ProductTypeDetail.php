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
        $ProductTypeDetail->name = 'Vegetable';
        $ProductTypeDetail->save();
        
        $ProductTypeDetail = new ProductTypeDetailModel();
        $ProductTypeDetail->name = 'Meat';
        $ProductTypeDetail->save();

        $ProductTypeDetail = new ProductTypeDetailModel();
        $ProductTypeDetail->name = 'Tea';
        $ProductTypeDetail->save();
        
        $ProductTypeDetail = new ProductTypeDetailModel();
        $ProductTypeDetail->name = 'Grilled Foods';
        $ProductTypeDetail->save();
    }
}
