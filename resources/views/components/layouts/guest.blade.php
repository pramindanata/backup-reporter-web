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

<body class="antialiased border-top-wide border-primary d-flex flex-column">
    <div class="flex-fill d-flex flex-column justify-content-center py-4">
        <div class="container-tight py-6">
            <div class="text-center mb-4">
                <h1>{{ config('app.name') }}</h1>
            </div>

            {{ $slot }}
        </div>
    </div>

    @stack('modals')

    <script src="{{ mix('js/app.js') }}"></script>

    @stack('scripts')
</body>

</html>
