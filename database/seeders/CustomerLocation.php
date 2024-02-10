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
        $CustomerLocation->user_role_id = 2;
        $CustomerLocation->address = "Caloocan City";
        $CustomerLocation->latitude = "14.654068670675915";
        $CustomerLocation->longitude = "120.96623718738557";
        $CustomerLocation->save();
    
        $CustomerLocation = new CustomerLocationModel();
        $CustomerLocation->user_role_id = 4;
        $CustomerLocation->address = "Caloocan City";
        $CustomerLocation->latitude = "14.650316327715203";
        $CustomerLocation->longitude = "120.96766948699953";
        $CustomerLocation->save();
 
        $CustomerLocation = new CustomerLocationModel();
        $CustomerLocation->user_role_id = 7;
        $CustomerLocation->address = "Caloocan City";
        $CustomerLocation->latitude = "14.654079050511994";
        $CustomerLocation->longitude = "120.96585631370546";
        $CustomerLocation->save();

        $CustomerLocation = new CustomerLocationModel();
        $CustomerLocation->user_role_id = 6;
        $CustomerLocation->address = "Caloocan City";
        $CustomerLocation->latitude = "14.653740";
        $CustomerLocation->longitude = "120.966773";
        $CustomerLocation->save();

        $CustomerLocation = new CustomerLocationModel();
        $CustomerLocation->user_role_id = 9;
        $CustomerLocation->address = "Caloocan City";
        $CustomerLocation->latitude = "14.655360956488366";
        $CustomerLocation->longitude = "120.96416115760805";
        $CustomerLocation->save();

    }
}
