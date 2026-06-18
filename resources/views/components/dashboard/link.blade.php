@props(['icon', 'activeIcon', 'active' => false])

<a
    class='w-full py-2 cursor-pointer flex items-center justify-center rounded-lg bg-transparent transition-all duration-200 md:justify-start md:gap-2 md:px-2 hover:bg-muted-foreground/30 {{ $active ? 'text-foreground' : 'hover:text-foreground text-gray-500' }}'
    {{ $attributes }}
    >
    <x-dynamic-component :component="$active ? $activeIcon : $icon" class="w-7 h-7" />
    <div class="hidden md:flex">{{ $slot }}</div>
</a>
