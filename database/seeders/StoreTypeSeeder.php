<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StoreType;

class StoreTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $StoreType = new StoreType();
        $StoreType->store_id = 1;
        $StoreType->store_type_details_id = 8;
        $StoreType->save();

        $StoreType = new StoreType();
        $StoreType->store_id = 2;
        $StoreType->store_type_details_id = 9;
        $StoreType->save();
    }
}
