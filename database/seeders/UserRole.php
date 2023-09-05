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
        $userRole->requirement_id = 0;
        $userRole->name = "admin";
        $userRole->status = "active";
        $userRole->save();
     
        $userRole = new userRoleModel();
        $userRole->user_id = 2;
        $userRole->requirement_id = 1;
        $userRole->name = "seller";
        $userRole->status = "application-pending";
        $userRole->save();
   
        $userRole = new userRoleModel();
        $userRole->user_id = 3;
        $userRole->requirement_id = 2;
        $userRole->name = "delivery";
        $userRole->status = "application-pending";
        $userRole->save();

        $userRole = new userRoleModel();
        $userRole->user_id = 4;
        $userRole->requirement_id = 0;
        $userRole->name = "customer";
        $userRole->status = "active";
        $userRole->save();

    }
}
