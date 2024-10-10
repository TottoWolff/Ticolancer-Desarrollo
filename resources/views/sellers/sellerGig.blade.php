@extends('buyers.buyerLayout')<html lang="en">
<body>
    <nav class="bg-[#F8FBFF] py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">

            <div class="flex items-center">
                <img class="h-10 cursor-pointer" src="{{ asset('icons/logo.svg') }}" alt="TicoLancer logo" >
            </div>
            <div class="w-full max-w-xl mx-auto">
                <div class="relative">
                    <input type="text" placeholder="¿Cuál servicio buscas hoy?" class="w-full border border-gray-300 rounded-full px-5 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 ">
                    <button class="absolute right-3 top-1/2 transform -translate-y-1/2 bg-transparent focus:outline-none">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1010.5 3a7.5 7.5 0 106.15 13.65z"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="flex items-center">
                @if ($profile == null)
                <img src="{{ asset('images/buyers_profiles/profile_placeholder.png') }}"  alt="Profile picture" class="w-10 h-10 rounded-full">
                @else
                <img src="{{ asset('images/buyers_profiles/' . $profile) }}" alt="Profile picture" class="w-10 h-10 rounded-full">
                @endif

            </div>
        </div>
    </nav>


    
    <section class="px-[15rem] p-20 max-sm:p-0 max-sm:px-0 max-sm:mt-[2rem]">


        <section>

        <!-- Inicia contenedor arriba -->
        <div class="flex flex-row max-sm:flex-col gap-[24rem] max-sm:gap-[10rem] ">

            <!-- Primera columna -->
            <div>
                
                <div class="grid gap-2 max-sm:text-center">
                    <h1 class="text-3xl font-semibold">Modelado 3D</h1>
                    <h2 class="text-xl">$gig_name</h2>
                </div>

                <div class="flex max-sm:grid gap-6 mt-3 max-sm:justify-center max-sm:place-items-center">
                    <div>
                        @if ($profile == null)
                        <img class="w-[70px] max-sm:w-[70px] rounded-full h-[70px]" src="{{ asset('images/buyers_profiles/profile_placeholder.png') }}"  alt="">
                        @else
                        <img class="w-[70px] max-sm:w-[70px] rounded-full h-[70px]" src="{{ asset('images/buyers_profiles/' . $profile) }}" alt="">
                        @endif
                    </div>
                            
                    <div class="grid max-sm:text-center max-sm:justify-center">
                        <div class="grid grid-cols-2 max-sm:grid-cols-1 max-md:grid-cols-1 max-lg:grid-cols-1 gap-30 max-sm:gap-1">
                            <div class="w-40 ">
                                <span class="text-primary font-semibold text-[18px]">{{ $name }} {{ $lastname }} </span>
                            </div>
                            <span class="text-[16px]  font-light text-gray-400" >@ {{ $username }} </span>
                        </div>
                        <div class="flex max-sm:justify-center">
                            <img class="w-[14px] h-[15px] mr-2 mb-2" src="{{ asset('images/profile/star.png') }}" alt="">
                            <span class="text-[16px] font-light text-black">4.8</span>
                        </div>
                        <div class="flex max-sm:justify-center">
                            <img class="w-[14px] h-[19px] mr-2" src="{{ asset('icons/location.svg') }}" alt="">
                            <span class="text-[16px] font-light text-black">{{ $userCity }} , {{ $userProvince }}, CR</span>
                        </div>
                    </div>
                </div>


                <div class="mt-3 max-sm:mt-[2rem] max-sm:flex max-sm:justify-center">
                    <img class="rounded-md max-sm:w-[90%] max-sm:h-auto " id="mainImage" src=" {{ asset('images/profile/serviceImage1.png') }}" alt="">
                </div>

                <div class="flex space-x-4 mt-6 max-sm:justify-center"">
                    <img onclick="changeImage(this)" class="w-[156px] h-24 max-sm:w-[18%] max-sm:h-[20%] object-cover rounded-md shadow cursor-pointer" src="{{ asset('images/profile/serviceImage1.png') }}" alt="Imagen 1">
                    <img onclick="changeImage(this)" class="w-[156px] h-24 max-sm:w-[20%] max-sm:h-[20%] object-cover rounded-md shadow cursor-pointer" src="{{ asset('images/profile/serviceImage2.png') }}" alt="Imagen 2">
                    <img onclick="changeImage(this)" class="w-[156px] h-24 max-sm:w-[20%] max-sm:h-[20%] object-cover rounded-md shadow cursor-pointer" src="{{ asset('images/profile/serviceImage3.png') }}" alt="Imagen 3">
                    <img onclick="changeImage(this)" class="w-[156px] h-24 max-sm:w-[20%] max-sm:h-[20%] object-cover rounded-md shadow cursor-pointer" src="{{ asset('images/profile/serviceImage4.png') }}" alt="Imagen 4">
                </div>

            </div>

            <!-- Segunda columna -->
            <div class="grid gap-3">
                
                <div class="w-[46px] h-[45px] border border-gray-300 p-3 rounded-md flex ml-auto hover:bg-gray-200">
                    <img class="cursor-pointer " src="{{ asset('images/profile/share.png') }}" alt="">
                </div>
                
                <!-- Detalle de servicio -->
                <div class="border border-gray-300 rounded-md max-sm:w-[90%] ">
                    <h1 class="p-5 text-2xl font-semibold" >Detalle del servicio</h1>
                    <img src="{{ asset('images/profile/line.png') }}" alt="">
                    <div class="p-5 grid gap-3">
                        <span class="text-primary font-semibold text-[18px] max-sm:text-[14px]">Desde ₡100,000</span>
                        <div class="flex">
                            <img class="w-[14px] h-[15px] mr-2 mb-2" src="{{ asset('images/profile/star.png') }}" alt="">
                            <div class="flex max-sm:justify-center">
                                <span class="text-primary font-semibold text-[18px] max-sm:text-[14px]">4.0</span>
                                <span class="text-primary text-gray-400 font-semibold text-[18px] max-sm:text-[14px]">(10 opiniones)</span>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <!-- Contacto -->
                
                <div class="grid gap-8 w-[393px] h-[84px] bg-gray-200 rounded-md p-6 items-center">
                    <div class="flex w-[340px] h-[45px] gap-2 border border-gray-400 rounded-md cursor-pointer place-items-center place-content-center hover:translate-y-[-5px] 
                    hover:bg-gray-300 " id="contact-button"> 
                        <span class="font-medium text-xl">Contáctame</span> 
                        <img class="w-[15px] h-[9px]" src="{{ asset('images/profile/arrow.png') }}" alt="">
                    </div> 

                    <div id="contact-container"  class="hidden transition-all duration-1000 ease-in-out transform -translate-y-10">
                        <div class="flex gap-4 border border-gray rounded-t-md p-3 hover:bg-gray-200 cursor-pointer">
                            <img class="w-[24px] h-[24px]" src="{{ asset('images/profile/whatsapp.png') }}" alt="">
                            <span class="font-medium text-xl">Whatsapp</span>
                        </div>
                        <div class="flex gap-4 border border-gray p-3 hover:bg-gray-200 cursor-pointer">
                            <img class="w-[24px] h-[24px]" src="{{ asset('images/profile/message.png') }}" alt="">
                            <span class="font-medium text-xl ">Correo</span>
                        </div>
                        <div class="flex gap-4 border border-gray rounded-b-md p-3 hover:bg-gray-200 cursor-pointer">
                            <img class="w-[24px] h-[24px]" src="{{ asset('images/profile/phone.png') }}" alt="">
                            <span class="font-medium text-xl">Teléfono</span>
                        </div>
                    </div>
                    
                </div>
                
        
            </div>
            
        </div>

        <!-- termina contenedor de arriba -->
        

           

            <section class="max-sm:text-2xl mt-10 max-sm:text-center max-sm:mt-[2rem]">
                <h1 class="text-primary font-bold text-[20px]">Descripción del servicio</h1>
                <p class="text-[16px] max-sm:text-[14px] font-light text-black mt-3">
                ¡Hola! Soy Emanuel Jiménez, un experto en modelado 3D con más de 5 </br> 
                años de experiencia, especializado en la creación de modelos 3D para</br>
                diferentes industrias, incluyendo arquitectura, videojuegos y productos</br>
                comerciales.</br>
                </br>
                Mi objetivo es que todos mis clientes queden completamente satisfechos,</br>
                por lo que ofrezco revisiones ilimitadas para asegurar que cada detalle</br>
                cumpla con tus expectativas.</br>
                </br>
                Me enfoco en ofrecerte un modelado preciso y detallado, adaptado a tus</br>
                necesidades específicas, ya sea para renderizados fotorrealistas,</br>
                animación o impresión 3D.</br>
                </br>
                Todos mis paquetes incluyen:</br>

                -Modelos en alta calidad, listos para renderizar o animar</br>
                -Revisión ilimitada para ajustes y mejoras</br>
                -Entrega en múltiples formatos 3D compatibles con tus herramientas</br>
                -Asesoramiento personalizado para optimizar el uso de tus modelos</br>
            </section>


            <div class="cursor-pointer max-sm:justify-center ">
                <div class="flex max-sm:grid gap-9 mt-20 border border-gray-300 rounded-md p-5 shadow-md w-[667px] max-sm:w-[300px] max-sm:justify-center">
                    <div>
                        <img class="w-[130px] max-sm:w-[120px]" src="{{ asset('images/profile/photo.png') }}" alt="">
                    </div>
                    
                    <div class="grid ">
                        <div class="grid grid-cols-2 max-sm:grid-cols-1 max-md:grid-cols-1 max-lg:grid-cols-1 gap-30 max-sm:gap-1">
                            <div class="w-40 sm:flex max-sm:justify-center ">
                                <span class="text-primary font-semibold text-[18px] ">Emanuel Jiménez</span>
                            </div>
                            <span class="text-[16px] font-light text-gray-400" >@jimenezemanuel</span>
                        </div>
                        <div class="flex max-sm:justify-center ">
                            <img class="w-[14px] h-[15px] mr-2 mb-2" src="{{ asset('images/profile/star.png') }}" alt="">
                            <span class="text-[16px] font-light text-black">4.8</span>
                        </div>
                        <div class="flex max-sm:justify-center ">
                            <img class="w-[14px] h-[19px] mr-2" src="{{ asset('icons/location.svg') }}" alt="">
                            <span class="text-[16px] font-light text-black" >San Ramón, Aljuela, CR</span>
                        </div>
                        <div class="flex max-sm:justify-center ">
                            <img class="w-[14px] h-[19px] mr-2" src="{{ asset('images/profile/user.png') }}" alt="">
                            <span class="text-[16px] font-light text-black">Se unió en enero, 2023</span>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>
    </section>

    <script>
        function changeImage(element) 
        {
            const mainImage = document.getElementById('mainImage');
            mainImage.src = element.src;
        }
    </script>

<script>
    document.getElementById('contact-button').addEventListener('click', function() {
        const contactContainer = document.getElementById('contact-container');
    
        contactContainer.classList.toggle('hidden');

        if (contactContainer.classList.contains('hidden')) {
            contactContainer.classList.remove('opacity-100', 'translate-y-0');
            contactContainer.classList.add('opacity-0', 'translate-y-5');
        } else {
            contactContainer.classList.remove('opacity-0', 'translate-y-5');
            contactContainer.classList.add('opacity-100', 'translate-y-0');
        }
        setTimeout(() => {
            if (contactContainer.classList.contains('hidden')) {
                contactContainer.classList.add('hidden'); 
            }
        }, 300); 
    });
</script>
    
</body>
</html>
