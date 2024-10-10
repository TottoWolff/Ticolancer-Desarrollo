@extends('admin.layout')
@section('content')
    <div class="w-[90vw] flex items-center justify-center mt-[140px] mb-[140px] m-auto">
        <div class="flex flex-col w-full gap-[20px]">
                
                <!-- Welcome Message -->
                <div>
                    <h1 class="text-[32px] font-medium text-blue">Hola {{$user->username}} 👋 <br>bienvenido al módulo de administración!</h1>
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
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class=" flex justify-end py-[10px]">
                        <a class="hover:text-green text-gray-500 underline text-[16px] font-light" href="{{ route('admin.buyers') }}">Ver todos</a>
                    </div>
                </div>

                <!-- Sellers -->
                <div class="border-[0.5px] border-blue border-opacity-50 rounded-[16px] p-6">
                    <h3 class="font-semibold text-[22px] mb-4 text-blue">Vendedores</h3>
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
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class=" flex justify-end py-[10px]">
                        <a class="hover:text-green text-gray-500 underline text-[16px] font-light" href="">Ver todos</a>
                    </div>
                </div>

                <!-- Suscribers -->
                <div class="border-[0.5px] border-blue border-opacity-50 rounded-[16px] p-6">
                    <h3 class="font-semibold text-[22px] mb-4 text-blue">Suscripciones</h3>
                    <table class="text-left w-full">
                        <thead class="border-b border-blue border-opacity-50">
                            <tr class="text-[16px] font-medium text-blue">
                                <th class="py-[10px]">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subscriptions as $subscription)
                            <tr>
                                <td class="py-[5px]">{{$subscription->email}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class=" flex justify-end py-[10px]">
                        <a class="hover:text-green text-gray-500 underline text-[16px] font-light" href="{{ route('admin.subscriptions') }}">Ver todos</a>
                    </div>
                </div>

                <!-- Contact forms -->
                <div class="border-[0.5px] border-blue border-opacity-50 rounded-[16px] p-6">
                    <h3 class="font-semibold text-[22px] mb-4 text-blue">Formularios de contacto</h3>
                    <table class="text-left w-full">
                        <thead class="border-b border-blue border-opacity-50">
                            <tr class="text-[16px] font-medium text-blue">
                                <th class="py-[10px]">Nombre</th>
                                <th>Email</th>
                                <th>Mensaje</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contactForms as $contactForm)
                            <tr>
                                <td class="py-[5px]">{{$contactForm->name}}</td>
                                <td>{{$contactForm->email}}</td>
                                <td>{{$contactForm->message}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class=" flex justify-end py-[10px]">
                        <a class="hover:text-green text-gray-500 underline text-[16px] font-light" href="{{ route('admin.forms') }}">Ver todos</a>
                    </div>
                </div>
        </div>
    </div>
    @endsection