@props(['links'])

<div class="md:col-span-2 mt-8">
    <h3 class="text-2xl font-bold text-foreground">Links</h3>
    <div class="px-4 mt-6 space-y-2">
        @foreach ($links as $link)
            <x-idea.link-card :link="$link" />
        @endforeach
    </div>
</div>