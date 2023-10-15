<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SideNavChildAccess as SideNavChildAccessModel;

class SideNavChildAccess extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //customer
        $SideNavChildAccessModel = new SideNavChildAccessModel();
        $SideNavChildAccessModel->user_role_details_id = 2;
        $SideNavChildAccessModel->side_nav_children_id = 1;
        $SideNavChildAccessModel->save();
        //seller
        $SideNavChildAccessModel = new SideNavChildAccessModel();
        $SideNavChildAccessModel->user_role_details_id = 3;
        $SideNavChildAccessModel->side_nav_children_id = 2;
        $SideNavChildAccessModel->save();
        //delivery
        $SideNavChildAccessModel = new SideNavChildAccessModel();
        $SideNavChildAccessModel->user_role_details_id = 4;
        $SideNavChildAccessModel->side_nav_children_id = 3;
        $SideNavChildAccessModel->save();
    }
}
