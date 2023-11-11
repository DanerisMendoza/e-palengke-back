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

class FindNearByDelivery implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    


    /**
     * Create a new job instance.
     */
    public function __construct()
    {

    }

    // public $i = 0;
    
    public function handle(): void
    {
        $queue = DB::table('queues')->first();
        // $this->i++;
        \Log::info($queue->user_id);
    }
}
