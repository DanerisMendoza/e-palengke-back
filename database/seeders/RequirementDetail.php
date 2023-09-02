<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RequirementDetail as RequirementDetailModel;
use Illuminate\Support\Facades\Hash;

class RequirementDetail extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $requirementDetail = new RequirementDetailModel();
        $requirementDetail->requirement_id = 1;
        $requirementDetail->name = "barangay certificate";
        $requirementDetail->save();
        
        $requirementDetail2 = new RequirementDetailModel();
        $requirementDetail2->requirement_id = 1;
        $requirementDetail2->name = "barangay_id";
        $requirementDetail2->save();

    }
}
