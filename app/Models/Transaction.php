<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'delivery_id',
    ];

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
