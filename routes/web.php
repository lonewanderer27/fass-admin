<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Arr;

Route::get('/', function () {
    return view('home');
});

Route::get('/welcome', function () {
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
            'organizer_id' => 1,
            'title' => 'AdU Foundation Day Celebration',
            'description' => 'A week-long celebration with activities including a cultural parade, exhibits, and performances.',
            'date' => '2025-02-14',
            'time' => '09:00',
            'location' => 'ST Quadrangle',
        ],
        [
            'id' => 1,
            'organizer_id' => 2,
            'title' => 'Catholic Mass and Outreach Program',
            'description' => 'A special mass followed by community service activities to foster faith and social responsibility.',
            'date' => '2025-03-01',
            'time' => '08:00',
            'location' => 'AdU Church',
        ],
        [
            'id' => 2,
            'organizer_id' => 3,
            'title' => 'TechXplore 2025',
            'description' => 'A tech exhibition and seminar series featuring trends like AI, Blockchain, and Cybersecurity.',
            'date' => '2025-03-15',
            'time' => '10:00',
            'location' => 'ST Quadrangle',
        ],
        [
            'id' => 3,
            'organizer_id' => 4,
            'title' => 'AdU Inter-Collegiate Debate',
            'description' => 'A debate competition promoting critical thinking and communication skills among students.',
            'date' => '2025-04-10',
            'time' => '13:00',
            'location' => 'CS Auditorium',
        ],
        [
            'id' => 4,
            'organizer_id' => 5,
            'title' => 'Coding Hackathon: Innovate AdU',
            'description' => 'A 24-hour coding challenge to develop solutions for campus-based problems.',
            'date' => '2025-04-22',
            'time' => '08:00',
            'location' => 'CT Auditorium',
        ],
        [
            'id' => 5,
            'organizer_id' => 6,
            'title' => 'Adamson Sports Fest 2025',
            'description' => 'An inter-departmental sports festival featuring basketball, volleyball, and e-sports.',
            'date' => '2025-05-05',
            'time' => '07:00',
            'location' => 'SV Gymnasium',
        ],
        [
            'id' => 6,
            'organizer_id' => 7,
            'title' => 'AdU Job Fair 2025',
            'description' => 'A university-wide job fair connecting students and alumni to top employers.',
            'date' => '2025-05-25',
            'time' => '09:00',
            'location' => 'AdU Ozanam Building',
        ],
    ];

    $event = Arr::first($events, fn($event) => $event['id'] == $id);

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
