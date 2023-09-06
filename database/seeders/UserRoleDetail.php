<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserRoleDetail as UserRoleDetailModel;

class UserRoleDetail extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $UserRoleDetail = new UserRoleDetailModel();
        $UserRoleDetail->name = "admin";
        $UserRoleDetail->status = "active";
        $UserRoleDetail->save();
        
        $UserRoleDetail = new UserRoleDetailModel();
        $UserRoleDetail->name = "customer";
        $UserRoleDetail->status = "active";
        $UserRoleDetail->save();
        
        $UserRoleDetail = new UserRoleDetailModel();
        $UserRoleDetail->name = "seller";
        $UserRoleDetail->status = "active";
        $UserRoleDetail->save();
        
        $UserRoleDetail = new UserRoleDetailModel();
        $UserRoleDetail->name = "delivery";
        $UserRoleDetail->status = "active";
        $UserRoleDetail->save();
        
    }
}
