@extends('admin.layout') 
@section('content')
<div class="w-[90vw] flex items-center justify-center mt-[140px] m-auto">
    <div class="flex flex-col w-full gap-[20px]">
        <!-- Breadcrumbs -->
        <div class="flex gap-[10px] items-center">
            <a class="text-[16px] text-blue underline hover:text-green transition-all duration-500 ease-out" href="{{ route('admin.dashboard') }}">🡠 Volver</a>
        </div>

        <!-- Información del Buyer -->
        <div class="border-[0.5px] border-blue border-opacity-50 rounded-[16px] p-6">
            <h3 class="font-semibold text-[22px] mb-4 text-blue">Información del Buyer</h3>
            <div class="overflow-x-auto">
                <table class="text-left w-full min-w-[600px]">
                    <thead class="border-b border-blue border-opacity-50">
                        <tr class="text-[16px] font-medium text-blue">
                            <th class="py-[10px]">Campo</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-200">
                            <td class="py-[5px]">Nombre</td>
                            <td>{{ $buyer->name }}</td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td>Apellidos</td>
                            <td>{{ $buyer->lastname }}</td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td>Usuario</td>
                            <td>{{ $buyer->username }}</td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td>Teléfono</td>
                            <td>+506 {{ $buyer->phone }}</td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td>Email</td>
                            <td>{{ $buyer->email }}</td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td>Provincia ID</td>
                            <td>{{ $buyer->provinces_ticolancers_id }}</td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td>Ciudad ID</td>
                            <td>{{ $buyer->cities_ticolancers_id }}</td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td>Foto de Perfil</td>
                            <td>
                                <img src="{{ asset('images/profile/' . $buyer->picture) }}" alt="Perfil" class="w-16 h-16 object-cover rounded-full">
                            </td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td>Fecha de Creación</td>
                            <td>{{ \Carbon\Carbon::parse($buyer->created_at)->format('d-m-Y H:i') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Información de la Aplicación del Seller -->
        <div class="border-[0.5px] border-blue border-opacity-50 rounded-[16px] p-6">
            <h3 class="font-semibold text-[22px] mb-4 text-blue">Información de la Aplicación del Seller</h3>
            <div class="overflow-x-auto">
                <table class="text-left w-full min-w-[600px]">
                    <thead class="border-b border-blue border-opacity-50">
                        <tr class="text-[16px] font-medium text-blue">
                            <th class="py-[10px]">Campo</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-200">
                            <td class="py-[5px]">ID Aplicación</td>
                            <td>{{ $buyer->id }}</td>
                            </tr>
                            <tr class="border-b border-gray-200">
                            <td>Descripción</td>
                            <td>{{ $buyer->description }}</td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td>Fecha de Nacimiento</td>
                            <td>{{ \Carbon\Carbon::parse($buyer->birthdate)->format('d-m-Y') }}</td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td>Dirección de Residencia</td>
                            <td>{{ $buyer->residence_address }}</td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td>Teléfono</td>
                            <td>+506 {{ $buyer->phone }}</td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td>Foto de Aplicación</td>
                            <td>
   
                            </td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td>Redes Sociales</td>
                            <td>
                                <ul>
                                    <li><a href="{{ $buyer->seller_application->facebook }}" class="text-blue underline" target="_blank">Facebook</a></li>
                                    <li><a href="{{ $buyer->seller_application->instagram }}" class="text-blue underline" target="_blank">Instagram</a></li>
                                    <li><a href="{{ $buyer->seller_application->twitter }}" class="text-blue underline" target="_blank">Twitter</a></li>
                                    <li><a href="{{ $buyer->seller_application->linkedin }}" class="text-blue underline" target="_blank">LinkedIn</a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td>Website</td>
                            <td><a href="{{ $buyer->seller_application->website }}" class="text-blue underline" target="_blank">Website</a></td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td>Fecha de Creación de Aplicación</td>
                            <td>{{ \Carbon\Carbon::parse($buyer->seller_application->created_at)->format('d-m-Y H:i') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
