<div {{ $attributes->merge([
    'class' => 'alert alert-' . $variant . ' ' . $getDismissClass
    ]) }}
role="alert">
    @if ($title)
        <div class="alert-title">{{ $title }}</div>
    @endif

    @if ($dismissable)
        <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="alert"></button>
    @endif

    <div class="alert-body">
        {{ $slot }}
    </div>
</div>
