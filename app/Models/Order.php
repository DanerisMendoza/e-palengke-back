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

    public function notifySeller($user_id)
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
                ],
            ]);
        }
    }
}
