<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Hash;

class User extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new UserModel();
        $user->username = 'admin';
        $user->password = Hash::make('admin');
        $user->save();

        $user2 = new UserModel();
        $user2->username = 'seller1';
        $user2->password = Hash::make('123');
        $user2->save();
     
        $user2 = new UserModel();
        $user2->username = 'delivery1';
        $user2->password = Hash::make('123');
        $user2->save();
    }
}
