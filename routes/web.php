<?php

use App\Models\Event;
use App\Models\Organizer;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

Route::get('/', function () {
    return view('home');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/events/{event}', function (Event $event) {
    $organizer = $event->organizer;

    return view('events.show', [
        'event' => $event,
        'organizer' => $organizer
    ]);
});

Route::get('/events', function () {
    $events = Event::with('organizer')->paginate(9);

    return view('events.index', [
        'events' => $events
    ]);
});

Route::get('/organizers', function() {
    $organizers = Organizer::paginate(9);

    return view('organizers.index', [
        'organizers' => $organizers
    ]);
});

Route::get('/organizers/create', function() {
    return view('organizers.create');
});

Route::post('/organizers', function() {
    // validate request
    request()->validate([
        'name' => ['required', 'unique:organizers', 'min:3'],
        'phone_no' => ['required', 'size:10'],
        'description' => ['nullable'],
        'email' => ['nullable'],
        'avatar_url' => ['nullable'],
        'cover_url' => ['nullable']
    ]);

    // filter out the null values
    $filtered_values = array_filter(request()->all(), fn($val) => !is_null($val));

    // create the new organizer
    Organizer::create($filtered_values);

    // return and redirect to organizers page
    return redirect('/organizers');
});

Route::delete('/organizers/{org}', function (Organizer $org) {
    // TODO: authorize the delete organizer request

    // actually delete the organization
    $org->deleteOrFail();

    // return and redirect to organizers page
    return redirect('/organizers');
});

Route::patch('/organizers/{org}', function (Organizer $org) {
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
});

Route::get('/organizers/{org}', function (Organizer $org) {
    $members = $org->members()->take(3)->get();
    $events = $org->events()->take(3)->get();

    return view('organizers.show', [
        'organizer' => $org,
        'members' => $members,
        'events' => $events
    ]);
});

Route::get('/organizers/{org}/edit', function(Organizer $org) {
    return view('organizers.edit', [
        'organizer' => $org
    ]);
});

if (env('APP_ENV') == "production") {
    URL::forceScheme('https');
}
