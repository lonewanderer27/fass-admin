<x-layout title="Organizers" :show_navbar="true">
    <x-slot:heading>
        Organizers
    </x-slot:heading>
    @foreach($organizers as $organizer)
        <div class="card bg-base-100">
            <div class="card-body">
                <h3 class="card-title">
                    <a href="/organizers/{{ $organizer['id'] }}"
                       class="hover:underline hover:text-blue-500">{{ $organizer["name"] }}</a>
                </h3>
                @if($organizer['description'])
                    <p>{{ $organizer["description"] }}</p>
                @endif
                @if($organizer['phone_no'])
                    <p>{{ $organizer["phone_no"] }}</p>
                @endif
                <p>{{ $organizer["email"] }}</p>
            </div>
        </div>
    @endforeach
    <div class="p-8">
        {{$organizers->links()}}
    </div>
</x-layout>
