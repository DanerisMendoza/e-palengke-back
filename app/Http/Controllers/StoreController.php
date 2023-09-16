<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\UserRole;

class StoreController extends Controller
{
    public function GetActiveStore()
    {
        $stores = Store::join('user_roles', 'user_roles.id', 'stores.user_role_id')
            ->where('user_roles.status', 'active')
            ->where('user_roles.user_role_details_id',3)
            ->select('user_roles.*')
            ->select('stores.id', 'stores.name', 'stores.latitude', 'stores.longitude','user_roles.status','user_roles.user_role_details_id','user_roles.user_id')
            ->get();
        return $stores;
    }
}
