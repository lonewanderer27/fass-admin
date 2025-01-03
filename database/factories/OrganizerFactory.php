<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organizer>
 */
class OrganizerFactory extends Factory
{
    protected static ?string $name;
    protected static ?string $phone_no;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // decide if the name will contain Adamson
        $with_adu = rand(1, 3) == 1;

        // construct an organization name
        $base_name = ($with_adu ? "Adamson" : "") . " " .
            fake()->company . ' ' .
            fake()->randomElement([
                'Student Council',
                'Student Organization',
                'Society',
                'Club',
                'Association',
                'Group',
                'Alliance',
                'Network',
                'Council',
            ]) . ' ' . Str::ucfirst(fake()->word);

        // generate the abbreviation of the organization name
        $abbv0 = array_filter(array_map(
            // only get the first letter of the word if it's not null
            fn($word) => $word ? $word[0] : null,
            // then the split words from organization name
            explode(" ", $base_name)
        ));

        return [
            'name' => $base_name . " " . "(" . implode("", $abbv0) . ")",
            'phone_no' => fake()->e164PhoneNumber()
        ];
    }
}
