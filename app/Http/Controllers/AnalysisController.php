<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalysisController extends Controller
{
    public function GET_USER_ROLES_ANALYSIS()
    {
        $result = DB::table('user_roles')
            ->join('user_role_details', 'user_role_details.id', 'user_roles.user_role_details_id')
            ->select('user_role_details.name', DB::raw('COUNT(*) as count'))
            ->groupBy('user_role_details.name')
            ->get();

        return $result;
    }

    public function GET_USER_ROLES_STATUS_ANALYSIS()
    {
        $result = DB::table('user_roles')
            ->join('user_role_details', 'user_role_details.id', 'user_roles.user_role_details_id')
            ->select('user_roles.status', DB::raw('COUNT(*) as count'))
            ->groupBy('user_roles.status')
            ->get();

        return $result;
    }

    public function GET_ORDERS_ANALYSIS()
    {
        $result = DB::table('order_details')
            ->join('products', 'products.id', 'order_details.product_id')
            ->select('products.name', DB::raw('CAST(SUM(order_details.quantity) AS SIGNED) as count'))
            ->groupBy('products.name')
            ->orderBy('count', 'asc') // Order by count in ascending order
            ->get();
    
        return $result;
    }
    
    
}
