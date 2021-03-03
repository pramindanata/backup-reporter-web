@if (session('success'))
    <x-base.alert-success {{ $attributes->merge(['class' => '']) }} :dismissable="true">
        {{ session('success') }}
    </x-base.alert-success>
@endif
