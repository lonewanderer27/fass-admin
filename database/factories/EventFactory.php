<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    private $rooms = [
        'Classroom',
        'Lecture hall',
        'Seminar room',
        'Computer lab',
        'Science lab',
        'Engineering lab',
        'Library',
        'Faculty office',
        'Department office',
        'Administrative office',
        'Conference room',
        'Reception area',
        'Student lounge',
        'Cafeteria',
        'Gymnasium',
        'Auditorium',
        'Activity room',
        'Dormitory',
        'Common room',
        'Clinic',
        'Counseling room',
        'Prayer room',
        'Storage room',
        'Maintenance room',
        'Server room',
        'Sports field',
        'Court',
        'Parking lot',
        'Greenhouse'
    ];

    private $buildings = [
        'CS',
        'SV',
        'FRC',
        'OZ',
        'ST',
        'CT'
    ];

    protected static ?string $organizer_id;
    protected static ?string $creator_member_id;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // decide how long this event will be
        $hours = rand(1, 5);

        // generate a start datetime using faker
        $originalDateTime = fake()->dateTimeBetween('now', '+1 week');

        // Create a copy of the original DateTime then add 2 hours to it
        $endDateTime = clone $originalDateTime;
        $endDateTime->modify("+$hours hours");

        return [
            'organizer_id' => static::$organizer_id ??= 1,
            'creator_member_id' => static::$creator_member_id ??= 1,
            'name' => Str::ucfirst(fake()->word) . ' ' .
                        fake()->randomElement(['Workshop', 'Conference', 'Summit', 'Meetup']) . ": " .
                        Str::ucfirst(fake()->words(rand(1, 2), true)),
            'description' => fake()->paragraph(),
            'location' => fake()->randomElement($this->buildings) . ' ' .
                          fake()->randomElement($this->rooms) . ' ' .
                          fake()->randomElement(range(1, 900)) .
                          fake()->randomElement(['', 'A', 'B', 'C']),
            'start_datetime' => $originalDateTime->format('Y-m-d H:i:s'),
            'end_datetime' => $endDateTime->format('Y-m-d H:i:s'),
            'max_attendees' => rand(20, 100),
        ];
    }
}
