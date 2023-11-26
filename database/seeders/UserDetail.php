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
        $UserDetail->first_name = "admin_name";
        $UserDetail->last_name = "";
        $UserDetail->gender = "Male";
        $UserDetail->age = 20;
        $UserDetail->balance = 0;
        $UserDetail->phone_number = "00000000000";
        $UserDetail->address = "admin_address";
        $UserDetail->email = "admin_emailSample@gmail.com";
        $UserDetail->save();

        $UserDetail = new UserDetailModel();
        $UserDetail->user_id = 2;
        $UserDetail->first_name = "customer_name1";
        $UserDetail->last_name = "";
        $UserDetail->gender = "Male";
        $UserDetail->age = 20;
        $UserDetail->balance = 0;
        // $UserDetail->latitude = 14.654112;
        // $UserDetail->longitude = 120.965480;
        $UserDetail->phone_number = "00000000000";
        $UserDetail->address = "customer_address1";
        $UserDetail->email = "customer_emailSample@gmail.com";
        $UserDetail->save();

        // $UserDetail = new UserDetailModel();
        // $UserDetail->user_id = 3;
        // $UserDetail->name = "seller_name1";
        // $UserDetail->gender = "Female";
        // $UserDetail->age = 20;
        // $UserDetail->phone_number = "00000000000";
        // $UserDetail->address = "seller_address1";
        // $UserDetail->email = "seller_emailSample@gmail.com";
        // $UserDetail->save();

        // $UserDetail = new UserDetailModel();
        // $UserDetail->user_id = 5;
        // $UserDetail->name = "DEVELOPMENT NAME";
        // $UserDetail->gender = "Male";
        // $UserDetail->age = 20;
        // $UserDetail->phone_number = "00000000000";
        // $UserDetail->address = "DEVELOPMENT_address1";
        // $UserDetail->email = "DEVELOPMENTemailSample@gmail.com";
        // $UserDetail->save();

        $UserDetail = new UserDetailModel();
        $UserDetail->user_id = 3;
        $UserDetail->first_name = "CUSTOMER2_NAME";
        $UserDetail->last_name = "";
        $UserDetail->gender = "Male";
        $UserDetail->age = 20;
        $UserDetail->balance = 0;
        // $UserDetail->latitude = 14.654112;
        // $UserDetail->longitude = 120.965480;
        $UserDetail->phone_number = "00000000000";
        $UserDetail->address = "Customer2_address1";
        $UserDetail->email = "customer2Sample@gmail.com";
        $UserDetail->save();

        $UserDetail = new UserDetailModel();
        $UserDetail->user_id = 4;
        $UserDetail->first_name = "patrick";
        $UserDetail->last_name = "";
        $UserDetail->gender = "Male";
        $UserDetail->age = 20;
        $UserDetail->balance = 0;
        $UserDetail->phone_number = "00000000000";
        $UserDetail->address = "caloocan";
        $UserDetail->email = "patrick@gmail.com";
        $UserDetail->save();

        $UserDetail = new UserDetailModel();
        $UserDetail->user_id = 5;
        $UserDetail->first_name = "delivery_name";
        $UserDetail->last_name = "";
        $UserDetail->gender = "Male";
        $UserDetail->age = 20;
        $UserDetail->balance = 0;
        $UserDetail->phone_number = "00000000000";
        $UserDetail->address = "delivery_address1";
        $UserDetail->email = "delivery_emailSample@gmail.com";
        $UserDetail->save();

        $UserDetail = new UserDetailModel();
        $UserDetail->user_id = 6;
        $UserDetail->first_name = "john";
        $UserDetail->last_name = "";
        $UserDetail->gender = "Male";
        $UserDetail->age = 20;
        $UserDetail->balance = 0;
        $UserDetail->phone_number = "09121212";
        $UserDetail->address = "caloocan";
        $UserDetail->email = "john@gmail.com";
        $UserDetail->save();
    }
}
