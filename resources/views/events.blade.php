<x-layout title="Events" :showNavBar="true">
    <x-slot:heading>
        Events
    </x-slot:heading>
    <h1 class="text-2xl">Events</h1>
    @foreach($events as $event)
        <div>
            <p>{{ $event["title"] }}</p>
            <p>{{ $event["description"] }}</p>
            <p>{{ $event["date"] }}</p>
            <p>{{ $event["time"] }}</p>
            <p>{{ $event["location"] }}</p>
        </div>
    @endforeach
</x-layout>
