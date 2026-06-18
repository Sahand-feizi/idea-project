<x-modal name="delete-account" title="Delete Account">
    <form action="/profile" method="POST">
        @csrf
        @method('DELETE')
        <x-form.text-field label="Email" name="email" id="email" placeholder="you@example.com" required
            type="email" />
        <x-form.text-field label="Password" name="password" id="password" placeholder="........." type="password"
            required />
        <div class="flex items-center justify-end gap-2">
            <button type="button" @click="$dispatch('close-modal')" class="btn btn btn-outlined">Cancel</button>
            <button type="submit" class="btn btn-danger h-10" data-test="delete-account-button">Delete</button>
        </div>
    </form>
</x-modal>
