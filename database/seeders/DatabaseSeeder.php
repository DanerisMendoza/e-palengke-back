<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\User;
use Database\Seeders\UserRole;
use Database\Seeders\StoreSeeder;
use Database\Seeders\StoreTypeDetail;
use Database\Seeders\CustomerLocation;
use Database\Seeders\UserDetail;
use Database\Seeders\Access;
use Database\Seeders\UserRoleDetail;
use Database\Seeders\SideNav;
use Database\Seeders\Requirement;
use Database\Seeders\ProductTypeDetail;
use Database\Seeders\SideNavChild;
use Database\Seeders\SideNavChildAccess;
use Database\Seeders\StoreTypeSeeder;

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
            Access::class,
            SideNav::class,
            UserRoleDetail::class,
            ProductTypeDetail::class,
            SideNavChild::class,
            SideNavChildAccess::class,
            StoreSeeder::class,
            StoreTypeSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
