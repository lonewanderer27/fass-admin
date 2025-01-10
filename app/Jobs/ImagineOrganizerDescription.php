<?php

namespace App\Jobs;

use App\Models\Organizer;
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
        // TODO: Integrate Gemini API call to do this
        logger("Imagining description for organizer title: " . $this->organizer->name);
    }
}
