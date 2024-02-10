<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
    ];

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

    public function notifySeller($user_id,$store_id,$order_id)
    {
        $CustomerUserDetail = Auth::user()->userDetails;
        $SellerUserDetail = UserDetail::find($user_id);
        $deviceToken = $SellerUserDetail->device_token;
        if ($deviceToken != null) {
            $title = 'New Order Alert!';
            $body = "Customer: $CustomerUserDetail->first_name $CustomerUserDetail->last_name";
            $serverKey = 'AAAAVBpbxjw:APA91bGS6T4OjP0drbqoRtJFrfCQp7ZYW5lsuDeQ4vuDG0bo_iZ7hDHOxOYlMnOWsgPwcsvgbWm8KmFMVAXdkYodRlzK0JQWnGiUyAReTTHyX7KHYrl8WSTfWny-k7zs0err0R9YOpMU';
            $url = 'https://fcm.googleapis.com/fcm/send';
            $client = new Client();
            $response = $client->post($url, [
                'headers' => [
                    'Authorization' => 'key=' . $serverKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'to' => $deviceToken,
                    'notification' => [
                        'title' => $title,
                        'body' => $body,
                    ],
                    'data' => [
                        'store_id' => $store_id,
                        'order_id' => $order_id,
                    ],
                ],
            ]);
        }
    }
   
    public function notifyCustomer($user_id)
    {
        $CustomerUserDetail = UserDetail::find($user_id);
        $deviceToken = $CustomerUserDetail->device_token;
        if ($deviceToken != null) {
            $title = 'Delivery Alert!';
            $body = "Rider is on the way!";
            $serverKey = 'AAAAVBpbxjw:APA91bGS6T4OjP0drbqoRtJFrfCQp7ZYW5lsuDeQ4vuDG0bo_iZ7hDHOxOYlMnOWsgPwcsvgbWm8KmFMVAXdkYodRlzK0JQWnGiUyAReTTHyX7KHYrl8WSTfWny-k7zs0err0R9YOpMU';
            $url = 'https://fcm.googleapis.com/fcm/send';
            $client = new Client();
            $response = $client->post($url, [
                'headers' => [
                    'Authorization' => 'key=' . $serverKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'to' => $deviceToken,
                    'notification' => [
                        'title' => $title,
                        'body' => $body,
                    ],
                ],
            ]);
        }
    }
}
