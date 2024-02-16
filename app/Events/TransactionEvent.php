<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TransactionEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    private $userId;
    private $delivery_id;
    /**
     * Create a new event instance.
     */
    public function __construct($userId,$delivery_id)
    {
        $this->userId = $userId;
        $this->delivery_id = $delivery_id;
    }
    
    public function broadcastWith()
    {
        return ['result' => true, 'delivery_id' => $this->delivery_id];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('channel-TransactionEvent' . $this->userId),
        ];
    }
    // comment this function if you will use localhost websockets
    public function broadcastAs()
    {
        return 'TransactionEvent';
    }
}
