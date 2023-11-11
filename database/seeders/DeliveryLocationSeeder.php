<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DeliveryLocation;

class DeliveryLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $DeliveryLocation = new DeliveryLocation();
        $DeliveryLocation->user_role_id = 8;
        $DeliveryLocation->latitude = "14.654079050511994";
        $DeliveryLocation->longitude = "120.96585631370546";
        $DeliveryLocation->save();
    }
}
