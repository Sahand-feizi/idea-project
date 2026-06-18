<div>
    <div
        class="flex items-center justify-center h-11 w-11 md:w-18 md:h-18 mx-auto bg-primary/50 rounded-full border-2 border-primary">
        <span class="text-primary font-meduim text-xl">{{ strtoupper(Auth::user()->name[0]) }}</span>
    </div>
    <div class="hidden md:flex mt-2 justify-center text-primary text-lg">
        <h2>{{ strtoupper(Auth::user()->name) }}</h2>
    </div>
</div>
