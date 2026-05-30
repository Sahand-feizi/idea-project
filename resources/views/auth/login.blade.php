<x-form title="Sign in" caption="Start traking your ideas today.">
    <form action="/login" method="POST" class="w-full mt-8 space-y-6">
        @csrf
        <x-form.text-field 
            label="Email" 
            name="email" 
            id="email" 
            placeholder="you@example.com" 
            type="email"
        />
        <x-form.text-field 
            label="Password" 
            name="password" 
            id="password" 
            placeholder="........." 
            type="password"
        />
        <button class="btn w-full h-10">Sign in</button>
    </form>
</x-form>