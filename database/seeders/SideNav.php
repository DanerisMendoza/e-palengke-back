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
        $SideNav->name = 'ADMIN';
        $SideNav->save();
        //2
        $SideNav = new SideNavModel();
        $SideNav->name = 'APPLICATION';
        $SideNav->save();
        //3
        $SideNav = new SideNavModel();
        $SideNav->name = 'HOME';
        $SideNav->save();
        //4
        $SideNav = new SideNavModel();
        $SideNav->name = 'REQUIREMENT DETAILS';
        $SideNav->save();
        //5
        $SideNav = new SideNavModel();
        $SideNav->name = 'STORE';
        $SideNav->save();
        //6
        $SideNav = new SideNavModel();
        $SideNav->name = 'USER ROLE';
        $SideNav->save();
        //7
        $SideNav = new SideNavModel();
        $SideNav->name = 'DELIVERY';
        $SideNav->save();
        //8
        $SideNav = new SideNavModel();
        $SideNav->name = 'APPLICANTS';
        $SideNav->save();
        //9
        $SideNav = new SideNavModel();
        $SideNav->name = 'INVENTORY';
        $SideNav->save();
        //10
        $SideNav = new SideNavModel();
        $SideNav->name = 'PROFILE';
        $SideNav->save();
        //11
        $SideNav = new SideNavModel();
        $SideNav->name = 'PRODUCT TYPE DETAILS';
        $SideNav->save();
        //12
        $SideNav = new SideNavModel();
        $SideNav->name = 'STORE TYPE DETAILS';
        $SideNav->save();
    }
}
