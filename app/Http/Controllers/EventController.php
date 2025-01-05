<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Organizer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class EventController extends Controller
{

    // page: all events
    public function index(): View
    {
        $events = Event::with('organizer')->paginate(9);

        return view('events.index', [
            'events' => $events
        ]);
    }

    public function show(Event $event): View
    {
        return view('events.show', [
            'event' => $event,
            'organizer' =>  $event->organizer
        ]);
    }

    public function create(): View
    {
        return view('events.create', [
            'organizers' => Organizer::all()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        // validate request
        $request->validate([
            'name' => ['required', 'unique:events', 'min:3'],
            'description' => ['required'],
            'location' => ['required'],
            'start_datetime' => ['required', 'date'],
            'end_datetime' => ['required', 'date'],
            'max_attendees' => ['required', 'integer', 'min:1'],
            'avatar_url' => ['nullable'],
            'cover_url' => ['nullable'],
            'organizer_id' => [
                'required',
                Rule::exists('organizers', 'id')
            ],
//            'creator_member_id' => [
//                'required',
//                Rule::exists('organizer_members', 'id')
//            ]
        ]);

        // filter out the null values
        $filtered_values = array_filter($request->all(), fn($val) => !is_null($val));

        // create the new event
        $event = Event::create([
            ...$filtered_values,
            'creator_member_id' => 1
        ]);

        // redirect to the new event
        return redirect("/events/$event->id");
    }
}
