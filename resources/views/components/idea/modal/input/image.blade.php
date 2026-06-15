<div class="space-y-2">
    <label for="image" class="label font-bold">Feature Image</label>
    <div class="relative" @mouseenter="removeImageBtn = true" @mouseleave="removeImageBtn = false">
        <img x-show="imageUrl" :src="imageUrl" alt="Preview" class="mb-2 w-full h-40 rounded-lg object-cover">
        <button class="absolute bottom-0 w-full h-20 bg-linear-to-t from-black to-transparent text-red-500 font-bold"
            x-show="removeImageBtn" x-transition:enter="ease-out duration-200" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-150"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" type="button"
            @click="
                imageUrl = ''; // Reset imageUrl Alpine data
                document.getElementById('image').value = null; // Reset the file input
                removeImageBtn = false; // Hide button immediately after click
            ">Remove</button>
    </div>
    <input type="file" name="image" id="image"
        @change="imageUrl = $event.target.files[0] ? URL.createObjectURL($event.target.files[0]) : ''">
    <x-form.error name="image" />
</div>
