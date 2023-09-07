<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserRole as UserRoleModel;
use Illuminate\Support\Facades\Hash;

class UserRole extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userRole = new UserRoleModel();
        $userRole->user_id = 1;
        $userRole->user_role_details_id = 1;
        $userRole->save();
    
        $userRole = new UserRoleModel();
        $userRole->user_id = 2;
        $userRole->user_role_details_id = 2;
        $userRole->save();
    
        $userRole = new UserRoleModel();
        $userRole->user_id = 3;
        $userRole->user_role_details_id = 3;
        $userRole->save();

        $userRole = new UserRoleModel();
        $userRole->user_id = 4;
        $userRole->user_role_details_id = 4;
        $userRole->save();

        $userRole = new UserRoleModel();
        $userRole->user_id = 5;
        $userRole->user_role_details_id = 1;
        $userRole->save();
        $userRole = new UserRoleModel();
        $userRole->user_id = 5;
        $userRole->user_role_details_id = 2;
        $userRole->save();
        $userRole = new UserRoleModel();
        $userRole->user_id = 5;
        $userRole->user_role_details_id = 3;
        $userRole->save();
        $userRole = new UserRoleModel();
        $userRole->user_id = 5;
        $userRole->user_role_details_id = 4;
        $userRole->save();

    }
}
