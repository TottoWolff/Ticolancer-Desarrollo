@extends('buyers.layout')
@section('content')

    <section class="px-[15rem] p-20 md:px-16 md:py-16 max-sm:p-5  max-sm:mt-[2rem]">


        <section >

        <!-- Inicia contenedor arriba -->
        <div class="px-20 flex flex-wrap flex-row max-sm:flex-col max-md:flex-col lg:gap-[15rem] gap-[5rem] mmax-sm:gap-[2rem]">


            <!-- Primera columna -->
            <div>
                
                <div class="grid gap-2 max-sm:text-center">
                    <h1 class="text-3xl font-semibold">{{ $gig->gig_name}}</h1>
                    <h2 class="text-xl">Servicio de {{ $gig->gig_name}}</h2>
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
                    <img class="w-[36rem] max-h-[20rem] rounded-md object-cover max-sm:w-[90%] max-md:w-[70%]" id="mainImage" src="{{ asset('images/gigs/' .$gig->gig_image) }}" alt="">
                </div>

                <div class="flex space-x-4 mt-6 max-sm:justify-center">
                <img onclick="changeImage(this)" class="w-full sm:w-1/3 md:w-28 h-24 max-sm:w-[25%] max-sm:h-auto max-md:w-[10%] max-md:h-[10%]  object-cover rounded-md shadow cursor-pointer" src="{{ asset('images/gigs/' .$gig->gig_image) }}" alt="Imagen 1">

                    @foreach ($imagesNames as $imageName)
                        <img onclick="changeImage(this)" class="w-full sm:w-1/3 md:w-28 h-24 max-sm:w-[25%] max-sm:h-auto max-md:w-[10%] max-md:h-[10%]  object-cover rounded-md shadow cursor-pointer" src="{{ asset('images/gigs/' .$imageName) }}" alt="Imagen 1">
                    @endforeach


                 </div>

            </div>

            <!-- Segunda columna -->
            <div class="grid gap-3">
                
            <!-- Botón Compartir -->
                <!-- <div class="w-[46px] h-[45px] border border-gray-300 p-3 rounded-md flex ml-auto hover:bg-gray-200">
                    <img class="cursor-pointer " src="{{ asset('images/profile/share.png') }}" alt="">
                </div> -->
                
                <!-- Detalle de servicio -->
                <div class="border border-gray-300 rounded-md max-sm:w-[90%] max-md:justify-center">
                    <h1 class="p-5 text-2xl font-semibold" >Detalle del servicio</h1>
                    <img src="{{ asset('images/profile/line.png') }}" alt="">
                    <div class="p-5 grid gap-3">
                        <span class="text-primary font-semibold text-[18px] max-sm:text-[14px]">Desde  ₡ {{ $gig->gig_price }}</span>
                        <div class="flex">
                            <img class="w-[14px] h-[15px] mr-2 mb-2" src="{{ asset('images/profile/star.png') }}" alt="">
                            <div class="flex max-sm:justify-center">
                                <span class="text-primary font-semibold text-[18px] max-sm:text-[14px]">{{ $averageRating }} /5</span>
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
        

           

            <section class="p-20 max-sm:text-2xl mt-10 max-sm:text-center max-sm:mt-[2rem]">
                <h1 class="text-primary font-bold text-[20px]">Descripción del servicio</h1>
                <p class="text-[16px] max-sm:text-[14px] font-light text-black mt-3 w-[45%]">
                {{ $gig->gig_description }}
            </section>


            <div class="px-20 cursor-pointer max-sm:justify-center ">
                <div class="flex max-sm:grid gap-9 mt-20 border border-gray-300 rounded-md p-5 shadow-md w-[667px] max-sm:w-[300px] max-sm:justify-center">
                    <div>
                        <img class="w-[130px] max-sm:w-[120px]" src="{{ asset('images/profile/photo.png') }}" alt="">
                    </div>
                    
                    <div class="grid ">
                        <div class="grid grid-cols-2 max-sm:grid-cols-1 max-md:grid-cols-1 max-lg:grid-cols-1 gap-30 max-sm:gap-1">
                            <div class="w-40 sm:flex max-sm:justify-center ">
                                <span class="text-primary font-semibold text-[18px] ">{{ $name }} {{ $lastname }}</span>
                            </div>
                            <span class="text-[16px] font-light text-gray-400" >@ {{ $username }}</span>
                        </div>
                        <div class="flex max-sm:justify-center ">
                            <img class="w-[14px] h-[15px] mr-2 mb-2" src="{{ asset('images/profile/star.png') }}" alt="">
                            <span class="text-[16px] font-light text-black">4.8</span>
                        </div>
                        <div class="flex max-sm:justify-center ">
                            <img class="w-[14px] h-[19px] mr-2" src="{{ asset('icons/location.svg') }}" alt="">
                            <span class="text-[16px] font-light text-black" >{{ $userCity }} , {{ $userProvince }}, CR</span>
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
@endsection
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

