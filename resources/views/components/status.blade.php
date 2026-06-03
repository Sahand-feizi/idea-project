@props(['status'])

<span {{ $attributes(['class' => "inline-block px-2 py-1 rounded-full text-xs border {$status->color()}"]) }}>
    {{ $status->label() }}
</span>