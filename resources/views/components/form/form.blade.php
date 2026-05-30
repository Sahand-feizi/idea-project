@props([
    'title',
    'caption'
])

<x-layout.layout>
    <div class="w-full max-w-md mx-auto">
        <div class="text-center">
            <h1 class="text-2xl font-bold">{{ $title }}</h1>
            <p class="text-base font-meduim text-muted-foreground">{{ $caption }}</p>
        </div>
        {{ $slot }}
    </div>
</x-layout.layout>