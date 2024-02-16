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
        $StoreTypeDetail->name = 'Grocery';
        $StoreTypeDetail->save();

        $StoreTypeDetail = new StoreTypeDetailModel();
        $StoreTypeDetail->name = 'Clothing';
        $StoreTypeDetail->save();
        
        $StoreTypeDetail = new StoreTypeDetailModel();
        $StoreTypeDetail->name = 'Electronics';
        $StoreTypeDetail->save();
     
        $StoreTypeDetail = new StoreTypeDetailModel();
        $StoreTypeDetail->name = 'Bookstore';
        $StoreTypeDetail->save();
     
        $StoreTypeDetail = new StoreTypeDetailModel();
        $StoreTypeDetail->name = 'Hardware';
        $StoreTypeDetail->save();
     
        $StoreTypeDetail = new StoreTypeDetailModel();
        $StoreTypeDetail->name = 'Pharmacy';
        $StoreTypeDetail->save();

        $StoreTypeDetail = new StoreTypeDetailModel();
        $StoreTypeDetail->name = 'Department';
        $StoreTypeDetail->save();

        $StoreTypeDetail = new StoreTypeDetailModel();
        $StoreTypeDetail->name = 'Street Food';
        $StoreTypeDetail->save();

        $StoreTypeDetail = new StoreTypeDetailModel();
        $StoreTypeDetail->name = 'Milk Tea';
        $StoreTypeDetail->save();
      
        $StoreTypeDetail = new StoreTypeDetailModel();
        $StoreTypeDetail->name = 'Others';
        $StoreTypeDetail->save();
    }
}
