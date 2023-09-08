<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserDetail as UserDetailModel;

class UserDetail extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $UserDetail = new UserDetailModel();
        $UserDetail->user_id = 1;
        $UserDetail->name = "admin_name";
        $UserDetail->gender = "m";
        $UserDetail->age = 20;
        $UserDetail->phone_number = "00000000000";
        $UserDetail->address = "admin_address";
        $UserDetail->email = "admin_emailSample@gmail.com";
        $UserDetail->save();
        
        $UserDetail = new UserDetailModel();
        $UserDetail->user_id = 2;
        $UserDetail->name = "customer_name1";
        $UserDetail->gender = "m";
        $UserDetail->age = 20;
        $UserDetail->phone_number = "00000000000";
        $UserDetail->address = "customer_address1";
        $UserDetail->email = "customer_emailSample@gmail.com";
        $UserDetail->save();
    
        $UserDetail = new UserDetailModel();
        $UserDetail->user_id = 3;
        $UserDetail->name = "seller_name1";
        $UserDetail->gender = "f";
        $UserDetail->age = 20;
        $UserDetail->phone_number = "00000000000";
        $UserDetail->address = "seller_address1";
        $UserDetail->email = "seller_emailSample@gmail.com";
        $UserDetail->save();
 
        $UserDetail = new UserDetailModel();
        $UserDetail->user_id = 4;
        $UserDetail->name = "delivery_name";
        $UserDetail->gender = "m";
        $UserDetail->age = 20;
        $UserDetail->phone_number = "00000000000";
        $UserDetail->address = "delivery_address1";
        $UserDetail->email = "delivery_emailSample@gmail.com";
        $UserDetail->save();
 
        $UserDetail = new UserDetailModel();
        $UserDetail->user_id = 5;
        $UserDetail->name = "DEVELOPMENT NAME";
        $UserDetail->gender = "m";
        $UserDetail->age = 20;
        $UserDetail->phone_number = "00000000000";
        $UserDetail->address = "DEVELOPMENT_address1";
        $UserDetail->email = "DEVELOPMENTemailSample@gmail.com";
        $UserDetail->save();
    }
}
