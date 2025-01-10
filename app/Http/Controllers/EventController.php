<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Organizer;
use App\Models\OrganizerMember;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Inertia\Inertia;

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

    public function scan(Event $event)
    {
        Inertia::setRootView('events/scan.index');
        return Inertia::render('Scan', [
            'event' => $event
        ]);
    }

    public function create(): View
    {
        $groups = Organizer::whereIn(
            'id',
            OrganizerMember::where('user_id', Auth::user()->id)->pluck('organizer_id')
        )->get();

        return view('events.create', [
            'organizers' => $groups
        ]);
    }

    public function edit(Event $event): View
    {
        // get the groups of the user
        $user_groups = Auth::user()
            ->organizerMembers()
            ->where('organizer_id', $event->organizer_id)
            ->first()
            ->organizer()->get();

        return view('events.edit', [
            'organizers' => $user_groups,
            'event' => $event
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        // validate request
        $attrs = $request->validate([
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
        ]);

        // get the corresponding organizer_member of the user
        $organizer_member = OrganizerMember::where('user_id', Auth::user()->id)
            ->where('organizer_id',  $attrs['organizer_id'])
            ->first();

        // create the new event
        $event = Event::create([
            ...$attrs,
            'creator_member_id' => $organizer_member['id']
        ]);

        // redirect to the new event
        return redirect("/events/$event->id");
    }

    public function update(Event $event): RedirectResponse
    {
        // TODO: authorize the update request

        // validate
        $attrs = request()->validate([
            'name' => ['required', 'unique:events,name,' . $event->id , 'min:3'],
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
        ]);

        // update the event
        $event->updateOrFail($attrs);

        // return and redirect to the event page
        return redirect("/events/$event->id");
    }

    public function destroy(Event $event): RedirectResponse
    {
        // TODO: authorize the delete event request

        // actually delete the event
        $event->deleteOrFail();

        // return and redirect to events page
        return redirect('/events');
    }
}
