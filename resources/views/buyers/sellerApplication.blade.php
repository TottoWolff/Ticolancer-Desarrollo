@extends('buyers.layout')

@section('content')
<div class="container mx-auto p-8">
    <h1 class="text-2xl font-semibold mb-4">Formulario de Aplicación para Convertirse en Vendedor</h1>

    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('sellerApplication.store', auth()->guard('buyers')->user()->username) }}" method="POST" enctype="multipart/form-data">
        @csrf

       

        <div class="mb-4">
            <label for="birthdate" class="block text-gray-700">Fecha de Nacimiento</label>
            <input type="date" name="birthdate" id="birthdate" class="mt-1 block w-full">
            @error('birthdate') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700">Descripción</label>
            <textarea name="description" id="description" rows="4" class="mt-1 block w-full"></textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-gray-700">Teléfono</label>
            <input type="text" name="phone" id="phone" class="mt-1 block w-full">
            @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="residence_address" class="block text-gray-700">Dirección de Residencia</label>
            <input type="text" name="residence_address" id="residence_address" class="mt-1 block w-full">
            @error('residence_address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="picture" class="block text-gray-700">Foto de perfil</label>
            <input type="file" name="picture" id="picture" class="mt-1 block w-full">
            @error('picture') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Redes sociales -->
        <div class="mb-4">
            <label for="facebook" class="block text-gray-700">Facebook (Opcional)</label>
            <input type="url" name="facebook" id="facebook" class="mt-1 block w-full">
            @error('facebook') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="instagram" class="block text-gray-700">Instagram (Opcional)</label>
            <input type="url" name="instagram" id="instagram" class="mt-1 block w-full">
            @error('instagram') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="twitter" class="block text-gray-700">Twitter (Opcional)</label>
            <input type="url" name="twitter" id="twitter" class="mt-1 block w-full">
            @error('twitter') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="linkedin" class="block text-gray-700">LinkedIn (Opcional)</label>
            <input type="url" name="linkedin" id="linkedin" class="mt-1 block w-full">
            @error('linkedin') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="website" class="block text-gray-700">Sitio Web (Opcional)</label>
            <input type="url" name="website" id="website" class="mt-1 block w-full">
            @error('website') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition duration-300">
            Enviar Solicitud
        </button>
    </form>
</div>
@endsection
