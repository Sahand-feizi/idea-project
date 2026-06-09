<x-layout>
    <div class="mt-8">
        <x-idea.idea-header />
        <div class="md:col-span-2 mt-8 text-muted-foreground space-y-6">
            <h1 class="text-4xl font-bold text-foreground">{{ $idea->title }}</h1>
            <div class="flex items-center gap-2">
                <x-status :status="$idea->status" />
                <div>
                    {{ $idea->created_at->diffForHumans() }}
                </div>
            </div>
            <div class="px-4 text-foreground text-lg cursor-pointer">
                <p>{{ $idea->description }}</p>
            </div>
        </div>
        @if ($idea->steps->count())
            <x-idea.step-wrapper :steps="$idea->steps" />
        @endif
        @if ($idea->links->count())
            <x-idea.link-wrapper :links="$idea->links" />
        @endif
    </div>

    {{-- model --}}
    <x-idea.delete-modal :idea="$idea" />
</x-layout>