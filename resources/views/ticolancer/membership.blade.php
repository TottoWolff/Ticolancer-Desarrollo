@extends('buyers.layout')
@section ('content')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mejora tu plan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100">

<div class="w-full max-w-5xl mx-auto p-4 mt-[140px]">
    <div class="flex flex-col items-center space-y-6">
        <h1 class="text-3xl font-bold">Mejora tu plan</h1>


        <div class="grid md:grid-cols-3 gap-6 w-full">
            <div class="bg-white rounded-lg shadow border hover:border-blue-500 p-6 gap-5 grid">
                <h2 class="text-xl font-semibold">Semestral</h2>
                <div class="flex items-baseline">
                    <span class="text-3xl font-bold">₡5,000</span>
                    <span class="text-sm text-gray-500 ml-1">/mes</span>
                </div>
                <p class="text-sm text-gray-500">Aumenta tu productividad con un acceso extendido</p>
                <a href="{{ route('payment') }}" class="w-full bg-green hover:bg-blue text-white py-2 rounded mt-4 text-center">Elegir plan</a>
                
            </div>

            <div class="bg-white rounded-lg shadow border hover:border-blue-500 p-6 gap-5 grid">
                <h2 class="text-xl font-semibold">Semestral</h2>
                <div class="flex items-baseline">
                    <span class="text-3xl font-bold">₡25,000</span>
                    <span class="text-sm text-gray-500 ml-1">/mes</span>
                </div>
                <p class="text-sm text-gray-500">Aumenta tu productividad con un acceso extendido</p>
                <a href="{{ route('payment') }}" class="w-full bg-green hover:bg-blue text-white py-2 rounded mt-4 text-center">Elegir plan</a>
                
            </div>

            <div class="bg-white rounded-lg shadow border hover:border-blue-500 p-6 gap-5 grid">
                <h2 class="text-xl font-semibold">Anual</h2>
                <div class="flex items-baseline">
                    <span class="text-3xl font-bold">₡50,000</span>
                    <span class="text-sm text-gray-500 ml-1">/mes</span>
                </div>
                <p class="text-sm text-gray-500">Aumenta tu productividad con un acceso extendido</p>
                <a href="{{ route('payment') }}" class="w-full bg-green hover:bg-blue text-white py-2 rounded mt-4 text-center">Elegir plan</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>

@endsection
