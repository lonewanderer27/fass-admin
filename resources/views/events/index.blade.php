<script>
    function extractIdFromUrl(url) {
        // Create a URL object for parsing
        const parsedUrl = new URL(url, window.location.origin);

        // Split the pathname by '/' and filter out empty segments
        const segments = parsedUrl.pathname.split('/').filter(Boolean);

        // Assuming the ID is always the second segment (e.g., '/events/1')
        const id = segments[1];

        return id ? parseInt(id, 10) : null; // Convert to integer or return null if not found
    }

    window.addEventListener('pageswap', async (e) => {
        if (e.viewTransition) {
            const targetUrl = new URL(e.activation.entry.url);
            console.log(targetUrl)

            // if we're going to events/1 page for example
            if (targetUrl.toString().includes("events")) {
                const id = extractIdFromUrl(targetUrl);

                // Set view-transition-name of
                document.querySelector(`#event-${id} h3 a`).style.viewTransitionName = 'title';

                // Remove view-transition-names after snapshots have been taken
                // (this to deal with BFCache)
                await e.viewTransition.finished;
                document.querySelector(`#event-${id} h3 a`).style.viewTransitionName = 'none';
                return;
            }

            if (targetUrl.toString().includes("organizers")) {
                const id = extractIdFromUrl(targetUrl);

                // Set view-transition-name of
                document.querySelector(`#event-${id} a`).style.viewTransitionName = 'title';

                // Remove view-transition-names after snapshots have been taken
                // (this to deal with BFCache)
                await e.viewTransition.finished;
                document.querySelector(`#event-${id} a`).style.viewTransitionName = 'none';
            }
        }
    })
</script>
<x-layout title="Events" :show_navbar="true">
    <x-slot:heading>
        Events
    </x-slot:heading>
    @foreach($events as $event)
        <div class="card bg-base-100">
            <div class="card-body" id="event-{{$event->id}}">
                <h3 class="card-title">
                    <a href="/events/{{ $event['id'] }}" class="hover:underline hover:text-blue-500">{{ $event["name"] }}</a>
                </h3>
                <a class="font-bold text-blue-500" href="/organizers/{{ $event->organizer->id }}">
                    {{ $event->organizer->name  }}
                </a>
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
