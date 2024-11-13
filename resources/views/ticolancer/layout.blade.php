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

    @if(auth('buyers')->check())
        @if(auth('buyers')->check() && \App\Models\SellersUsersTicolancer::where('buyers_users_ticolancers_id', auth('buyers')->user()->id)->exists())
        <!-- Navbar para vendedores -->
        @include('sellers.navbar')
    @else
        <!-- Navbar para compradores o usuarios no vendedores -->
        @include('buyers.navbar')
    @endif
    @else
        <!-- Navbar para visitantes -->
        @include('ticolancer.header')
    @endif

   

    @yield('content')

    @include('ticolancer.footer')

</body>

</html>