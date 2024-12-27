<x-layout title="Event">
    <x-slot:heading>
        Event
    </x-slot:heading>
    <h1 class="text-2xl">Event</h1>
        <div>
            <p>{{ $event["title"] }}</p>
            <p>{{ $event["description"] }}</p>
            <p>{{ $event["date"] }}</p>
            <p>{{ $event["time"] }}</p>
            <p>{{ $event["location"] }}</p>
        </div>
</x-layout>
