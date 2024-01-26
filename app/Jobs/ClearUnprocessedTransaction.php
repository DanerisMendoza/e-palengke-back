<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ClearUnprocessedTransaction implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public function __construct()
    {
    }


    public function handle(): void
    {
        $transactions = DB::table('transactions')
            ->where('delivery_id', '0')
            ->get();
        foreach ($transactions as $transaction) {
            $updatedTime = \Carbon\Carbon::parse($transaction->updated_at);
            $currentTime = \Carbon\Carbon::now();

            // Check if more than 1 minute has passed
            if ($updatedTime->diffInMinutes($currentTime) > 1) {
                DB::table('transactions')
                    ->where('id', $transaction->id)
                    ->update(['delivery_id' => null]);
            }
        }
    }
}
