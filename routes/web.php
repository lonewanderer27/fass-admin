<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function() {
    return view('login');
});

Route::get('/signup', function() {
    return view('signup');
});

Route::get('/events/{id}', function($id) {
    $events = [
        [
            'id' => 0,
            'organizer_id' => 0,
            'title' => 'Event 1',
            'description' => 'Event 1 description',
            'date' => '2021-01-01',
            'time' => '12:00',
            'location' => 'Event 1 location',
        ],
        [
            'id' => 1,
            'organizer_id' => 0,
            'title' => 'Event 2',
            'description' => 'Event 2 description',
            'date' => '2021-01-02',
            'time' => '12:00',
            'location' => 'Event 2 location',
        ],
        [
            'id' => 2,
            'organizer_id' => 0,
            'title' => 'Event 3',
            'description' => 'Event 3 description',
            'date' => '2021-01-03',
            'time' => '12:00',
            'location' => 'Event 3 location',
        ]
    ];

    $event = array_find($events, fn($event) => $event['id'] == $id);
    return view('event', [
        'event' => $event
    ]);
});

Route::get('/events', function () {
    return view('events', [
        'events' => [
            [
                'id' => 0,
                'organizer_id' => 0,
                'title' => 'Event 1',
                'description' => 'Event 1 description',
                'date' => '2021-01-01',
                'time' => '12:00',
                'location' => 'Event 1 location',
            ],
            [
                'id' => 1,
                'organizer_id' => 0,
                'title' => 'Event 2',
                'description' => 'Event 2 description',
                'date' => '2021-01-02',
                'time' => '12:00',
                'location' => 'Event 2 location',
            ],
            [
                'id' => 2,
                'organizer_id' => 0,
                'title' => 'Event 3',
                'description' => 'Event 3 description',
                'date' => '2021-01-03',
                'time' => '12:00',
                'location' => 'Event 3 location',
            ]
        ]
    ]);
});

if (env('APP_ENV') == "production") { URL::forceScheme('https'); }
