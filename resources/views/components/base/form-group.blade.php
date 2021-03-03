@props([
    'for' => '',
    'label'
])

<div {{ $attributes->merge(['class' => 'form-group']) }}>
    <label for="{{ $for }}" class="form-label">{{ $label }}</label>

    {{ $slot }}
</div>
