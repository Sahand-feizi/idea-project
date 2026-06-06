@props(['id', 'name', 'type' => 'text', 'label' => false])

<div>
    @if ($label)
        <label class="label font-bold" for="{{ $id }}">{{ $label }}</label>
    @endif
    
    @if($type === 'textarea')
        <textarea 
            name="{{ $name }}" 
            id="{{ $id }}" 
            class="textarea mt-2" 
            {{ $attributes }}
        >{{ old($name) }}</textarea>
    @else
        <input
            name="{{ $name }}"
            id="{{ $id }}"
            type="{{ $type }}"
            class="input mt-2"
            value="{{ old($name) }}"
            {{ $attributes }}
        />
    @endif

    <x-form.error name="{{ $name }}" />
</div>
