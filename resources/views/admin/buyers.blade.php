@extends('admin.layout')
@section('content')
    <div class="w-[90vw] flex items-center justify-center mt-[140px] m-auto">
        <div class="flex flex-col w-full gap-[20px]">
            <!-- Breadcrumbs -->
            <div class="flex gap-[10px] items-center">
            <a class="text-[16px] text-blue underline hover:text-green transition-all duration-500 ease-out" href="{{ route('admin.dashboard') }}">🡠 Volver</a>
            </div>
            
            <!-- Buyers -->
            <div class="border-[0.5px] border-blue border-opacity-50 rounded-[16px] p-6">
                    <h3 class="font-semibold text-[22px] mb-4 text-blue">Compradores</h3>
                    <table class="text-left w-full">
                        <thead class="border-b border-blue border-opacity-50">
                            <tr class="text-[16px] font-medium text-blue">
                                <th class="py-[10px]">Nombre</th>
                                <th>Apellidos</th>
                                <th>Usuario</th>
                                <th>Teléfono</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($buyers as $buyer)
                            <tr>
                                <td class="py-[5px]">{{$buyer->name}}</td>
                                <td>{{$buyer->lastname}}</td>
                                <td>{{$buyer->username}}</td>
                                <td>+506 {{$buyer->phone}}</td>
                                <td>{{$buyer->email}}</td>
                                <td><button class="text-green underline text-[16px] font-light">Ver</button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
@endsection