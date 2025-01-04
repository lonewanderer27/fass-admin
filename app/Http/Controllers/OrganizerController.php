<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
    public function show(Organizer $org): View
    {
        $members = $org->members()->take(3)->get();
        $events = $org->events()->take(3)->get();

        return view('organizers.show', [
            'organizer' => $org,
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
    public function edit(Organizer $org): View
    {
        return view('organizers.edit', [
            'organizer' => $org
        ]);
    }

    // action: new organizer
    public function store(Request $request): RedirectResponse
    {
        // validate request
        $request->validate([
            'name' => ['required', 'unique:organizers', 'min:3'],
            'phone_no' => ['required', 'size:10'],
            'description' => ['nullable'],
            'email' => ['nullable'],
            'avatar_url' => ['nullable'],
            'cover_url' => ['nullable']
        ]);

        // filter out the null values
        $filtered_values = array_filter($request->all(), fn($val) => !is_null($val));

        // create the new organizer
        $organizer = Organizer::create($filtered_values);

        // return and redirect to organizer page
        return redirect("/organizers/$organizer->id");
    }

    // action: update an organizer
    public function update(Organizer $org): RedirectResponse
    {
        // validate the request
        request()->validate([
            // third param allows us to exclude the rule of unique to the org id
            // which allows the org name to stay the same
            // in case the user decided to not edit it
            'name' => ['required',  'unique:organizers,name,' . $org->id, 'min:3'],
            'phone_no' => ['required', 'size:10'],
            'description' => ['nullable'],
            'email' => ['nullable'],
            'avatar_url' => ['nullable'],
            'cover_url' => ['nullable']
        ]);

        // TODO: authorize the edit organizer request

        // filter out the null values
        $filtered_values = array_filter(request()->all(), fn($val) => !is_null($val));

        // actually update the organizer
        $org->updateOrFail($filtered_values);

        // return and redirect to the organizer page
        return redirect("/organizers/$org->id");
    }

    // action: delete an organizer
    public function destroy(Organizer $org): RedirectResponse
    {
        // TODO: authorize the delete organizer request

        // actually delete the organization
        $org->deleteOrFail();

        // return and redirect to organizers page
        return redirect('/organizers');
    }
}
