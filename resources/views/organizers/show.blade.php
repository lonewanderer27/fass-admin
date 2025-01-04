<x-layout title="Event" :show_navbar="true" :show_heading="true">
    <x-slot:heading>
        Organizer
    </x-slot:heading>
    <div>
        <p>{{ $organizer["name"] }}</p>
        <p>{{ $organizer["phone_no"] }}</p>
    </div>
</x-layout>
