<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CustomerLocation as CustomerLocationModel;

class CustomerLocation extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $CustomerLocation = new CustomerLocationModel();
        $CustomerLocation->user_role_id = 1;
        $CustomerLocation->address = "Caloocan City";
        $CustomerLocation->latitude = "14.653740";
        $CustomerLocation->longitude = "120.966773";
        $CustomerLocation->save();

    }
}