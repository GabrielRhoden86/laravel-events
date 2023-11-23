<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderSend implements ShouldQueue //para implementar uma fila
{
    public $connection = "database";
   public $delay = 0; //segundos
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderPlaced $event): void
    {
        if ($event->produto->estoque <= 35) { //inserindo um  limite para que o evento ocorra ate a estoque 35
            $event->produto->estoque++;
            $event->produto->save();
        }
    }
}
