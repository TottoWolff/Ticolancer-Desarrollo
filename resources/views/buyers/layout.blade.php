<!DOCTYPE html>
<html lang {{ str_replace('_', '-', app()->getLocale()) }}>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('icons/favicon.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <title>Ticolancer</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-bg font-main">

    @include('buyers.navbar')
    
    @yield('content')

    @include('ticolancer.footer')
    
</body>

</html> 