<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Beta Material-Colors</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js" defer></script>

    <link rel="stylesheet" href="{{ asset('css/prism.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>


<body>

@yield('header')

@yield('content')

</body>

<script src="{{ asset('js/app.js') }}"></script>

</html>
