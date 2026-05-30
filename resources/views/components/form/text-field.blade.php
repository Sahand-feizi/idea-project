<div>
    <label class="label font-bold" for="{{ $attributes->get('id') }}">{{ $label }}</label>
    <input {{ $attributes->merge(['class' => 'input mt-2']) }} value="{{ old($attributes->get('name')) }}">
    @error($attributes->get('name'))
        <p class="error">{{ $message }}</p>
    @enderror
</div>