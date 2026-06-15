<div class="md:col-span-3 flex items-center justify-between">
    <a href="/ideas" class="flex text-lg items-center gap-2">
        <x-icon.arrow />
        Back to ideas
    </a>
    <div class="flex items-center gap-4">
        <button x-data @click="$dispatch('open-modal', 'update-modal')" class="btn-outlined flex items-center gap-2">
            <x-icon.external />
            Edit Idea
        </button>
        <button x-data class="btn-outlined text-red-500" @click="$dispatch('open-modal', 'delete-idea')"
            data-test="delete-idea-button">Delete</button>
    </div>
</div>