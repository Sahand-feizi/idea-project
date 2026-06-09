@props(['is' => 'a'])

<{{ $is }} {{ $attributes(['class' => 'bg-card rounded-lg border border-border p-4']) }}>
    {{ $slot }}
</{{ $is }}>
