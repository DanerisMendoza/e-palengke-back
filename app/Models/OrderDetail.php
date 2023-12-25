<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    public function storeDetails()
    {
        return $this->hasOne(Store::class, 'id', 'store_id');
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
