@props(['link'])

<x-card 
    :href="$link" 
    class="text-primary text-sm block"
>
    {{ $link }}
</x-card>