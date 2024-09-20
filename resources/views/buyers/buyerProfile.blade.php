@extends('buyers.buyerLayout')

@section('content')
<div class="min-h-[90vh] min-w-[90vw] flex items-center justify-center mt-[100px]">
    <div class=" rounded-lg w-full  sm:max-w-4xl md:max-w-6xl lg:max-w-[90vw] grid md:grid-cols-2 gap-6 p-6">
        <!-- Left Column -->
        <div class="space-y-6">
            <!-- Profile Card -->
            <div class="border-[1px] border-blue border-opacity-50 rounded-[16px] p-[20px] relative">
                <!-- Edit button -->
                <button class="absolute top-4 right-4 text-gray-400">
                    <img src="{{ asset('icons/edit.svg') }}" alt="">
                </button>
                <!-- Edit button end -->

                <div class="flex flex-col items-center gap-[20px]">
                    <img class="w-[120px] h-[120px] rounded-full bg-center object-cover" src="https://media.istockphoto.com/id/1386479313/es/foto/feliz-mujer-de-negocios-afroamericana-millennial-posando-aislada-en-blanco.jpg?s=612x612&w=0&k=20&c=JP0NBxlxG2-bdpTRPlTXBbX13zkNj0mR5g1KoOdbtO4=" alt="Jonathan Corrales Ruiz">
                    <h2 class="mt-4 text-[22px] font-semibold text-blue">{{ $name }} {{ $lastname }}</h2>
                    <p class="text-blue text-[18px] font-light">{{ $username }}</p>
                    <div class="h-[1px] bg-blue bg-opacity-50 w-full"></div>
                </div>

                <div class="mt-6 space-y-2">
                    <div class="flex flex-col gap-[20px] items-center">
                        <div class="flex gap-[10px] w-full items-center justify-start">
                            <img src="{{ asset('icons/location.svg') }}" alt="">
                            <span class="font-light text-[16px]">{{ $cityName }},  {{ $provinceName }}, CR</span>
                        </div>

                        <div class="flex w-full gap-[10px] items-center">
                            <img src="{{ asset('icons/user.svg') }}" alt="">
                            <span class="font-light text-[16px]">Se unió el {{ $joinDate }}</span>
                        </div>

                        <div class="h-[1px] bg-blue bg-opacity-50 w-full"></div>
                    </div>
                </div>

                <div class="mt-6 space-y-2">
                    <div class="flex flex-col gap-[20px] items-center">
                        <div class="flex gap-[10px] w-full items-center justify-start">
                            <img src="{{ asset('icons/phone.svg') }}" alt="">
                            <span class="font-light text-[16px]">+506 {{ $phone }}</span>
                        </div>

                        <div class="flex w-full gap-[10px] items-center">
                            <img src="{{ asset('icons/email.svg') }}" alt="">
                            <span class="font-light text-[16px]">{{ $email }}</span>
                        </div>

                        <div class="h-[1px] bg-blue bg-opacity-50 w-full"></div>
                    </div>
                </div>

                <div class="flex items-center gap-[10px] mt-[20px] text-gray-600">
                        <!-- Icono de Tranducción -->
                        <img src="{{ asset('icons/translate_2.svg') }}" alt="">
                        <span class="font-light text-[16px]">Español (Nativo), Inglés (Intermedio)</span>
                    </div>
            </div>

            <!-- Settings -->
            <a class="flex w-full items-center gap-[10px] justify-center border-[1px] border-blue border-opacity-50 rounded-[12px] p-[10px] text-blue hover:text-white hover:bg-blue hover:border-blue transition-all duration-500 " href=""><img src="{{ asset('icons/settings.svg') }}" alt="">Configuraciones</a>
            <!-- Settings end -->

            <!--Logout -->
            <a class="flex w-full items-center gap-[10px] justify-center border-[1px] border-blue border-opacity-50 rounded-[12px] p-[10px] text-blue hover:text-white hover:bg-red-600 hover:border-red-600 transition-all duration-500 " href="{{ route('login.logout') }}"><img src="{{ asset('icons/leave.svg') }}" alt="">Cerrar sesión</a>
            <!--Logout end -->

            <!-- Note -->
            <p class="text-[16px] text-gray-500">
                Actualmente estás en tu perfil de comprador. Para acceder a tu perfil de vendedor, <a href="#" class="underline hover:text-green"> cambia a modo vendedor</a>
            </p>
            <!-- Note end -->

        </div>

        <!-- Right Column -->
        <div class="space-y-6">
            <!-- Breadcrumb -->
            <p class="text-[18px] font-light text-gray-500">
                Inicio / Mi perfil
            </p>

            <!-- Welcome Message -->
            <div>
                <h1 class="text-[32px] font-medium text-blue">Hola {{ $name }} 👋 <br>Bienvenido a tu perfil!</h1>
            </div>

            <!-- Favorite Freelancers -->
            <div class="border-[0.5px] border-blue border-opacity-50 rounded-[16px] p-6">
                <h3 class="font-semibold text-[22px] mb-4 text-blue">Freelancers favoritos</h3>
                <div class="flex flex-col gap-[10px]">
                    <div class="flex gap-[10px] items-center">
                        <img src="https://i0.wp.com/lamiradafotografia.es/wp-content/uploads/2014/07/foto-perfil-psicologo-180x180.jpg?resize=180%2C180" alt="" class="rounded-full w-[30px] h-[30px] bg-cover object-fill">
                        <div class="flex gap-[10px]">
                            <span class=" font-light text-[#132D46]">@corralesjonathan</span>
                            <img src="{{ asset('icons/liked.svg') }}" alt="">
                        </div>
                    </div>

                    <div class="flex gap-[10px] items-center">
                        <img src="https://media.istockphoto.com/id/1326417862/es/foto/mujer-joven-riendo-mientras-se-relaja-en-casa.jpg?s=612x612&w=0&k=20&c=BQHE9M8b6hixE_TB1XzuvxobnyD4ylKMTprVbrhPxOU=" alt="" class="rounded-full w-[30px] h-[30px] bg-cover object-fill">
                        <div class="flex gap-[10px]">
                            <span class=" font-light text-[#132D46]">@lucia_rodrigueza</span>
                            <img src="{{ asset('icons/liked.svg') }}" alt="">
                        </div>
                    </div>

                    <div class="flex gap-[10px] items-center">
                        <img src="https://media.istockphoto.com/id/1200677760/es/foto/retrato-de-apuesto-joven-sonriente-con-los-brazos-cruzados.jpg?s=612x612&w=0&k=20&c=RhKR8pxX3y_YVe5CjrRnTcNFEGDryD2FVOcUT_w3m4w=" alt="" class="rounded-full w-[30px] h-[30px] bg-cover object-fill">
                        <div class="flex gap-[10px]">
                            <span class=" font-light text-[#132D46]">@felipe_vargas.rg</span>
                            <img src="{{ asset('icons/liked.svg') }}" alt="">
                        </div>
                    </div>
                    
                </div>

                <div class=" flex justify-end ">
                    <a class="hover:text-green text-gray-500 underline text-[16px] font-light" href="">Ver todos</a>
                </div>
            </div>


            <!-- Favorite Services -->
            <div class="border-[0.5px] border-blue border-opacity-50 rounded-[16px] p-6">
                <h3 class="font-semibold text-[22px] mb-4 text-blue">Servicios favoritos</h3>
                <div class="space-y-4">

                    <div class="flex items-start gap-[20px]">
                        <img src="https://fiverr-res.cloudinary.com/t_gig_cards_web,q_auto,f_auto/gigs/312842484/original/3d1263366a69d9b04cd979b7697966eff112122f.jpg" alt="Service" class="w-[80px] h-[60px] rounded-[10px] border-[0.5px] border-blue border-opacity-50 bg-cover object-cover">
                        <div class="flex flex-col gap-[5px]">   
                            <div class="flex items-center gap-[5px]">
                                <img class="w-[30px] h-[30px] rounded-full bg-cover object-fill" src="https://i0.wp.com/lamiradafotografia.es/wp-content/uploads/2014/07/foto-perfil-psicologo-180x180.jpg?resize=180%2C180" alt="">
                                <p class="font-light text-blue text-[16px]">@michael_vargas</p>
                            </div>
                            <p class="text-[14px] text-gray-500 font-light">Crearé un logo de marca profesional para tu negocio</p>
                        </div> 
                    </div>

                    



                </div>
                
                <div class=" flex justify-end ">
                    <a class="hover:text-green text-gray-500 underline text-[16px] font-light" href="">Ver todos</a>
                </div>

            </div>
        </div>

    </div>
</div>
</div>
@endsection