@props(['user'])

<x-dashboard.layout>
    <div class="mb-4">
        <a href="/ideas" class="btn btn-outlined">
            <x-heroicon-o-arrow-left class="w-5 h-5 text-white"/>
            <span>Back to ideas</span>
        </a>
    </div>
    <div>
        <h2 class="text-xl font-bold text-foreground">Update Profile</h2>
        <form action="/profile" method="POST" class="w-full mt-2 space-y-6">
            @csrf
            @method('PATCH')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <x-form.text-field label="Name" name="name" id="name" placeholder="name" type="text"
                    :value="$user->name" required />
                <x-form.text-field label="Email" name="email" id="email" placeholder="you@example.com" required
                    type="email" />
                <x-form.text-field label="New Email" name="new_email" id="email" placeholder="new_email@example.com"
                    type="email" />
                <x-form.text-field label="Password" name="password" id="password" placeholder="........."
                    type="password" required />
                <x-form.text-field label="New Password" name="new_password" id="password" placeholder="........."
                    type="password" />
            </div>
            <button class="btn h-10" data-test="update-btn">Update</button>
        </form>
    </div>
    <div
        class="w-full bg-card border border-red-500 rounded-lg p-4 space-y-4 md:space-y-0 md:flex md:items-center md:justify-between mt-8">
        <div class="md:space-y-2">
            <h3 class="md:text-lg text-base font-bold text-foreground">Delete Account</h3>
            <p class="text-white/50 text-sm md:text-base">Once you delete your account, there is no going back. Please
                be certain.
            </p>
        </div>
        <div>
            <button class="btn btn-danger h-10" x-data @click="$dispatch('open-modal', 'delete-account')">
                Delete Account
            </button>
        </div>
    </div>
    <x-dashboard.delete-account-modal />
</x-dashboard.layout>
