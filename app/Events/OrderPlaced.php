<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Listeners\OrderSend;  //listner
use App\Listeners\OrderSendDecrement; //listner
use App\Models\Product;

class OrderPlaced
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $produto;
    //public $estoque; //Aceitar um parâmetro adicional que especifica qual listener deve ser acionado
    /**
     * Create a new event instance.
     */
    public function __construct(Product $produto)
    {
        $this->produto = $produto;
    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
