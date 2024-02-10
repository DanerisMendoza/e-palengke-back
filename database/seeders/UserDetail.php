<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserDetail as UserDetailModel;
use Faker\Factory as Faker;

class UserDetail extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $UserDetail = new UserDetailModel();
        $UserDetail->user_id = 1;
        $UserDetail->first_name = "admin_name";
        $UserDetail->last_name = "";
        $UserDetail->gender = "Male";
        $UserDetail->age = 20;
        $UserDetail->balance = 10000;
        $UserDetail->phone_number = "94152604387";
        $UserDetail->address = "admin_address";
        $UserDetail->email = "admin_emailSample@gmail.com";
        $UserDetail->profile_pic_path = '/ProfilePic/avatar' . $faker->randomElement(['1', '2', '3', '4']) . '.PNG';
        $UserDetail->save();

        $UserDetail = new UserDetailModel();
        $UserDetail->user_id = 2;
        $UserDetail->first_name = "Thomas";
        $UserDetail->last_name = "Barclay";
        $UserDetail->gender = "Male";
        $UserDetail->age = 20;
        $UserDetail->balance = 10000;
        $UserDetail->phone_number = "94374207476";
        $UserDetail->address = "Caloocan";
        $UserDetail->email = "Thomas@gmail.com";
        $UserDetail->profile_pic_path = '/ProfilePic/avatar' . $faker->randomElement(['1', '2', '3', '4']) . '.PNG';
        $UserDetail->save();

        $UserDetail = new UserDetailModel();
        $UserDetail->user_id = 3;
        $UserDetail->first_name = "Stephanie ";
        $UserDetail->last_name = "Duley";
        $UserDetail->gender = "Male";
        $UserDetail->age = 20;
        $UserDetail->balance = 10000;
        $UserDetail->phone_number = "91629221258";
        $UserDetail->address = "Caloocan";
        $UserDetail->email = "Stephanie@gmail.com";
        $UserDetail->profile_pic_path = '/ProfilePic/avatar' . $faker->randomElement(['1', '2', '3', '4']) . '.PNG';
        $UserDetail->save();

        $UserDetail = new UserDetailModel();
        $UserDetail->user_id = 4;
        $UserDetail->first_name = "patrick";
        $UserDetail->last_name = "Victor";
        $UserDetail->gender = "Male";
        $UserDetail->age = 20;
        $UserDetail->balance = 10000;
        $UserDetail->phone_number = "95128441426";
        $UserDetail->address = "Caloocan";
        $UserDetail->email = "patrick@gmail.com";
        $UserDetail->profile_pic_path = '/ProfilePic/avatar' . $faker->randomElement(['1', '2', '3', '4']) . '.PNG';
        $UserDetail->save();

        $UserDetail = new UserDetailModel();
        $UserDetail->user_id = 5;
        $UserDetail->first_name = "Antonio";
        $UserDetail->last_name = "Austria";
        $UserDetail->gender = "Male";
        $UserDetail->age = 20;
        $UserDetail->balance = 10000;
        $UserDetail->phone_number = "97179268918";
        $UserDetail->address = "Caloocan";
        $UserDetail->email = "Antonio@gmail.com";
        $UserDetail->profile_pic_path = '/ProfilePic/avatar' . $faker->randomElement(['1', '2', '3', '4']) . '.PNG';
        $UserDetail->save();

        $UserDetail = new UserDetailModel();
        $UserDetail->user_id = 6;
        $UserDetail->first_name = "john";
        $UserDetail->last_name = "Coleman";
        $UserDetail->gender = "Male";
        $UserDetail->age = 20;
        $UserDetail->balance = 10000;
        $UserDetail->phone_number = "09121212";
        $UserDetail->address = "Caloocan";
        $UserDetail->email = "john@gmail.com";
        $UserDetail->profile_pic_path = '/ProfilePic/avatar' . $faker->randomElement(['1', '2', '3', '4']) . '.PNG';
        $UserDetail->save();
    }
}
