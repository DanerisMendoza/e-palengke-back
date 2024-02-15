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
        $StoreTypeDetail->name = 'Grocery Store';
        $StoreTypeDetail->save();

        $StoreTypeDetail = new StoreTypeDetailModel();
        $StoreTypeDetail->name = 'Clothing Store';
        $StoreTypeDetail->save();
        
        $StoreTypeDetail = new StoreTypeDetailModel();
        $StoreTypeDetail->name = 'Electronics Store';
        $StoreTypeDetail->save();
     
        $StoreTypeDetail = new StoreTypeDetailModel();
        $StoreTypeDetail->name = 'Bookstore';
        $StoreTypeDetail->save();
     
        $StoreTypeDetail = new StoreTypeDetailModel();
        $StoreTypeDetail->name = 'Hardware Store';
        $StoreTypeDetail->save();
     
        $StoreTypeDetail = new StoreTypeDetailModel();
        $StoreTypeDetail->name = 'Pharmacy';
        $StoreTypeDetail->save();

        $StoreTypeDetail = new StoreTypeDetailModel();
        $StoreTypeDetail->name = 'Department Store';
        $StoreTypeDetail->save();

        $StoreTypeDetail = new StoreTypeDetailModel();
        $StoreTypeDetail->name = 'Street Food Store';
        $StoreTypeDetail->save();

        $StoreTypeDetail = new StoreTypeDetailModel();
        $StoreTypeDetail->name = 'Milk Tea Store';
        $StoreTypeDetail->save();
      
        $StoreTypeDetail = new StoreTypeDetailModel();
        $StoreTypeDetail->name = 'others';
        $StoreTypeDetail->save();
    }
}
