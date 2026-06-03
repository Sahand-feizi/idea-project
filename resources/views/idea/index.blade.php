<x-layout>
    <header class="space-y-2">
        <h1 class="text-4xl font-bold text-foreground">Ideas</h1>
        <p class="text-muted-foreground font-medium text-base">Campture your thoughts, Make a plan.</p>
    </header>

    <div class="flex items-center gap-2 mt-10">
        <a href="/ideas"
            class="btn {{ request()->has('status') ? 'btn-outlined' : '' }}">
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
</x-layout>