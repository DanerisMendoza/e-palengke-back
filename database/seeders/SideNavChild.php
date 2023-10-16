<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SideNavChild as SideNavChildModel;


class SideNavChild extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $SideNavChildModel = new SideNavChildModel();
        $SideNavChildModel->parent_side_nav_id = 14;
        $SideNavChildModel->name = 'Customer Orders';
        $SideNavChildModel->mdi_icon = 'mdi-account-tie';
        $SideNavChildModel->pic_icon = '';
        $SideNavChildModel->save();
        
        $SideNavChildModel = new SideNavChildModel();
        $SideNavChildModel->parent_side_nav_id = 14;
        $SideNavChildModel->name = 'Store Orders';
        $SideNavChildModel->mdi_icon = 'mdi-account-tie';
        $SideNavChildModel->pic_icon = '';
        $SideNavChildModel->save();
        
        $SideNavChildModel = new SideNavChildModel();
        $SideNavChildModel->parent_side_nav_id = 14;
        $SideNavChildModel->name = 'Delivery Orders';
        $SideNavChildModel->mdi_icon = 'mdi-account-tie';
        $SideNavChildModel->pic_icon = '';
        $SideNavChildModel->save();
    }
}
