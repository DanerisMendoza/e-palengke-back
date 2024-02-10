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
        $ProductTypeDetail->pic_path = '/product_type_thumbnail/vegetable.png';
        $ProductTypeDetail->save();
        
        $ProductTypeDetail = new ProductTypeDetailModel();
        $ProductTypeDetail->name = 'Meat';
        $ProductTypeDetail->pic_path = '/product_type_thumbnail/meat.png';
        $ProductTypeDetail->save();

        $ProductTypeDetail = new ProductTypeDetailModel();
        $ProductTypeDetail->name = 'Milk Tea';
        $ProductTypeDetail->pic_path = '/product_type_thumbnail/milk-tea.png';
        $ProductTypeDetail->save();
        
        $ProductTypeDetail = new ProductTypeDetailModel();
        $ProductTypeDetail->name = 'Grilled Foods';
        $ProductTypeDetail->pic_path = '/product_type_thumbnail/grilled-foods.png';
        $ProductTypeDetail->save();
    }
}
