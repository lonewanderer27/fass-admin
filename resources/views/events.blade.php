<x-layout title="Events" :show_navbar="true">
    <x-slot:heading>
        Events
    </x-slot:heading>
    @foreach($events as $event)
        <div class="card bg-base-100">
            <div class="card-body">
                <h3 class="card-title">
                    <a href="/events/{{ $event['id'] }}" class="hover:underline hover:text-blue-500">{{ $event["name"] }}</a>
                </h3>
                <a class="font-bold text-blue-500" href="/organizers/{{ $event->organizer->id }}">{{ $event->organizer->name  }}</a>
                <p>{{ $event["description"] }}</p>
                <p>{{ $event["date"] }}</p>
                <p>{{ $event["time"] }}</p>
                <p>{{ $event["location"] }}</p>
            </div>
        </div>
    @endforeach
    <div class="p-8">
        {{$events->links()}}
    </div>
</x-layout>
