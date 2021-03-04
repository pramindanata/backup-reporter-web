@props(['title'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>

<body class="antialiased">
    <div class="page">
        <x-header />

        <x-navbar />

        <div class="content">
            {{ $slot }}

            <x-footer />
        </div>
    </div>

    @stack('modals')

    <script src="{{ mix('js/app.js') }}"></script>

    @stack('scripts')
</body>
</body>

</html>
