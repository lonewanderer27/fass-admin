<x-layout title="Organizers" :show_navbar="true">
    <x-slot:heading>
        Organizers
    </x-slot:heading>
    @foreach($organizers as $organizer)
        <div class="card bg-base-100">
            <div class="card-body">
                <h3 class="card-title">
                    <a href="/events/{{ $organizer['id'] }}"
                       class="hover:underline hover:text-blue-500">{{ $organizer["name"] }}</a>
                </h3>
                <a class="font-bold text-blue-500"
                   href="/organizers/{{ $organizer->id }}">{{ $organizer->name  }}</a>
                <p>{{ $organizer["phone_no"] }}</p>
                <p>{{ $organizer["email"] }}</p>
            </div>
        </div>
    @endforeach
</x-layout>
