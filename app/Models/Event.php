<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Event {
    public static function all(): array {
        return [
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
                'title' => 'AdU Event Fair 2025',
                'description' => 'A university-wide job fair connecting students and alumni to top employers.',
                'date' => '2025-05-25',
                'time' => '09:00',
                'location' => 'AdU Ozanam Building',
            ],
        ];
    }

    public static function findEvent($id): array {
        $event = Arr::first(static::all(), fn($event) => $event['id'] == $id);

        if (!$event) {
            abort(404);
        }

        return $event;
    }
}
