@props([
    'method' => 'POST',
    'action',
    'idea' => null,
    'modalTitle',
    'modalName',
    'submitButtonTitle',
    'submitButtonTest',
])
@php
    $steps = [];
    $image = null;

    if ($idea and $idea->steps) {
        $steps = $idea->steps->map->only(['description', 'completed']);
    }

    if ($idea and $idea->image_path) {
        $image = asset('storage/' . $idea->image_path);
    }

    $alpine = [
        'status' => old('status', $idea->status->value ?? 'pending'),
        'newLink' => '',
        'links' => old('links', $idea->links ?? []),
        'newStep' => '',
        'steps' => old('steps', $steps),
        'imageUrl' => $image,
        'removeImageBtn' => false,
    ];

    $title = $idea->title ?? '';
    $description = $idea->description ?? '';
@endphp

<x-modal :name="$modalName" :title="$modalTitle">
    <form x-data='<?= json_encode($alpine) ?>' class="space-y-2" :action="$action" method="POST"
        enctype="multipart/form-data">
        @csrf
        @if ($method === 'PATCH')
            @method('PATCH')
        @endif

        <x-form.text-field name="title" label="Title" placeholder="My idea is ...." id="title" :value="$title"
            required autofocus />
        <x-idea.modal.input.status />
        <x-form.text-field name="description" label="Description" placeholder="I have ..." id="description"
            :value="$description" type="textarea" />
        <x-idea.modal.input.image />
        <x-idea.modal.input.steps />
        <x-idea.modal.input.links />

        <div class="flex items-center justify-end gap-2">
            <button type="button" @click="$dispatch('close-modal')" class="btn btn btn-outlined">Cancel</button>
            <button type="submit" class="btn btn-primary"
                data-test="{{ $submitButtonTest }}">{{ $submitButtonTitle }}</button>
        </div>
    </form>
</x-modal>
