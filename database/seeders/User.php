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
        
        $user = new UserModel();
        $user->username = 'customer1';
        $user->password = Hash::make('123');
        $user->save();
        
        // $user = new UserModel();
        // $user->username = 'seller1';
        // $user->password = Hash::make('123');
        // $user->save();
     
        // $user = new UserModel();
        // $user->username = 'delivery1';
        // $user->password = Hash::make('123');
        // $user->save();
    
        // $user = new UserModel();
        // $user->username = 'dev';
        // $user->password = Hash::make('123');
        // $user->save();

        $user = new UserModel();
        $user->username = 'customer2';
        $user->password = Hash::make('123');
        $user->save();
    
        $user = new UserModel();
        $user->username = 'naruto';
        $user->password = Hash::make('123');
        $user->save();

    }
}
