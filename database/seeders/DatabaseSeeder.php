<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\User;
use Database\Seeders\UserRole;
use Database\Seeders\StoreTypeDetail;
use Database\Seeders\CustomerLocation;
use Database\Seeders\UserDetail;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            User::class,
            UserRole::class,
            Requirement::class,
            RequirementDetail::class,
            StoreTypeDetail::class,
            CustomerLocation::class,
            UserDetail::class,
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
