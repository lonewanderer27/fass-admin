<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(Event $event): View
    {
        return view('events.show', [
            'event' => $event,
            'organizer' =>  $event->organizer
        ]);
    }

    public function show(Event $event): View
    {
        $events = $event->with('organizer')->paginate(9);

        return view('events.index', [
            'events' => $events
        ]);
    }
}
