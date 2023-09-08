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
        //1
        $SideNav = new SideNavModel();
        $SideNav->name = 'Admin';
        $SideNav->save();
        //2
        $SideNav = new SideNavModel();
        $SideNav->name = 'Application';
        $SideNav->save();
        //3
        $SideNav = new SideNavModel();
        $SideNav->name = 'EndUser';
        $SideNav->save();
        //4
        $SideNav = new SideNavModel();
        $SideNav->name = 'RequirementDetail';
        $SideNav->save();
        //5
        $SideNav = new SideNavModel();
        $SideNav->name = 'Store';
        $SideNav->save();
        //6
        $SideNav = new SideNavModel();
        $SideNav->name = 'UserRole';
        $SideNav->save();
        //7
        $SideNav = new SideNavModel();
        $SideNav->name = 'Delivery';
        $SideNav->save();

    }
}
