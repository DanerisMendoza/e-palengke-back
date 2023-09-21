<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StoreTypeDetail as StoreTypeDetailModel;
class StoreTypeDetail extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $StoreTypeDetail = new StoreTypeDetailModel();
        $StoreTypeDetail->name = 'Vegetable';
        $StoreTypeDetail->save();

        $StoreTypeDetail = new StoreTypeDetailModel();
        $StoreTypeDetail->name = 'Tea';
        $StoreTypeDetail->save();
        
        $StoreTypeDetail = new StoreTypeDetailModel();
        $StoreTypeDetail->name = 'Meat';
        $StoreTypeDetail->save();
     
        $StoreTypeDetail = new StoreTypeDetailModel();
        $StoreTypeDetail->name = 'Fish';
        $StoreTypeDetail->save();
     
        $StoreTypeDetail = new StoreTypeDetailModel();
        $StoreTypeDetail->name = 'Grilled';
        $StoreTypeDetail->save();
     
        $StoreTypeDetail = new StoreTypeDetailModel();
        $StoreTypeDetail->name = 'School Supplies';
        $StoreTypeDetail->save();

        $StoreTypeDetail = new StoreTypeDetailModel();
        $StoreTypeDetail->name = 'Hardware';
        $StoreTypeDetail->save();
      
        $StoreTypeDetail = new StoreTypeDetailModel();
        $StoreTypeDetail->name = 'others';
        $StoreTypeDetail->save();
    }
}
