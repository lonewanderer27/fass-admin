@props(['active' => false, 'type' => ''])

@if ($type == "a")
    <a {{ $attributes }}>
        {{ $slot }}
    </a>
@elseif($type == "button")
    <button {{ $attributes }}>
        {{ $slot }}
    </button>
@else
    <a {{ $attributes }}>
        {{ $slot }}
    </a>
@endif
