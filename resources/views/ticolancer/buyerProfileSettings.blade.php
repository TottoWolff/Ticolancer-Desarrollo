@extends('ticolancer.buyerLayout')

@section('content')
<div class="min-h-[90vh] min-w-[90vw] bg-white flex  justify-center p-4">
    <div class="bg-white rounded-lg  w-full  sm:max-w-4xl md:max-w-6xl lg:max-w-[90vw] grid md:grid-cols-2 gap-6 p-6">

        <!-- column left-->
        <div>
            <div class="space-y-6">

                <a href="#" class="mb-8 p-[10px] hover:text-white  hover:bg-blue transition-all duration-500 hover:translate-y-[-5px] ease-out w-full py-2 px-4 border border-gray-300 rounded-lg text-gray-600 flex items-center justify-center">
                    
                    Cuenta
                </a>
                <a href="#" class="p-[10px] hover:text-white  hover:bg-blue transition-all duration-500 hover:translate-y-[-5px] ease-out w-full py-2 px-4 border border-gray-300 rounded-lg text-gray-600 flex items-center justify-center">
                    
                    Seguridad
                </a>
            </div>
        </div>

        <!--column right -->
        <div>
            <div class="w-full max-w-md mx-auto space-y-4">
                <!-- Tarjeta de Información Personal -->
                <div class="bg-white  rounded-lg border border-gray-300">
                    <div class="p-4 border-b">
                        <h2 class="text-lg font-semibold text-[#132D46]">Información personal</h2>
                    </div>
                    <div class="p-4">
                        <form class="flex flex-col gap-6">
                            <!-- Campo de Nombre -->
                            <div class="flex items-center justify-between space-x-4">
                                <label for="name" class="text-sm font-medium w-32 text-left">NAME</label>
                                <input id="name" type="text" placeholder="Jonathan" class="w-52 border border-gray-300 rounded-lg px-3 py-2" />
                            </div>

                            <!-- Campo de Apellido -->
                            <div class="flex items-center justify-between space-x-4">
                                <label for="lastname" class="text-sm font-medium w-32 text-left">LASTNAME</label>
                                <input id="lastname" type="text" placeholder="Corrales Ruiz" class="w-2/3 border border-gray-300 rounded-lg px-3 py-2" />
                            </div>

                            <!-- Campo de Nombre de Usuario -->
                            <div class="flex items-center justify-between space-x-4">
                                <label for="username" class="text-sm font-medium w-32 text-left">USERNAME</label>
                                <input id="username" type="text" placeholder="corralesjonathan" class="w-2/3 border border-gray-300 rounded-lg px-3 py-2" />
                            </div>

                            <!-- Campo de Correo Electrónico -->
                            <div class="flex items-center justify-between space-x-4">
                                <label for="email" class="text-sm font-medium w-32 text-left">EMAIL</label>
                                <input id="email" type="email" placeholder="corralesjonathan@gmail.com" class="w-2/3 border border-gray-300 rounded-lg px-3 py-2" />
                            </div>

                            <!-- Botón de Guardar Cambios -->
                            <button type="submit" class="w-full bg-blue-500 text-white rounded-lg py-2 hover:bg-blue-600 transition-all">
                                Guardar cambios
                            </button>
                        </form>
                    </div>

                </div>

                <!-- Tarjeta de Contacto -->
                <div class="bg-white shadow-md rounded-lg border border-gray-300">
                    <div class="p-4 border-b">
                        <h2 class="text-lg font-medium">Contacto</h2>
                    </div>
                    <div class="p-4">
                        <form class="space-y-4">
                            <!-- Campo de Teléfono -->
                            <div class="flex items-center space-x-4">
                                <label for="phone" class="text-sm font-medium w-32">TELÉFONO</label>
                                <div class="flex flex-1 space-x-2">
                                    <input id="country-code" type="text" placeholder="+506" class="w-20 border-[0.5px] border-gray-300 rounded-md shadow-sm px-3 py-2" />
                                    <input id="phone" type="text" placeholder="8430-1661" class="flex-1 border-[0.5px] border-gray-300 rounded-md shadow-sm px-3 py-2" />
                                </div>
                            </div>

                            <!-- Botón de Guardar Cambios -->
                            <button type="submit" class="w-full bg-blue-500 text-white rounded-lg py-2 hover:bg-blue-600 transition-all">
                                Guardar cambios
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>


    </div>
</div>