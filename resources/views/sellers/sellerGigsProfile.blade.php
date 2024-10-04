@extends('buyers.buyerLayout')

@section('content')

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Freelancer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>



<nav class="bg-[#F8FBFF] py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">

            <div class="flex items-center">
                <img src="{{ asset('icons/logo.svg') }}" alt="TicoLancer logo" class="h-10">
            </div>
            <div class="w-full max-w-xl mx-auto">
                <div class="relative">
                    <input type="text" placeholder="¿Cuál servicio buscas hoy?" class="w-full border border-gray-300 rounded-full px-5 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button class="absolute right-3 top-1/2 transform -translate-y-1/2 bg-transparent focus:outline-none">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1010.5 3a7.5 7.5 0 106.15 13.65z"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="flex items-center">
                <img src="{{ asset('images/profile/photo.png') }}" alt="Profile picture" class="w-10 h-10 rounded-full">
            </div>
        </div>
    </nav>


<section>

    <section class="flex flex-col px-[140px] gap-[20px] max-sm:w-[90vw] max-sm:px-0 max-sm:m-auto mt-[80px]">
    
        
            <section class="grid grid-cols-2 max-sm:grid-cols-1 max-md:grid-cols-2 lg:grid-cols-2 max-sm:gap-[2rem]">
                
                <div class="flex max-sm:grid gap-9 px-[3rem] max-sm:place-items-center max-sm:text-center">
                    <div>
                        <img class="w-[190px] max-sm:w-[120px]" src="{{ asset('images/profile/photo.png') }}" alt="">
                    </div>
                    
                    <div class="grid max-sm:place-items-center">
                        <div class="grid grid-cols-2 max-sm:grid-cols-1 max-md:grid-cols-1 max-lg:grid-cols-1 gap-30 max-sm:gap-1">
                            <div class="w-40">
                                <span class="text-primary font-semibold text-[18px] max-sm:text-[14px] max-sm:text-center">Emanuel Jiménez</span>
                            </div>
                            <span class="text-[16px] max-sm:text-[12px] font-light text-gray-400 " >@jimenezemanuel</span>
                        </div>
                        <div class="flex">
                            <img class="w-[14px] h-[15px] mr-2 mb-2" src="{{ asset('images/profile/star.png') }}" alt="">
                            <span class="text-[16px] font-light text-black">4.8</span>
                        </div>
                        <div class="flex">
                            <img class="w-[14px] h-[19px] mr-2" src="{{ asset('icons/location.svg') }}" alt="">
                            <span class="text-[16px] font-light text-black max-sm:text-[12px]" >San Ramón, Aljuela, CR</span>
                        </div>
                        <div class="flex">
                            <img class="w-[14px] h-[19px] mr-2" src="{{ asset('images/profile/user.png') }}" alt="">
                            <span class="text-[16px] max-sm:text-[14px] font-light text-black">Se unió en enero, 2023</span>
                        </div>
                    </div>
                </div>

                <div class="grid gap-3 justify-end max-sm:justify-center">
                    <div class="flex gap-3">
                        <div class="w-[173px] h-[45px] bg-white border border-gray-300 rounded-lg shadow-sm text-center">
                            <button class="text-primary font-medium text-[20px] max-sm:text-[14px] py-2">Más sobre mi</button>
                        </div>
                        <button class="w-[50px] h-[45px] bg-white border border-gray-300 rounded-lg shadow-sm text-center items-center justify-center p-2">
                            <img class="w-[34px] max-sm:w-[28px]" src="{{ asset('icons/liked.svg') }}" alt="">
                        </button>
                    </div>
                    <div>
                        <button class="flex w-[14.7rem] h-[45px] bg-black border border-gray-300 rounded-lg shadow-sm text-center gap-2 items-center justify-center">
                            <img class="w-[24px] h-[24px]" src="{{ asset('images/profile/send.png') }}" alt="">
                            <div class="text-primary font-medium text-[20px] max-sm:text-[18px] py-2 text-white">Contactar</div>
                        </button>
                    </div>
                </div> 
            </section>
       


    <section class="w-[90vw] p-14 max-sm:text-2xl max-sm:text-center">
        <h1 class="text-primary font-bold text-[20px] max-sm:text-[20px]">Sobre mi</h1>
        <p class="text-[16px] max-sm:text-[16px] font-light text-black mt-3">
        Hola, soy Emanuel. Soy parte del campo de diseño gráfico con años </br>
        de experiencia. Soy bueno especialmente haciendo logotipos, y también</br>
        banners, diseños de medios  sociales, volantes, tarjetas de visita, y la</br> 
        eliminación de fondo o cualquier edición de Photoshop. Soy una persona </br>
        muy amable y con mucha paciencia. Estaré encantada de ayudarle en su</br>
        trabajo, asegurándome de que siempre obtenga la mejor calidad y servicio.</br>
        Gracias.</p>
    </section>

    <section class="w-[90vw] p-14 max-sm:text-center">
        <h2 class="text-primary font-bold text-[20px] max-sm:text-[20px]">Habilidades</h2>
        <div >
            <div class="flex flex-col gap-5 mt-5 md:flex-row">
                <div class="border border-gray-400 rounded-full px-3 py-1">
                    <span">Diseñador para redes sociales</span>  
                </div>
                <div class="border border-gray-400 rounded-full px-3 py-1">
                    <span">Diseñador gráfico</span>  
                </div>
                <div class="border border-gray-400 rounded-full px-3 py-1">
                    <span">Diseñador de logos</span>  
                </div>
            </div>
        </div>
    </section>

    <section class=" p-14">
        <h1 class="text-primary font-bold text-[20px] max-sm:text-[20px]">Mis Servicios</h1>

        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            <div class="flex wrap">
                <div class="mt-5 gap-2">
                    <img src="{{ asset('images/profile/service1.png') }}" alt="">
                    <span class="text-[16px] max-sm:text-[14px] font-light text-black">Logos personalizados</span>

                    <div class="grid gap-2">
                        <div class="flex gap-2 mt-6">
                            <div>
                                <img class="mt-0.5" src="{{ asset('images/profile/star.png') }}" alt="">
                            </div>
                            <div class="flex gap-1">
                                <span class="text-primary font-semibold text-[15px] max-sm:text-[12px]">4,9</span>
                                <span class="text-primary font-medium text-gray-400 text-[15px] max-sm:text-[10px]">(221)</span>    
                            </div>    
                        </div>
                        <div class="text-primary font-semibold text-[16px] max-sm:text-[12px]">Desde ₡15,000 </div>
                    </div> 
                </div>
            </div>

            <div class="flex wrap">
                <div class="mt-5 gap-2">
                    <img src="{{ asset('images/profile/service2.png') }}" alt="">
                    <span class="text-[16px] max-sm:text-[14px] font-light text-black">Logos personalizados</span>

                    <div class="grid gap-2">
                        <div class="flex gap-2 mt-6">
                            <div>
                                <img class="mt-0.5" src="{{ asset('images/profile/star.png') }}" alt="">
                            </div>
                            <div class="flex gap-1">
                                <span class="text-primary font-semibold text-[15px] max-sm:text-[12px]">4,9</span>
                                <span class="text-primary font-medium text-gray-400 text-[15px] max-sm:text-[10px]">(221)</span>    
                            </div>    
                        </div>
                        <div class="text-primary font-semibold text-[16px] max-sm:text-[12px]">Desde ₡15,000 </div>
                    </div> 
                </div>
            </div>

            <div class="flex wrap">
                <div class="mt-5 gap-2">
                    <img src="{{ asset('images/profile/service3.png') }}" alt="">
                    <span class="text-[16px] max-sm:text-[14px] font-light text-black">Logos personalizados</span>

                    <div class="grid gap-2">
                        <div class="flex gap-2 mt-6">
                            <div>
                                <img class="mt-0.5" src="{{ asset('images/profile/star.png') }}" alt="">
                            </div>
                            <div class="flex gap-1">
                                <span class="text-primary font-semibold text-[15px] max-sm:text-[12px]">4,9</span>
                                <span class="text-primary font-medium text-gray-400 text-[15px] max-sm:text-[10px]">(221)</span>    
                            </div>    
                        </div>
                        <div class="text-primary font-semibold text-[16px] max-sm:text-[12px]">Desde ₡15,000 </div>
                    </div> 
                </div>
            </div>

            <div class="flex wrap">
                <div class="mt-5 gap-2">
                    <img src="{{ asset('images/profile/service4.png') }}" alt="">
                    <span class="text-[16px] max-sm:text-[14px] font-light text-black">Logos personalizados</span>

                    <div class="grid gap-2">
                        <div class="flex gap-2 mt-6">
                            <div>
                                <img class="mt-0.5" src="{{ asset('images/profile/star.png') }}" alt="">
                            </div>
                            <div class="flex gap-1">
                                <span class="text-primary font-semibold text-[15px] max-sm:text-[12px]">4,9</span>
                                <span class="text-primary font-medium text-gray-400 text-[15px] max-sm:text-[10px]">(221)</span>    
                            </div>    
                        </div>
                        <div class="text-primary font-semibold text-[16px] max-sm:text-[12px]">Desde ₡15,000 </div>
                    </div> 
                </div>
            </div>

            <div class="flex wrap">
                <div class="mt-5 gap-2">
                    <img src="{{ asset('images/profile/service5.png') }}" alt="">
                    <span class="text-[16px] max-sm:text-[14px] font-light text-black">Logos personalizados</span>

                    <div class="grid gap-2">
                        <div class="flex gap-2 mt-6">
                            <div>
                                <img class="mt-0.5" src="{{ asset('images/profile/star.png') }}" alt="">
                            </div>
                            <div class="flex gap-1">
                                <span class="text-primary font-semibold text-[15px] max-sm:text-[12px]">4,9</span>
                                <span class="text-primary font-medium text-gray-400 text-[15px] max-sm:text-[10px]">(221)</span>    
                            </div>    
                        </div>
                        <div class="text-primary font-semibold text-[16px] max-sm:text-[12px]">Desde ₡15,000 </div>
                    </div> 
                </div>
            </div>

            <div class="flex wrap">
                <div class="mt-5 gap-2">
                    <img src="{{ asset('images/profile/service6.png') }}" alt="">
                    <span class="text-[16px] max-sm:text-[14px] font-light text-black">Logos personalizados</span>

                    <div class="grid gap-2">
                        <div class="flex gap-2 mt-6">
                            <div>
                                <img class="mt-0.5" src="{{ asset('images/profile/star.png') }}" alt="">
                            </div>
                            <div class="flex gap-1">
                                <span class="text-primary font-semibold text-[15px] max-sm:text-[12px]">4,9</span>
                                <span class="text-primary font-medium text-gray-400 text-[15px] max-sm:text-[10px]">(221)</span>    
                            </div>    
                        </div>
                        <div class="text-primary font-semibold text-[16px] max-sm:text-[12px]">Desde ₡15,000 </div>
                    </div> 
                </div>
            </div>


        </div>


    </section>
</section>


</section>