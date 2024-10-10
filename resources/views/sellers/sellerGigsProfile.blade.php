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
            @if ($profile == null)
                <img src="{{ asset('images/buyers_profiles/profile_placeholder.png') }}" alt="Profile picture" class="w-10 h-10 rounded-full">
            @else
                <img src="{{ asset('images/buyers_profiles/' . $profile) }}" alt="Profile picture" class="w-10 h-10 rounded-full">
            @endif
            </div>
        </div>
    </nav>


<section>

    <section class="flex flex-col px-[140px] gap-[20px] max-sm:w-[90vw] max-sm:px-0 max-sm:m-auto mt-[80px]">
    
        
            <section class="grid grid-cols-2 max-sm:grid-cols-1 max-md:grid-cols-2 lg:grid-cols-2 max-sm:gap-[2rem]">
                
                <div class="flex max-sm:grid gap-9 px-[3rem] max-sm:place-items-center max-sm:text-center">
                    <div>
                    @if ($profile == null)
                        <img class="w-[190px] max-sm:w-[120px] rounded-full h-[190px]" src="{{ asset('images/buyers_profiles/profile_placeholder.png') }}" alt="">
                    @else
                        <img class="w-[190px] max-sm:w-[120px] rounded-full h-[190px]" src="{{ asset('images/buyers_profiles/' . $profile) }}" alt="">
                    @endif
                    </div>
                    
                    <div class="grid max-sm:place-items-center">
                        <div class="grid grid-cols-2 max-sm:grid-cols-1 max-md:grid-cols-1 max-lg:grid-cols-1 gap-30 max-sm:gap-1">
                            <div class="w-40">
                                <span class="text-primary font-semibold text-[18px] max-sm:text-[14px] max-sm:text-center">{{ $name }} {{ $lastname }}</span>
                            </div>
                            <span class="text-[16px] max-sm:text-[12px] font-light text-gray-400 " > @ {{ $username }}</span>
                        </div>
                        <div class="flex">
                            <img class="w-[14px] h-[15px] mr-2 mb-2" src="{{ asset('images/profile/star.png') }}" alt="">
                            <span class="text-[16px] font-light text-black">4.8</span>
                        </div>
                        <div class="flex">
                            <img class="w-[14px] h-[19px] mr-2" src="{{ asset('icons/location.svg') }}" alt="">
                            <span class="text-[16px] font-light text-black max-sm:text-[12px]" >{{ $userCity }} , {{ $userProvince }}, CR</span>
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
        <p class="text-[16px] max-sm:text-[16px] font-light text-black mt-3 w-[33rem]">
        Hola, soy Emanuel. Soy parte del campo de diseño gráfico con años 
        de experiencia. Soy bueno especialmente haciendo logotipos, y también
        banners, diseños de medios  sociales, volantes, tarjetas de visita, y la
        eliminación de fondo o cualquier edición de Photoshop. Soy una persona 
        muy amable y con mucha paciencia. Estaré encantada de ayudarle en su
        trabajo, asegurándome de que siempre obtenga la mejor calidad y servicio.
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
        @if ($gigs && count($gigs) > 0)
            @foreach ($gigs as $gig)
                <div class="flex wrap">
                    <a href="{{ route('sellerGig', ['id' => $gig->id, 'username' => $username]) }}" class="block w-full cursor-pointer">
                        <div class="mt-5 gap-2">
                            <img class="cursor-pointer" src="{{ asset('images/gigs/' .$gig->gig_image) }}" alt="{{ $gig->gig_name }}">

                            <span class="text-[16px] max-sm:text-[14px] font-light text-black">{{ $gig->gig_name }}</span>

                            <div class="grid gap-2">
                                <div class="flex gap-2 mt-6">
                                    <div>
                                        <img class="mt-0.5" src="{{ asset('images/profile/star.png') }}" alt="">
                                    </div>
                                    <div class="flex gap-1">
                                        <span class="text-primary font-semibold text-[15px] max-sm:text-[12px]">{{ $averageRating }} /5</span>
                                        <span class="text-primary font-medium text-gray-400 text-[15px] max-sm:text-[10px]">(221)</span>
                                    </div>
                                </div>
                                <div class="text-primary font-semibold text-[16px] max-sm:text-[12px]">Desde ₡ {{ $gig->gig_price }}</div>
                            </div> 
                        </div>
                    </a>
                </div>

                
            @endforeach
        @else    
        <div class="flex flex-col items-center justify-center place-content-center text-center p-10 bg-blue-50 border border-blue-200 rounded-lg shadow-md mt-10">
            <h2 class="text-2xl font-bold text-blue-600">¡Lo sentimos!</h2>
            <p class="text-lg text-blue-500 mt-2">Actualmente no hay servicios disponibles.</p>
            <p class="text-gray-600 mt-2">Vuelve más tarde o explora otros perfiles.</p>
            <a href="{{ url('/sellers/{username}/dashboardgigs') }}" class="mt-5 inline-block bg-blue-600 text-white py-2 px-4 rounded-full shadow-lg hover:bg-blue-700 transition duration-300 ease-in-out">
                Explorar más servicios
            </a>
        </div>
        @endif



        </div>


    </section>
</section>


</section>