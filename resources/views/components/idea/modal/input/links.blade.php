<div>
    <fieldset>
        <legend class="label font-bold">Links</legend>

        <template x-for="(link, index) in links" :key="link">
            <div class="flex items-center mt-2 gap-2">
                <div class="relative flex-1">
                    <input name="links[]" x-model="link" type="text"
                        class="input w-full border border-muted-foreground text-muted-foreground" readonly>
                    <span class="text-muted-foreground text-xs px-2 rounded-xl absolute -top-2 bg-black z-10 left-2"
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
            <button @click="links.push(newLink.trim()); newLink = ''" type="button" data-test="add-link-button"
                :disabled="newLink.trim().length === 0">
                <x-icon.close class="rotate-45 form-muted-icon" />
            </button>
        </div>
    </fieldset>
</div>
