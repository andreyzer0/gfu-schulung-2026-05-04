<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(): View
    {

        $events = Event::all();

        return view('events.index', [
            'title' => 'GFU Training Schedule',
            'events' => $events,
            ]);
    }
    //
}
