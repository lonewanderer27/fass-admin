<style>
    #title {
        view-transition-name: title;
    }
</style>
<x-layout title="Event" :show_navbar="true" :show_heading="true">
    <x-slot:heading>
        <span id="title">
            {{ $event["name"] }}
        </span>
    </x-slot:heading>
    <div class="p-6 lg:p-8">
        <p><strong>Description: </strong>{{ $event["description"] }}</p>
        <p><strong>Venue: </strong>{{ $event["location"] }}</p>
        <p><strong>Starts at: </strong>{{ $event["start_datetime"] }}</p>
        <p><strong>Ends at: </strong>{{ $event["end_datetime"] }}</p>
        <p><strong>Room Capacity: </strong>{{ $event->max_attendees }}</p>
        <p><strong>Organizer: </strong>
            <a class="hover:underline" href="/organizers/{{$event->organizer->id}}">
                {{ $event->organizer->name }}
            </a>
        </p>
        @can('edit-event', $event)
            <div class="mt-6 flex items-center gap-x-6">
                <a class="btn  btn-secondary" href="/events/{{$event->id}}/edit">Edit</a>
            </div>
        @endcan
    </div>
</x-layout>
