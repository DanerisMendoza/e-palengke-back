<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'delivery_id',
    ];
    
    public function sellersDetail()
    {
        $sellersDetails = DB::table('orders')
            ->where('orders.transaction_id', $this->id)
            ->get()
            ->map(function($order) {
                return DB::table('stores')
                    ->where('stores.id', $order->store_id)
                    ->join('user_roles', 'user_roles.id', 'stores.user_role_id')
                    ->join('user_details', 'user_details.id', 'user_roles.user_id')
                    ->select('user_details.first_name','user_details.id')
                    ->first();
            });
            
        return $sellersDetails;
    }

    public function orderDetails()
    {
        return $this->hasOne(Order::class, 'transaction_id', 'id');
    }

    public function storeDetails()
    {
        return $this->orderDetails->hasOne(Store::class, 'id', 'store_id');
    }

    public function userRoleDetails()
    {
        return $this->storeDetails->hasOne(UserRole::class, 'id', 'user_role_id');
    }

    public function sellerDetails()
    {
        return $this->userRoleDetails->hasOne(UserDetail::class, 'id', 'user_id');
    }
}
