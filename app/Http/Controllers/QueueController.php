<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Queue;

class QueueController extends Controller
{
    public function MarkOnline(Request $request)
    {
        $Queue = new Queue();
        $Queue->user_id = $request->input('user_id');
        $Queue->save();
        return 'success';
    }
    public function MarkOffline(Request $request)
    {
        $userId = $request->input('user_id');
        $queue = Queue::where('user_id', $userId)->first();

        if ($queue) {
            $queue->delete();
            return 'success';
        } else {
            return 'Record not found';
        }
    }
}
