<x-layout>
    <header class="flex items-center justify-between w-full">
        <div class="space-y-2">
            <h1 class="text-4xl font-bold text-foreground">Ideas</h1>
            <p class="text-muted-foreground font-medium text-base">Campture your thoughts, Make a plan.</p>
        </div>
        <button x-data class="btn btn-primary h-10"  @click="$dispatch('open-modal', 'create-modal')" data-test="create-idea-button">Create new
            Idea</button>
    </header>

    <div class="flex items-center gap-2 mt-10">
        <a href="/ideas" class="btn {{ request()->has('status') ? 'btn-outlined' : '' }}">
            All
            <span class="ml-2">{{ $statusCount->get('all') }}</span>
        </a>
        @foreach (App\IdeaStatus::cases() as $status)
            <a href="/ideas?status={{ $status->value }}"
                class="btn {{ request('status') === $status->value ? '' : 'btn-outlined' }}">
                {{ $status->label() }}
                <span class="ml-2">{{ $statusCount->get($status->value) }}</span>
            </a>
        @endforeach
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-muted-foreground px-4 mt-8">
        @forelse ($ideas as $idea)
            <x-card href="/ideas/{{ $idea->id }}">
                <h3 class="text-xl font-bold text-foreground">{{ $idea->title }}</h3>
                <x-status class="m-2" :status="$idea->status" />

                <div class="mt-6">
                    <p>{{ $idea->description }}</p>
                </div>

                <div class="mt-5">
                    {{ $idea->created_at->diffForHumans() }}
                </div>
            </x-card>
        @empty
            <div>
                <p class="font-meduim text-lg">There is no idea</p>
            </div>
        @endforelse
    </div>

    <x-modal name="create-modal" title="Create Idea">
        <form x-data="{ status: 'pending' }" class="space-y-2" action="/ideas" method="POST">
            @csrf
            <x-form.text-field name="title" label="Title" placeholder="My idea is ...." id="title" required autofocus />

            <dev class="block mb-2!">
                <label for="" class="label font-bold">Status</label>
                <div class="flex items-center justify-between gap-2 mt-2">
                    @foreach (\App\IdeaStatus::cases() as $status)
                        <button type="button" class="btn flex-1 h-9" 
                        data-test="button-status-{{ $status->value }}" :class="status !== @js($status->value) ? 'btn-outlined' : ''"
                            @click="status = '{{ $status->value }}'">
                            {{ $status->label() }}
                        </button>
                    @endforeach
                </div>
                <input type="hidden" :value="status" name="status" />
                <x.form.error name="status" />
            </dev>

            <x-form.text-field name="description" label="Description" placeholder="I have ..." id="description"
                type="textarea" />

            <div class="flex items-center justify-end gap-2">
                <button type="button" @click="$dispatch('close-modal')" class="btn btn btn-outlined">Cancel</button>
                <button type="submit" class="btn btn-primary" data-test="create-button">Create</button>
            </div>
        </form>
    </x-modal>
</x-layout>
