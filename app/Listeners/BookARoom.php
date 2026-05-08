<?php

namespace App\Listeners;

use App\Events\EventCreated;
use Illuminate\Support\Facades\Log;

class BookARoom
{
    public function handle(EventCreated $eventCreated): void
    {
        //Logik für Raumbuchungen
        Log::info(__('Raum für ":event" wurde gebucht!', ['event' => $eventCreated->event]));
    }
}
