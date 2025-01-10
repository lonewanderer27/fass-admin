<?php

namespace App\Jobs;

use App\Models\Organizer;
use GeminiAPI\Laravel\Facades\Gemini;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ImagineOrganizerDescription implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Organizer $organizer)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        logger("Imagined description for: " . $this->organizer->name);

        // call gemini to create a bio for organizer
        $bio = Gemini::generateText("Given the name of an organizer: " . $this->organizer->name . " .Imagine a short, creative, professional and convincing description. Strictly limit this to 200 characters or below!");
        logger($bio);

        // modify the organizer record
        $this->organizer->description = $bio;

        // save the record
        $this->organizer->save();
    }
}
