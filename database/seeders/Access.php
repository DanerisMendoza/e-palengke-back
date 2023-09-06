<?php

namespace Database\Seeders;
use App\Models\Access as AccessModel;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Access extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Access = new AccessModel();
        $Access->user_role_details_id = 1;
        $Access->side_nav_id = 1;
        $Access->save();
        
        $Access = new AccessModel();
        $Access->user_role_details_id = 1;
        $Access->side_nav_id = 6;
        $Access->save();

        $Access = new AccessModel();
        $Access->user_role_details_id = 2;
        $Access->side_nav_id = 3;
        $Access->save();

        $Access = new AccessModel();
        $Access->user_role_details_id = 2;
        $Access->side_nav_id = 2;
        $Access->save();
    }
}
