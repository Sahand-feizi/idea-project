<dev class="block mb-2!">
    <label class="label font-bold">Status</label>
    <div class="flex items-center justify-between gap-2 mt-2">
        @foreach (\App\IdeaStatus::cases() as $status)
            <button type="button" class="btn flex-1 h-9" data-test="button-status-{{ $status->value }}"
                :class="status !== @js($status->value) ? 'btn-outlined' : ''"
                @click="status = '{{ $status->value }}'">
                {{ $status->label() }}
            </button>
        @endforeach
    </div>
    <input type="hidden" :value="status" name="status" />
    <x.form.error name="status" />
</dev>
