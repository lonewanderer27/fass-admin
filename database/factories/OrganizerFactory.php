<?php

namespace Database\Factories;

use App\Models\Organizer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Organizer>
 */
class OrganizerFactory extends Factory
{
    protected ?string $name;
    protected ?string $phone_no;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // construct an organization name
        $base_name = (rand(1, 3) == 1 ? "Adamson " : "") .
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
            ]) . ' ' .
            Str::ucfirst(fake()->word);

        // generate the abbreviation of the organization name
        $abbv = array_filter(array_map(
        // only get the first letter of the word if it's not null
            fn($word) => ($word && $word != "and") ? $word[0] : null,
            // then the split words from organization name
            explode(" ", $base_name)
        ));

        return [
            'name' => $this->name ??= $base_name . " " . "(" . implode("", $abbv) . ")",
            'phone_no' => $this->phone_no ??= fake()->e164PhoneNumber()
        ];
    }
}
