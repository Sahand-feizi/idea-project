@props(['status'])

<span class="inline-block px-2 py-1 rounded-full mt-2 text-xs border {{ $status->color() }}">
    {{ $status->label() }}
</span>