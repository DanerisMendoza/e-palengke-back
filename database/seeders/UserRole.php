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
     
        $userRole2 = new userRoleModel();
        $userRole2->user_id = 2;
        $userRole2->requirement_id = 1;
        $userRole2->name = "seller";
        $userRole2->status = "application-pending";
        $userRole2->save();

    }
}
