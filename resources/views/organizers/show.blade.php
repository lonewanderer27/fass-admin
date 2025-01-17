<x-layout title="{{$organizer->name}}" :show_navbar="true" :show_heading="true">
    <x-slot:heading>
        <span style="view-transition-name: title">
            {{ $organizer["name"] }}
        </span>
    </x-slot:heading>
    <div class="p-6 lg:p-8">
        @if($organizer->description)
            <p>{{ $organizer["description"] }}</p>
        @endif
        <p><strong>Phone No:</strong> {{ $organizer["phone_no"] }}</p>
        @if($organizer->email)
            <p><strong>Email:</strong> {{ $organizer["email"] }}</p>
        @endif
        @can('edit-organizer', $organizer)
            <div class="mt-6 flex items-center gap-x-6">
                <a class="btn  btn-secondary" href="/organizers/{{$organizer->id}}/edit">Edit</a>
            </div>
        @endcan
    </div>
</x-layout>
