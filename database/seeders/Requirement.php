<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Requirement as RequirementModel;
use Illuminate\Support\Facades\Hash;

class Requirement extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //customer
        $requirement = new RequirementModel();
        $requirement->user_role_details_id = 2;
        $requirement->requirement_details_id = 3;
        $requirement->save();
        
        //seller
        $requirement = new RequirementModel();
        $requirement->user_role_details_id = 3;
        $requirement->requirement_details_id = 1;
        $requirement->save();

        $requirement = new RequirementModel();
        $requirement->user_role_details_id = 3;
        $requirement->requirement_details_id = 2;
        $requirement->save();

        //delivery
        $requirement = new RequirementModel();
        $requirement->user_role_details_id = 4;
        $requirement->requirement_details_id = 1;
        $requirement->save();

        $requirement = new RequirementModel();
        $requirement->user_role_details_id = 4;
        $requirement->requirement_details_id = 2;
        $requirement->save();

        $requirement = new RequirementModel();
        $requirement->user_role_details_id = 4;
        $requirement->requirement_details_id = 3;
        $requirement->save();
    }
}
