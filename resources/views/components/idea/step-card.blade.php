@props(['step'])

<x-card is="div">
    <form method="POST" action="{{ route('step.update', $step) }}">
        @csrf
        @method('PATCH')
        <div class="flex items-center gap-x-2">
            <button
                class="size-5 w-6 h-6 rounded-full flex items-center justify-center border border-primary text-primary-foreground {{ $step->completed ? 'bg-primary' : '' }}"
                role="checkbox" type="submit">
                &check;
            </button>
            <p class="{{ $step->completed ? 'line-through text-muted-foreground' : '' }}">{{ $step->description }}</p>
        </div>
    </form>
</x-card>