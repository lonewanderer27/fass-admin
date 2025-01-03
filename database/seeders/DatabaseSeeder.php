<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Organizer;
use App\Models\OrganizerMember;
use App\Models\OrganizerMemberInviteCode;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Sqids\Sqids;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Define a known password for testing
        $password = '$ecurePassword123';

        // Create a user with the known password
        $user = User::factory()->create([
            'name' => 'Juan Dela Cruz',
            'email' => 'juandelacruz@adamson.edu.ph',
            'password' => $password
        ]);

        // Create an organizer related to Adamson University
        $organizer = Organizer::create([
            'name' => 'Adamson University Cultural Department',
            'phone_no' => '02-8524-2011',
            'email' => 'aucd.mail@adamson.edu.ph'
        ]);

        // Instantiate a squid for generating unique invite codes
        $sqids = new Sqids(minLength: 6);

        // Create a unique invite code for the new user
        $organizerMemberInviteCode = OrganizerMemberInviteCode::create([
            'organizer_id' => $organizer->id,
            'invite_code' => $sqids->encode([$user->id]),
            'status' => 'used'
        ]);

        // Create an organizer member associated with the user and organizer
        $organizerMember = OrganizerMember::create([
            'user_id' => $user->id,
            'organizer_id' => $organizer->id,
            'role' => 'admin',
            'invite_code_id' => $organizerMemberInviteCode->id
        ]);

        // Predefined events
        $events = [
            [
                'title' => 'AdU Foundation Day Celebration',
                'description' => 'A week-long celebration with activities including a cultural parade, exhibits, and performances.',
                'date' => '2025-02-14',
                'time' => '09:00',
                'location' => 'ST Quadrangle',
            ],
            [
                'title' => 'Catholic Mass and Outreach Program',
                'description' => 'A special mass followed by community service activities to foster faith and social responsibility.',
                'date' => '2025-03-01',
                'time' => '08:00',
                'location' => 'AdU Church',
            ],
            [
                'title' => 'TechXplore 2025',
                'description' => 'A tech exhibition and seminar series featuring trends like AI, Blockchain, and Cybersecurity.',
                'date' => '2025-03-15',
                'time' => '10:00',
                'location' => 'ST Quadrangle',
            ],
            [
                'title' => 'AdU Inter-Collegiate Debate',
                'description' => 'A debate competition promoting critical thinking and communication skills among students.',
                'date' => '2025-04-10',
                'time' => '13:00',
                'location' => 'CS Auditorium',
            ],
            [
                'title' => 'Coding Hackathon: Innovate AdU',
                'description' => 'A 24-hour coding challenge to develop solutions for campus-based problems.',
                'date' => '2025-04-22',
                'time' => '08:00',
                'location' => 'CT Auditorium',
            ],
            [
                'title' => 'Adamson Sports Fest 2025',
                'description' => 'An inter-departmental sports festival featuring basketball, volleyball, and e-sports.',
                'date' => '2025-05-05',
                'time' => '07:00',
                'location' => 'SV Gymnasium',
            ],
            [
                'title' => 'AdU Event Fair 2025',
                'description' => 'A university-wide job fair connecting students and alumni to top employers.',
                'date' => '2025-05-25',
                'time' => '09:00',
                'location' => 'AdU Ozanam Building',
            ],
        ];

        // Create events associated with the organizer and creator member
        foreach ($events as $eventData) {
            Event::create([
                'organizer_id' => $organizer->id, // Use the created organizer
                'creator_member_id' => $organizerMember->id,
                'name' => $eventData['title'],
                'description' => $eventData['description'],
                'location' => $eventData['location'],
                'start_datetime' => "{$eventData['date']} {$eventData['time']}",
                'end_datetime' => "{$eventData['date']} {$eventData['time']}",
                'max_attendees' => 100, // Set max attendees as needed
            ]);
        }
    }
}
