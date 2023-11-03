<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Store;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Store = new Store();
        $Store->user_role_id = 3;
        $Store->name = 'James Grilled Barbecue';
        $Store->status = 'active';
        $Store->latitude = '14.653495';
        $Store->longitude = '120.965970';
        $Store->address = 'Sabalo Street Caloocan City';
        $Store->save();

        $Store = new Store();
        $Store->user_role_id = 5;
        $Store->name = 'Jennie Tea Store';
        $Store->status = 'active';
        $Store->latitude = '14.653318';
        $Store->longitude = '120.966201';
        $Store->address = 'Sabalo Street Caloocan City';
        $Store->save();
    }
}
