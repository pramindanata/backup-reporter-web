@if ($errors->any())
    <x-base.alert-danger {{ $attributes->merge(['class' => '']) }} title="Whoops !" :dismissable="true">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </x-base.alert-danger>
@endif
