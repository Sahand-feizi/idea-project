<div>
    <fieldset>
        <legend class="label font-bold">Actionable Steps</legend>

        <template x-for="(step, index) in steps" :key="step.description + index">
            <div class="flex items-center mt-2 gap-2">
                <div class="relative flex-1">
                    <input :name="`steps[${index}][description]`" x-model="step.description" type="text"
                        class="input w-full border border-muted-foreground text-muted-foreground" readonly>
                    <input type="hidden" x-model="step.completed" :name="`steps[${index}][completed]`" />
                    <span class="text-muted-foreground text-xs px-2 rounded-xl absolute -top-2 bg-black z-10 left-2"
                        x-text="'#' + (index + 1)">
                    </span>
                </div>
                <button @click="steps.splice(index, 1)">
                    <x-icon.close class="form-muted-icon hover:text-red-500" />
                </button>
            </div>
        </template>

        <div class="flex items-center mt-2 gap-2">
            <input data-test="add-step-input" x-model="newStep" type="text" class="input flex-1" type="text"
                id="new-step" placeholder="What needs to be done?">
            <button data-test="add-step-button" @click="steps.push({description: newStep.trim(), completed: '0'}); newStep = ''" type="button"
                data-test="add-step-button" :disabled="newStep.trim().length === 0">
                <x-icon.close class="rotate-45 form-muted-icon" />
            </button>
        </div>
        <x-form.error name="steps" />
    </fieldset>
</div>
