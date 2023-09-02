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
        $requirement = new RequirementModel();
        $requirement->name = "seller";
        $requirement->save();

        $requirement2 = new RequirementModel();
        $requirement2->name = "delivery";
        $requirement2->save();
    }
}
