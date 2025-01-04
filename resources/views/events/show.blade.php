<x-layout title="Event" :show_navbar="true" :show_heading="true">
    <x-slot:heading>
        {{ $event["name"] }}
    </x-slot:heading>
    <div class="p-6 lg:p-8">
        <p><strong>Description: </strong>{{ $event["description"] }}</p>
        <p><strong>Venue: </strong>{{ $event["location"] }}</p>
        <p><strong>Starts at: </strong>{{ $event["start_datetime"] }}</p>
        <p><strong>Ends at: </strong>{{ $event["end_datetime"] }}</p>
        <p><strong>Room Capacity: </strong>{{ $event->max_attendees }}</p>
        <p><strong>Organizer: </strong>{{ $event->organizer->name }}</p>
        <p><strong>Organizer: </strong>
            <a class="hover:underline" href="/organizers/{{$event->organizer->id}}">
                {{ $event->organizer->name }}
            </a>
        </p>
    </div>
</x-layout>
