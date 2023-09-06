<?php

namespace Database\Seeders;
use App\Models\SideNav as SideNavModel;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SideNav extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $SideNav = new SideNavModel();
        $SideNav->name = 'Admin';
        $SideNav->save();

        $SideNav = new SideNavModel();
        $SideNav->name = 'Application';
        $SideNav->save();

        $SideNav = new SideNavModel();
        $SideNav->name = 'EndUser';
        $SideNav->save();

        $SideNav = new SideNavModel();
        $SideNav->name = 'Login';
        $SideNav->save();

        $SideNav = new SideNavModel();
        $SideNav->name = 'Registration';
        $SideNav->save();
    
        $SideNav = new SideNavModel();
        $SideNav->name = 'Requirement';
        $SideNav->save();

        $SideNav = new SideNavModel();
        $SideNav->name = 'Store';
        $SideNav->save();
    }
}
