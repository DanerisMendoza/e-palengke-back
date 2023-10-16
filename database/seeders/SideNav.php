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
        $SideNav->mdi_icon = 'mdi-view-dashboard';
        $SideNav->pic_icon = '';
        $SideNav->save();
        //2
        $SideNav = new SideNavModel();
        $SideNav->name = 'APPLICATION';
        $SideNav->mdi_icon = 'mdi-playlist-check';
        $SideNav->pic_icon = '';
        $SideNav->save();
        //3
        $SideNav = new SideNavModel();
        $SideNav->name = 'HOME';
        $SideNav->mdi_icon = 'mdi-home';
        $SideNav->pic_icon = '';
        $SideNav->save();
        //4
        $SideNav = new SideNavModel();
        $SideNav->name = 'REQUIREMENT DETAILS';
        $SideNav->mdi_icon = 'mdi-format-list-checkbox';
        $SideNav->pic_icon = '';
        $SideNav->save();
        //5
        $SideNav = new SideNavModel();
        $SideNav->name = 'STORE';
        $SideNav->mdi_icon = 'mdi-store';
        $SideNav->pic_icon = '';
        $SideNav->save();
        //6
        $SideNav = new SideNavModel();
        $SideNav->name = 'USER ROLE';
        $SideNav->mdi_icon = 'mdi-account-multiple';
        $SideNav->pic_icon = '';
        $SideNav->save();
        //7
        $SideNav = new SideNavModel();
        $SideNav->name = 'DELIVERY';
        $SideNav->mdi_icon = 'mdi-truck-delivery';
        $SideNav->pic_icon = '';
        $SideNav->save();
        //8
        $SideNav = new SideNavModel();
        $SideNav->name = 'APPLICANTS';
        $SideNav->mdi_icon = 'mdi-badge-account-horizontal';
        $SideNav->pic_icon = '';
        $SideNav->save();
        //9
        $SideNav = new SideNavModel();
        $SideNav->name = 'INVENTORY';
        $SideNav->mdi_icon = 'mdi-cube';
        $SideNav->pic_icon = '';
        $SideNav->save();
        //10
        $SideNav = new SideNavModel();
        $SideNav->name = 'PROFILE';
        $SideNav->mdi_icon = 'mdi-account';
        $SideNav->pic_icon = '';
        $SideNav->save();
        //11
        $SideNav = new SideNavModel();
        $SideNav->name = 'PRODUCT TYPE DETAILS';
        $SideNav->mdi_icon = 'mdi-package-variant-closed';
        $SideNav->pic_icon = '';
        $SideNav->save();
        //12
        $SideNav = new SideNavModel();
        $SideNav->name = 'STORE TYPE DETAILS';
        $SideNav->mdi_icon = 'mdi-format-list-text';
        $SideNav->pic_icon = '';
        $SideNav->save();
        //13
        $SideNav = new SideNavModel();
        $SideNav->name = 'TOPUP';
        $SideNav->mdi_icon = 'mdi-cash';
        $SideNav->pic_icon = '';
        $SideNav->save();
        //14
        $SideNav = new SideNavModel();
        $SideNav->name = 'ORDERS';
        $SideNav->mdi_icon = 'mdi-power';
        $SideNav->pic_icon = '';
        $SideNav->save();
    }
}
