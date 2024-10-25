@extends('sellers.layout')

@section('content')

<section class="mt-[210px]">

    <section class="flex flex-col px-[140px] gap-[20px] max-sm:w-[90vw] max-sm:px-0 max-sm:m-auto mt-[80px]">


        <section class="container mx-auto px-4 mt-10 grid grid-cols-1 md:grid-cols-2 sm:grid-cols-1 gap-8">
            <div class="border-[1px] border-blue rounded-[16px] p-[30px]">
                <div class="flex max-sm:grid gap-9 max-sm:place-items-center max-sm:text-center">
                    <div>
                        @if ($profile == null)
                        <img class="w-[190px] max-sm:w-[120px] max-sm:h-[120px] rounded-full h-[190px] object-cover" src="{{ asset('images/buyers_profiles/profile_placeholder.png') }}" alt="">
                        @else
                        <img class="w-[190px] max-sm:w-[120px] max-sm:h-[120px] rounded-full h-[190px] object-cover" src="{{ asset('images/buyers_profiles/' . $profile) }}" alt="">

                        @endif
                    </div>

                    <div class="grid max-sm:place-items-center">
                        <div class="grid grid-cols-2 max-sm:grid-cols-1 max-md:grid-cols-1 max-lg:grid-cols-1 gap-30 max-sm:gap-1">
                            <div class="w-40">
                                <span class="text-primary font-semibold text-[18px] max-sm:text-center">{{ $name }} {{ $lastname }}</span>
                            </div>
                            <span class="text-[16px]  font-light text-gray-400 "> @ {{ $username }}</span>
                        </div>
                        <div class="flex">
                            <img class="w-[14px] h-[15px] mr-2 mt-1" src="{{ asset('images/profile/star.png') }}" alt="">
                            <span class="text-[16px] font-light text-black">4.8</span>
                        </div>
                        <div class="flex">
                            <img class="w-[14px] h-[19px] mr-2" src="{{ asset('icons/location.svg') }}" alt="">
                            <span class="text-[16px] font-light text-black ">{{ $userCity }} , {{ $userProvince }}, CR</span>
                        </div>
                        <div class="flex">
                            <img class="w-[14px] h-[19px] mr-2" src="{{ asset('images/profile/user.png') }}" alt="">
                            <span class="text-[16px] font-light text-black">Se unió en {{ $created_at }}</span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="h-[1px] bg-blue bg-opacity-50 w-full mt-8"></div>
                    <section class="max-sm:text-2xl mt-10 max-sm:text-center max-sm:mt-[2rem] w-full max-w-[40rem] max-sm:max-w-[20rem] mb-10">
                        <h1 class="text-primary font-bold text-[20px] max-sm:text-[20px]">Sobre mi</h1>
                        <p
                        class="text-[16px] max-sm:text-[14px] font-light text-black mt-3 w-full border-[1px] border-blue border-opacity-50 rounded-[16px] p-[20px] min-h-[48px] max-h-auto">
                        {{ $seller->sellerDescription }}
                    </p>
                    </section>

                    <div class="h-[1px] bg-blue bg-opacity-50 w-full"></div>
                    <section class="py-14 max-sm:text-center">
                        <h2 class="text-primary font-bold text-[20px] max-sm:text-[20px]">Idiomas</h2>
                        <div>
                            <div class="flex flex-col flex-wrap gap-5 mt-5 md:flex-row">
                                @foreach ($languages as $language)
                                <div class="border border-gray-400 rounded-full px-3 py-1">
                                    <span class="font-light text-[16px]">{{ $language->language_name }}
                                        ({{ $language->level_name }})</span>
                                </div>
                                

                                @endforeach
                            </div>
                        </div>
                    </section>

                    <!-- <div class="h-[1px] bg-blue bg-opacity-50 w-full"></div>
                    <section class="py-14 max-sm:text-center">
                        <h2 class="text-primary font-bold text-[20px] max-sm:text-[20px]">Habilidades</h2>
                        <div>
                            <div class="flex flex-col flex-wrap gap-5 mt-5 md:flex-row">
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
                    </section> -->
                </div>
            </div>

            <div class="flex flex-col gap-4 max-sm:justify-centery border-[1px] border-blue rounded-[16px] p-[30px]">
                <div class="flex gap-3 py-8">
                    <div class="w-full h-[45px] bg-white border border-gray-300 rounded-lg shadow-sm text-center">
                        <button class="text-primary font-medium text-[20px] py-2">Más sobre mi</button>
                    </div>
                    <button class="w-[50px] h-[45px] bg-white border border-gray-300 rounded-lg shadow-sm text-center items-center justify-center p-2">
                        <img class="w-[34px] max-sm:w-[28px]" src="{{ asset('icons/liked.svg') }}" alt="">
                    </button>
                </div>


                    <div>
                        <div class=" flex w-full mb-12 max-sm:w-[80%] h-[45px] border border-gray-400 rounded-md cursor-pointer place-items-center place-content-center 
                             hover:translate-y-[-5px] transition-all duration-500 ease-out hover:bg-blue hover:text-white text-blue font-semibold "
                            id="contact-button">
                            <span class=" text-xl text-center ">Contáctame</span>
                        </div>
                        <div id="contact-container"
                            class="absolute hidden transition-all duration-1000 ease-in-out transform translate-y-10 w-[35%] border border-gray-400 rounded-md">
                           
                            <div class="flex gap-4 border border-gray rounded-t-md p-3 bg-white">
                                <img class="w-[24px] h-[24px] cursor-pointer" src="{{ asset('images/profile/whatsapp.png') }}" alt="" 
                                onclick="window.open('https://wa.me/+506{{ $phone }}', '_blank')">
                                <span class="font-medium text-xl cursor-pointer hover:underline" 
                                onclick="window.open('https://wa.me/+506{{ $phone }}', '_blank')">Whatsapp</span>
                                <div class="ml-auto hover:bg-gray-200 rounded-md">
                                    <button class="ml-2 p-1 text-white bg-blue-500 rounded " 
                                        onclick="copyToClipboard('+506{{ $phone }}'); event.stopPropagation();">
                                        <img src="{{ asset('images/profile/copy.png') }}" alt="Copiar" class="mr-2" />
                                    </button>
                                </div>
                                <div id="copy-notification" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-60 rounded-sm">
                                    <div class=" text-white text-sm p-4 rounded-lg shadow-lg border border-gray-300">¡Copiado en portapapeles!</div>
                                </div>
                            </div>

                            <div class="flex gap-4 border border-gray p-3 bg-white">
                                <img class="w-[24px] h-[24px] cursor-pointer" src="{{ asset('images/profile/message.png') }}" alt="" 
                                onclick="window.location.href='mailto:{{ $email }}?subject={{ urlencode($emailSubject) }}&body={{ urlencode($emailBody) }}'">
                                <span class="font-medium text-xl cursor-pointer hover:underline" 
                                onclick="window.location.href='mailto:{{ $email }}?subject={{ urlencode($emailSubject) }}&body={{ urlencode($emailBody) }} '">Correo</span>
                                <div class="ml-auto hover:bg-gray-200 rounded-md">
                                    <button class="ml-2 p-1 text-white bg-blue-500 rounded " 
                                        onclick="copyToClipboard('{{ $email }}'); event.stopPropagation();">
                                        <img src="{{ asset('images/profile/copy.png') }}" alt="Copiar" class="mr-2" />
                                    </button>
                                </div>
                                <div id="copy-notification" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-60 rounded-sm">
                                    <div class=" text-white text-sm p-4 rounded-lg shadow-lg border border-gray-300">¡Copiado en portapapeles!</div>
                                </div>
                            </div>
                         

                            <div class="flex gap-4 border border-gray rounded-b-md p-3 bg-white">
                                <img class="w-[24px] h-[24px]  cursor-pointer" src="{{ asset('images/profile/phone.png') }}" alt="" onclick="window.location.href='tel:+506{{ $phone }}'">
                                <span class="font-medium text-xl cursor-pointer hover:underline" onclick="window.location.href='tel:+506{{ $phone }}'">Teléfono</span>   
                                <div class="ml-auto hover:bg-gray-200 rounded-md">
                                    <button class="ml-2 p-1 text-white bg-blue-500 rounded " 
                                        onclick="copyToClipboard('+506{{ $phone }}'); event.stopPropagation();">
                                        <img src="{{ asset('images/profile/copy.png') }}" alt="Copiar" class="mr-2" />
                                    </button>
                                </div>
                                <div id="copy-notification" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-60 rounded-sm">
                                    <div class=" text-white text-sm p-4 rounded-lg shadow-lg border border-gray-300">¡Copiado en portapapeles!</div>
                                </div>
                            </div>
                             

                        </div>

                <div class="h-[1px] bg-blue bg-opacity-50 w-full"></div>
                    <section class="py-10 max-sm:text-center">
                        <h2 class="text-primary font-bold text-[20px] max-sm:text-[20px] ">Redes Sociales</h2>

                        <div class="flex gap-10 mt-5">
                            <a href="{{ $sellerFacebook }}" class="flex gap-[10px] items-center">
                                <img src="{{ asset('icons/facebook.svg') }}" alt="Facebook" class="w-[40px] h-[40px]" />
                            </a>
                            <a href="{{ $sellerLinkedin }}" class="flex gap-[10px] items-center">
                                <img src="{{ asset('icons/linkedin.svg') }}" alt="Linkedin" class="w-[40px] h-[40px]" />
                            </a>
                            <a href="{{ $sellerInstagram }}" class="flex gap-[10px] items-center">
                                <img src="{{ asset('icons/instagram.svg') }}" alt="Instagram"
                                    class="w-[34px] h-[34px]" />
                            </a>
                            <a href="{{ $sellerTwitter }}" class="flex gap-[10px] items-center">
                                <img src="{{ asset('icons/twitter.svg') }}" alt="Twitter" class="w-[40px] h-[40px]" />
                            </a>
                            <a href="{{ $sellerWebsite }}" class="flex gap-[10px] items-center">
                                <img src="{{ asset('icons/internet.svg') }}" alt="Internet" class="w-[40px] h-[40px]" />
                            </a>
                        </div>

                    </section>
            </div>
        </section>





        <section class="py-[140px]">
            <h1 class="text-primary font-bold text-[30px] max-sm:text-[20px]">Mis Servicios</h1>

            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 ">
                @if ($gigs && count($gigs) > 0)
                @foreach ($gigs as $gig)
                <div class="flex-wrap">
                    <a href="{{ route('sellerGig', ['id' => $gig->id, 'username' => $username]) }}" class="block w-full cursor-pointer ">
                        <div class="mt-5 gap-2 ">
                            <img class="cursor-pointer w-full h-[15rem] border-2 rounded-md" src="{{ asset('images/gigs/' . $gig->gig_image) }}" alt="{{ $gig->gig_name }}">

                            <span class="text-[16px] font-light text-black">{{ $gig->gig_name }}</span>

                            <div class="grid gap-2">
                                <div class="flex gap-2 mt-6">
                                    <div>
                                        <img class="mt-0.5" src="{{ asset('images/profile/star.png') }}" alt="">
                                    </div>
                                    <div class="flex gap-1">
                                        <span class="text-primary font-semibold text-[15px]">
                                            {{ $gig->reviews->isNotEmpty() ? number_format(optional($gig->reviews->first())->average_rating, 1) : 'Sin calificaciones' }} / 5
                                        </span>
                                        <span class="text-primary font-medium text-gray-400 text-[15px] ">(221)</span>
                                    </div>
                                </div>
                                <div class="text-primary font-semibold text-[16px]">Desde ₡ {{ $gig->gig_price }}</div>
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
@endsection


