<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PushNotificationController extends Controller
{
    public function SEND_PUSH_NOTIF(Request $request)
    {
        $deviceToken = 'cO5CTynKSVCQPrH-I4A__w:APA91bGPWJ1pJHBmNmtQIpCz5SEd1uwlYcUkeBbv_e7gMj-aT7qB3KgFA5w_iSArhJn4qofVHxLnJTUByNYSqxgIpuLB4uMUJ9-VwmDTWMTH22yGT6G2tWK0QJNoidfwneEkZ9ZRdYlx';
        $title = $request->input('title');
        $body = $request->input('body');

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

        return $response->getBody()->getContents();
    }
}
