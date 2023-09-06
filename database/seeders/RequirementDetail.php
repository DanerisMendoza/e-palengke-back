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
        $requirementDetail->name = "barangay certificate";
        $requirementDetail->save();
    
        $requirementDetail = new RequirementDetailModel();
        $requirementDetail->name = "barangay indigency";
        $requirementDetail->save();
        
        $requirementDetail = new RequirementDetailModel();
        $requirementDetail->name = "barangay_id";
        $requirementDetail->save();

        $requirementDetail = new RequirementDetailModel();
        $requirementDetail->name = "police clearance";
        $requirementDetail->save();

    }
}
