<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalysisController extends Controller
{
    public function GET_USER_ROLES_ANALYSIS()
    {
        $userRolesCount = DB::table('user_roles')
            ->join('user_role_details', 'user_role_details.id', 'user_roles.user_role_details_id')
            ->select('user_role_details.name', DB::raw('COUNT(*) as count'))
            ->groupBy('user_role_details.name')
            ->get();
    
        return $userRolesCount;
    }

    public function GET_USER_ROLES_STATUS_ANALYSIS()
    {
        $userRolesCount = DB::table('user_roles')
            ->join('user_role_details', 'user_role_details.id', 'user_roles.user_role_details_id')
            ->select('user_roles.status', DB::raw('COUNT(*) as count'))
            ->groupBy('user_roles.status')
            ->get();
    
        return $userRolesCount;
    }
    
}
