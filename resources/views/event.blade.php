<x-layout title="Event" :showNavBar="true" :show_heading="true">
    <x-slot:heading>
        Event
    </x-slot:heading>
    <div>
        <p>{{ $event["name"] }}</p>
        <p>{{ $event["description"] }}</p>
        <p>{{ $event["date"] }}</p>
        <p>{{ $event["time"] }}</p>
        <p>{{ $event["location"] }}</p>
    </div>
</x-layout>
