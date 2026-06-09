@props(['idea'])

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