<script>
    function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        const notification = document.getElementById('copy-notification');
        notification.classList.remove('hidden');

        setTimeout(() => {
            notification.classList.add('hidden');
        }, 1000);
    }, function(err) {
        console.error('Error al copiar al portapapeles: ', err);
    });
}
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const contactButton = document.getElementById('contact-button');
        const contactContainer = document.getElementById('contact-container');

        function toggleContactContainer() {
            contactContainer.classList.toggle('hidden');

            if (contactContainer.classList.contains('hidden')) {
                contactContainer.classList.remove('opacity-100', 'translate-y-0');
                contactContainer.classList.add('opacity-0', 'translate-y-5');
            } else {
                contactContainer.classList.remove('opacity-0', 'translate-y-5');
                contactContainer.classList.add('opacity-100', 'translate-y-0');
            }
        }

        contactButton.addEventListener('click', function (event) {
            event.stopPropagation(); 
            toggleContactContainer();
        });

        document.addEventListener('click', function (event) {
            if (!contactContainer.classList.contains('hidden') && !contactButton.contains(event.target)) {
                contactContainer.classList.add('hidden');
                contactContainer.classList.remove('opacity-100', 'translate-y-0');
                contactContainer.classList.add('opacity-0', 'translate-y-5');
            }
        });
    });
</script>