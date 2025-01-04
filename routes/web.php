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

Route::get('/events/{id}', function ($id) {
    $event = Event::find($id);
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
//    dd(request()->all());

    // filter out the null values
    $filtered_values = array_filter(request()->all(), fn($val) => !is_null($val));

    // create the new organizer
    Organizer::create($filtered_values);

    // return and redirect to organizers page
    return redirect('/organizers');
});

Route::get('/organizers/{id}', function ($id) {
    $organizer = Organizer::find($id);
    $members = $organizer->members()->take(3)->get();
    $events = $organizer->events()->take(3)->get();

    return view('organizers.show', [
        'organizer' => $organizer,
        'members' => $members,
        'events' => $events
    ]);
});

if (env('APP_ENV') == "production") {
    URL::forceScheme('https');
}
