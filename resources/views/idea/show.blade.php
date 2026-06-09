<x-layout>
    <div class="mt-8">
        <div class="md:col-span-3 flex items-center justify-between">
            <a href="/ideas" class="flex text-lg items-center gap-2">
                <x-icon.arrow />
                Back to ideas
            </a>
            <div class="flex items-center gap-4">
                <button class="btn-outlined flex items-center gap-2">
                    <x-icon.external />
                    Edit Idea
                </button>
                <button x-data class="btn-outlined text-red-500" @click="$dispatch('open-modal', 'delete-idea')"
                    data-test="delete-idea-button">Delete</button>
            </div>
        </div>
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
            <div class="md:col-span-2 mt-8">
                <h3 class="text-2xl font-bold text-foreground">Actionable Steps</h3>
                <div class="px-4 mt-6 space-y-2">
                    @foreach ($idea->steps as $step)
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
                    @endforeach
                </div>
            </div>
        @endif
        @if ($idea->links->count())
            <div class="md:col-span-2 mt-8">
                <h3 class="text-2xl font-bold text-foreground">Links</h3>
                <div class="px-4 mt-6 space-y-2">
                    @foreach ($idea->links as $link)
                        <x-card :href="$link" class="text-primary text-sm block">
                            {{ $link }}
                        </x-card>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    {{-- model --}}
    <x-modal name="delete-idea" title="Are you sure that you want to delete this idea?">
        <div class="flex items-center justify-end grid-cols-2 gap-2">
            <button @click="$dispatch('close-modal')"
                class="btn-outlined h-9 border border-muted-foreground rounded-lg px-3">
                Cancel
            </button>
            <form method="POST" action="{{ route('idea.destroy', $idea) }}">
                @csrf
                @method('DELETE')
                <button data-test="delete-button" @click="show = false"
                    class="btn-outlined px-3 text-red-500 border h-9 border-red-500 rounded-lg hover:bg-red-500 hover:text-foreground transition-all duration-300 w-full">
                    Yest, I am.
                </button>
            </form>
        </div>
    </x-modal>
</x-layout>