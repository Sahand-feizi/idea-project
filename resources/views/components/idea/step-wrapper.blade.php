@props(['steps'])

<div class="md:col-span-2 mt-8">
    <h3 class="text-2xl font-bold text-foreground">Actionable Steps</h3>
    <div class="px-4 mt-6 space-y-2">
        @foreach ($steps as $step)
            <x-idea.step-card :step="$step" />
        @endforeach
    </div>
</div>