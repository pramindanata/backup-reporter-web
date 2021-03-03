@props([
    'title' => null,
    'dismissable' => false,
])

<x-base.alert
    variant="success"
    :dismissable="$dismissable"
    title="{{ $title }}"
    {{ $attributes->merge(['class' => '']) }}
>
    {{ $slot }}
</x-base.alert>
