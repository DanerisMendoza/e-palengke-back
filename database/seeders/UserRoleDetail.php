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
        $UserRoleDetail->name = "ADMIN";
        $UserRoleDetail->save();
        
        $UserRoleDetail = new UserRoleDetailModel();
        $UserRoleDetail->name = "CUSTOMER";
        $UserRoleDetail->save();
        
        $UserRoleDetail = new UserRoleDetailModel();
        $UserRoleDetail->name = "SELLER";
        $UserRoleDetail->save();
        
        $UserRoleDetail = new UserRoleDetailModel();
        $UserRoleDetail->name = "DELIVERY";
        $UserRoleDetail->save();
        
    }
}
