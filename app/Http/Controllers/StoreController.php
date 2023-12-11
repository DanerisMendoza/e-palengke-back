<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\StoreTypeDetail;
use App\Models\StoreType;
use App\Models\UserDetail;

class StoreController extends Controller
{
    public function GetActiveStore()
    {
        $stores = Store::join('user_roles', 'user_roles.id', 'stores.user_role_id')
            ->where('user_roles.status', 'active')
            ->where('user_roles.user_role_details_id',3)
            ->select('stores.id', 'stores.name', 'stores.address','stores.latitude', 'stores.longitude','user_roles.status','user_roles.user_role_details_id','user_roles.user_id')
            ->get()
            ->each(function ($q){
                $StoreType = StoreType::where('store_types.store_id',$q->id)
                ->join('store_type_details','store_type_details.id','store_types.store_type_details_id')                
                ->select('store_types.store_type_details_id','store_type_details.name')
                ->get();
                $UserDetail = (new UserDetail())->GetUserDetails($q->id);
                $q->storeOwner = $UserDetail;
                $q->store_type_details = $StoreType;
            });
        return $stores;
    }
}
