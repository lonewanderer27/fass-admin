<?php

namespace App\Http\Controllers;

use App\Jobs\ImagineOrganizerDescription;
use App\Mail\OrganizationCreated;
use App\Models\Organizer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use function Illuminate\Events\queueable;

class OrganizerController extends Controller
{
    // page: all organizers
    public function index(): View
    {
        $organizers = Organizer::paginate(9);

        return view('organizers.index', [
            'organizers' => $organizers
        ]);
    }

    // page: single organizer
    public function show(Organizer $organizer): View
    {
        $members = $organizer->members()->take(3)->get();
        $events = $organizer->events()->take(3)->get();

        return view('organizers.show', [
            'organizer' => $organizer,
            'members' => $members,
            'events' => $events
        ]);
    }

    // form: create an organizer
    public function create(): View
    {
        return view('organizers.create');
    }

    // form: edit an organizer
    public function edit(Organizer $organizer): View
    {
        return view('organizers.edit', [
            'organizer' => $organizer
        ]);
    }

    // action: new organizer
    public function store(Request $request): RedirectResponse
    {
        // validate request
        $attrs = $request->validate([
            'name' => ['required', 'unique:organizers', 'min:3'],
            'phone_no' => ['required', 'size:10'],
            'description' => ['nullable'],
            'email' => ['nullable'],
            'avatar_url' => ['nullable'],
            'cover_url' => ['nullable']
        ]);

        // create the new organizer
        $organizer = Organizer::create($attrs);

        if (!$organizer->description) {
            // if there is no bio, let's imagine what is the description should be!
            ImagineOrganizerDescription::dispatch($organizer);
        }

        // queue the email
        Mail::to(Auth::user()->email)->queue(new OrganizationCreated($organizer));

        // return and redirect to organizer page
        return redirect("/organizers/$organizer->id");
    }

    // action: update an organizer
    public function update(Organizer $organizer): RedirectResponse
    {
        // validate the request
        $attrs = request()->validate([
            // third param allows us to exclude the rule of unique to the org id
            // which allows the org name to stay the same
            // in case the user decided to not edit it
            'name' => ['required', 'unique:organizers,name,' . $organizer->id, 'min:3'],
            'phone_no' => ['required', 'size:10'],
            'description' => ['nullable'],
            'email' => ['nullable'],
            'avatar_url' => ['nullable'],
            'cover_url' => ['nullable']
        ]);

        // TODO: authorize the edit organizer request

        // actually update the organizer
        $organizer->updateOrFail($attrs);

        // return and redirect to the organizer page
        return redirect("/organizers/$organizer->id");
    }

    // action: delete an organizer
    public function destroy(Organizer $organizer): RedirectResponse
    {
        // TODO: authorize the delete organizer request

        // actually delete the organization
        $organizer->deleteOrFail();

        // return and redirect to organizers page
        return redirect('/organizers');
    }
}
