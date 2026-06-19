@props(['is' => 'a'])

<{{ $is }} {{ $attributes(['class' => 'block bg-card rounded-lg border border-border p-4']) }}>
    {{ $slot }}
</{{ $is }}>
