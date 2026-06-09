<x-layout>
    <header class="flex items-center justify-between w-full">
        <div class="space-y-2">
            <h1 class="text-4xl font-bold text-foreground">Ideas</h1>
            <p class="text-muted-foreground font-medium text-base">Campture your thoughts, Make a plan.</p>
        </div>
        <button x-data class="btn btn-primary h-10" @click="$dispatch('open-modal', 'create-modal')"
            data-test="create-idea-button">Create new
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
        <form x-data="{ status: 'pending', 'newLink': '', links: [], newStep: '', steps: [] }" class="space-y-2"
            action="/ideas" method="POST">
            @csrf
            <x-form.text-field name="title" label="Title" placeholder="My idea is ...." id="title" required autofocus />

            <dev class="block mb-2!">
                <label for="" class="label font-bold">Status</label>
                <div class="flex items-center justify-between gap-2 mt-2">
                    @foreach (\App\IdeaStatus::cases() as $status)
                        <button type="button" class="btn flex-1 h-9" data-test="button-status-{{ $status->value }}"
                            :class="status !== @js($status->value) ? 'btn-outlined' : ''"
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

            <div>
                <fieldset>
                    <legend class="label font-bold">Actionable Steps</legend>

                    <template x-for="(step, index) in steps" :key="step">
                        <div class="flex items-center mt-2 gap-2">
                            <div class="relative flex-1">
                                <input name="steps[]" x-model="step" type="text"
                                    class="input w-full border border-muted-foreground text-muted-foreground" readonly>
                                <span
                                    class="text-muted-foreground text-xs px-2 rounded-xl absolute -top-2 bg-black z-10 left-2"
                                    x-text="'#' + (index + 1)">
                                </span>
                            </div>
                            <button @click="steps.splice(index, 1)">
                                <x-icon.close class="form-muted-icon hover:text-red-500" />
                            </button>
                        </div>
                    </template>

                    <div class="flex items-center mt-2 gap-2">
                        <input x-model="newStep" type="text" class="input flex-1" type="text" id="new-step"
                            data-test="add-step-input" placeholder="What needs to be done?">
                        <button @click="steps.push(newStep.trim()); newStep = ''" type="button"
                            data-test="add-step-button" :disabled="newStep.trim().length === 0">
                            <x-icon.close class="rotate-45 form-muted-icon" />
                        </button>
                    </div>
                    <x-form.error name="steps" />
                </fieldset>
            </div>

            <div>
                <fieldset>
                    <legend class="label font-bold">Links</legend>

                    <template x-for="(link, index) in links" :key="link">
                        <div class="flex items-center mt-2 gap-2">
                            <div class="relative flex-1">
                                <input name="links[]" x-model="link" type="text"
                                    class="input w-full border border-muted-foreground text-muted-foreground" readonly>
                                <span
                                    class="text-muted-foreground text-xs px-2 rounded-xl absolute -top-2 bg-black z-10 left-2"
                                    x-text="'#' + (index + 1)">
                                </span>
                            </div>
                            <button @click="links.splice(index, 1)">
                                <x-icon.close class="form-muted-icon hover:text-red-500" />
                            </button>
                        </div>
                    </template>

                    <div class="flex items-center mt-2 gap-2">
                        <input x-model="newLink" type="text" class="input flex-1" type="url" id="new-link"
                            data-test="add-link-input" placeholder="https://example.com">
                        <button @click="links.push(newLink.trim()); newLink = ''" type="button"
                            data-test="add-link-button" :disabled="newLink.trim().length === 0">
                            <x-icon.close class="rotate-45 form-muted-icon" />
                        </button>
                    </div>
                </fieldset>
            </div>

            <div class="flex items-center justify-end gap-2">
                <button type="button" @click="$dispatch('close-modal')" class="btn btn btn-outlined">Cancel</button>
                <button type="submit" class="btn btn-primary" data-test="create-button">Create</button>
            </div>
        </form>
    </x-modal>
</x-layout>