<div class="bg-card p-4 rounded-lg border-[1.5px] min-h-[calc(100vh-3rem)] border-muted-foreground sticky top-5">
    <x-dashboard.profile />
    <div class="space-y-4 mt-6">
        <x-dashboard.link icon="heroicon-o-cog-6-tooth" activeIcon="heroicon-s-cog-6-tooth" :active="request()->is('profile/settings')"
            href="/profile/settings">
            Settings
        </x-dashboard.link>
    </div>
</div>
