@props([
    'label' => null,
    'for' => null,
    'required' => false,
])

<div {{ $attributes->merge(['class' => 'form-group row']) }}>
    @if ($label)
        <label
            for="{{ $for }}"
            class="form-label col-form-label text-md-end col-12 col-md-3 col-lg-3"
        >{{ $label }}@if ($required)<span class="ms-1 text-danger">*</span>@endif</label>
    @else
        <div class="text-md-right col-12 col-md-3 col-lg-3"></div>
    @endif

    <div class="col-sm-12 col-md-7 d-flex align-items-center flex-wrap">
        {{ $slot }}
    </div>
</div>
