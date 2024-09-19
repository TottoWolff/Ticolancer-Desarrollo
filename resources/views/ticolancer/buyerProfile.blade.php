@extends('ticolancer.buyerLayout')

@section('content')
<div class="min-h-[90vh] min-w-[90vw] bg-white flex items-center justify-center p-4">
    <div class="bg-white rounded-lg  w-full  sm:max-w-4xl md:max-w-6xl lg:max-w-[90vw] grid md:grid-cols-2 gap-6 p-6">
        <!-- Left Column -->
        <div class="space-y-6">
            <!-- Profile Card -->
            <div class="border rounded-lg p-6 relative">
                <button class="absolute top-4 right-4 text-gray-400">
                    <!-- Icono de Configuración -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                    </svg>


                </button>
                <div class="flex flex-col items-center">
                    <img src="https://th.bing.com/th/id/OIP.U9BwHvuf6WiEEvnEgDmJ7gHaHa?rs=1&pid=ImgDetMain" alt="Jonathan Corrales Ruiz" width="100" height="100" class="rounded-full">
                    <h2 class="mt-4 text-xl font-semibold font-main text-[#132D46]">Jonathan Corrales Ruiz</h2>
                    <p class="text-gray-500">@corralesjonathan</p>
                </div>
                <div class="mt-6 space-y-2">
                    <div class="flex items-center text-gray-600">
                        <!-- Icono de Localización -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>

                        <span class="font-light font-main">San Ramón, Alajuela, CR</span>
                    </div>
                    <div class="flex items-center text-gray-600">
                        <!-- Icono de Calendario -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>

                        <span class="font-light">Se unió en enero, 2023</span>
                    </div>
                    <div class="flex items-center text-gray-600">
                        <!-- Icono de Mundo -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m10.5 21 5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 0 1 6-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 0 1-3.827-5.802" />
                        </svg>

                        <span class="font-light">Español (Nativo), Inglés (Intermedio)</span>
                    </div>
                </div>
            </div>

            <!-- Settings Button -->
            <a href="buyerProfileSettigns" class="p-[10px] hover:text-white  hover:bg-blue transition-all duration-500 hover:translate-y-[-5px] ease-out w-full py-2 px-4 border border-gray-300 rounded-lg text-gray-600 flex items-center justify-center">
                <!-- Icono de Configuración -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>

                Configuración
            </a>

            <!-- Logout Button -->
            <button class="p-[10px] hover:text-white  hover:bg-red-600 transition-all duration-500 hover:translate-y-[-5px] ease-out w-full py-2 px-4 border border-gray-300 rounded-lg text-gray-600 flex items-center justify-center">
                <!-- Icono de Cerrar Sesión -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                </svg>

                Cerrar sesión
            </button>

            <!-- Note -->
            <p class="text-sm text-gray-500">
                Actualmente estás en tu perfil de comprador. Para acceder a tu perfil de vendedor, <a href="#" class="underline hover:text-cyan-500"> Cambiar a modo vendedor</a>
            </p>

        </div>

        <!-- Right Column -->
        <div class="space-y-6">
            <!-- Breadcrumb -->
            <p class="text-sm text-gray-500">
                Inicio / Mi perfil
            </p>

            <!-- Welcome Message -->
            <div>
                <h1 class="text-2xl font-medium text-[#132D46]">Hola Jonathan 👋 <br>Bienvenido a tu perfil!</h1>
            </div>

            <!-- Favorite Freelancers -->
            <div class="border rounded-lg p-6">
                <h3 class="font-semibold mb-4 text-[#132D46]">Freelancers favoritos</h3>
                <div class="">

                    <div class="mb-2 flex items-center">
                        <img src="https://th.bing.com/th/id/R.22f47d2257f9e193c2f67b211d9f6b0d?rik=cMgdWomquzVe0w&pid=ImgRaw&r=0" alt="" width="24" height="24" class="rounded-full mr-2">
                        <span class=" font-light text-[#132D46]">@corralesjonathan</span>
                        <span class="text-red-500 ml-2">❤️</span>
                    </div>
                    <div class="mb-2 flex items-center">
                        <img src="https://th.bing.com/th/id/R.22f47d2257f9e193c2f67b211d9f6b0d?rik=cMgdWomquzVe0w&pid=ImgRaw&r=0" alt="" width="24" height="24" class="rounded-full mr-2">
                        <span class=" font-light text-[#132D46]">@juliandriguez</span>
                        <span class="text-red-500 ml-2">❤️</span>
                    </div>
                    <div class="mb-2 flex items-center">
                        <img src="https://th.bing.com/th/id/R.22f47d2257f9e193c2f67b211d9f6b0d?rik=cMgdWomquzVe0w&pid=ImgRaw&r=0" alt="" width="24" height="24" class="rounded-full mr-2">
                        <span class=" font-light text-[#132D46]">@feliper_g</span>
                        <span class="text-red-500 ml-2">❤️</span>
                    </div>
                    <div class="mb-2 flex items-center">
                        <img src="https://th.bing.com/th/id/R.22f47d2257f9e193c2f67b211d9f6b0d?rik=cMgdWomquzVe0w&pid=ImgRaw&r=0" alt="" width="24" height="24" class="rounded-full mr-2">
                        <span class=" font-light text-[#132D46]">@michael_vargasv</span>
                        <span class="text-red-500 ml-2">❤️</span>
                    </div>
                </div>

                <div class=" flex justify-end ">
                    <button class="hover:text-cyan-500 text-gray-500 font-light underline mt-4 text-sm text-blue-500 flex items-center">
                        Ver todos
                    </button>
                </div>
            </div>


            <!-- Favorite Services -->
            <div class="border rounded-lg p-6">
                <h3 class="font-semibold mb-4 text-[#132D46]">Servicios favoritos</h3>
                <div class="space-y-4">

                    <div class="flex items-start">
                        <img src="https://th.bing.com/th/id/R.22f47d2257f9e193c2f67b211d9f6b0d?rik=cMgdWomquzVe0w&pid=ImgRaw&r=0" alt="Service" width="40" height="40" class="rounded mr-2">
                        <div>
                            <p class="text-sm font-light text-[#132D46]">@michael_vargas</p>
                            <p class="text-xs text-gray-500 font-light">Crearé un logo de marca profesional para tu negocio</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <img src="https://th.bing.com/th/id/R.22f47d2257f9e193c2f67b211d9f6b0d?rik=cMgdWomquzVe0w&pid=ImgRaw&r=0" alt="Service" width="40" height="40" class="rounded mr-2">
                        <div>
                            <p class="text-sm font-light text-[#132D46]">@michael_vargas</p>
                            <p class="text-xs text-gray-500 font-light">Crearé un logo de marca profesional para tu negocio</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <img src="https://th.bing.com/th/id/R.22f47d2257f9e193c2f67b211d9f6b0d?rik=cMgdWomquzVe0w&pid=ImgRaw&r=0" alt="Service" width="40" height="40" class="rounded mr-2">
                        <div>
                            <p class="text-sm font-light text-[#132D46]">@michael_vargas</p>
                            <p class="text-xs text-gray-500 font-light">Crearé un logo de marca profesional para tu negocio</p>
                        </div>
                    </div>



                </div>
                <div class="flex justify-end">
                    <button class=" hover:text-cyan-500 text-gray-500 font-light underline mt-4 text-sm text-blue-500 flex items-center">
                        Ver todos
                    </button>
                </div>
            </div>
        </div>


    </div>
</div>
</div>
@endsection