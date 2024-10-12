@extends('sellers.layout')
@section('content')
    <section class=" md:px-16 md:py-16 max-sm:p-5  max-sm:mt-[2rem] mt-[120px] ">


        <section>

            <!-- Inicia contenedor arriba -->
            <div class=" place-content-around sm:gap-10 max-sm:gap-5 container mx-auto px-4 mt-10 flex flex-wrap gap-8">


                <!-- Primera columna -->
                <div class="border-[1px] border-blue border-opacity-50 rounded-[16px] p-[20px] h-auto">

                    <div class="grid gap-2 max-sm:text-center">
                        <h1 class="text-3xl font-semibold">{{ $gig->gig_name }}</h1>
                        <h2 class="text-xl">Servicio de {{ $gig->gig_name }}</h2>
                        <div class="h-[1px] bg-blue bg-opacity-50 w-full"></div>
                    </div>

                    <div class="flex max-sm:grid gap-6 mt-3 max-sm:justify-center max-sm:place-items-center">
                        <div>
                            @if ($profile == null)
                                <img class="w-[70px] max-sm:w-[70px] rounded-full h-[70px] cursor-pointer object-cover"
                                    src="{{ asset('images/buyers_profiles/profile_placeholder.png') }}" alt="">
                            @else
                            <a href="{{ route('sellerGigsProfile', $username) }}">
                                <img class="w-[70px] max-sm:w-[70px] rounded-full h-[70px] cursor-pointer object-cover"
                                    src="{{ asset('images/buyers_profiles/' . $profile) }}" alt="">
                            </a>
                            @endif
                        </div>

                        <div class="grid max-sm:text-center max-sm:justify-center">
                            <div
                                class="grid grid-cols-2 max-sm:grid-cols-1 max-md:grid-cols-1 max-lg:grid-cols-1 gap-30 max-sm:gap-1">
                                <div class="w-40 ">
                                    <a href="{{ route('sellerGigsProfile', $username) }}" class="text-primary font-semibold text-[18px]  hover:underline cursor-pointer">{{ $name }}
                                        {{ $lastname }} </a>
                                </div>
                                <span class="text-[16px]  font-light text-gray-400">@ {{ $username }} </span>
                            </div>
                            <div class="flex max-sm:justify-center">
                                <img class="w-[14px] h-[15px] mr-2 mb-2" src="{{ asset('images/profile/star.png') }}"
                                    alt="">
                                <span class="text-[16px] font-light text-black">4.8</span>
                            </div>
                            <div class="flex max-sm:justify-center">
                                <img class="w-[14px] h-[19px] mr-2" src="{{ asset('icons/location.svg') }}" alt="">
                                <span class="text-[16px] font-light text-black">{{ $userCity }} , {{ $userProvince }},
                                    CR</span>
                            </div>
                        </div>
                         
                    </div>
                    <div class="h-[1px] bg-blue bg-opacity-50 w-full mt-3"></div>

                    <div class="flex   justify-center mt-10 mb-10 max-sm:mt-[2rem] max-sm:flex max-sm:justify-center border-opacity-50 rounded-md">
                        <img class="flex justify-center w-[625px] h-[320px]  rounded-md object-cover max-sm:w-[90%] max-md:w-[70%]"
                            id="mainImage" src="{{ asset('images/gigs/' . $gig->gig_image) }}" alt="">
                    </div>

                    <div class="flex space-x-4 mt-6  justify-center">
                        <img onclick="changeImage(this)"
                            class="w-full flex justify-center sm:w-1/3 md:w-28 h-24 max-sm:h-auto max-md:w-[10%] max-md:h-[10%]  object-cover rounded-md shadow cursor-pointer"
                            src="{{ asset('images/gigs/' . $gig->gig_image) }}" alt="Imagen 1">

                        @foreach ($imagesNames as $imageName)
                            @if ($imageName == null)
                            <img onclick="changeImage(this)"
                                    class="w-full sm:w-1/3 md:w-28 h-24 max-sm:h-auto max-md:w-[10%] max-md:h-[10%]  object-cover rounded-md shadow cursor-pointer"
                                    src="{{ asset('images/gigs/gig_placeholder.png') }}" alt="Imagen 1">
                            @else
                            <div class="flex place-content-center">
                                <img onclick="changeImage(this)"
                                class="w-full sm:w-1/3 md:w-28 h-24 max-sm:w-full max-sm:h-auto max-md:w-[10%] max-md:h-[10%]  object-cover rounded-md shadow cursor-pointer"
                                src="{{ asset('images/gigs/' . $imageName) }}" alt="Imagen 1">
                            </div>
                                
                            @endif
                        @endforeach


                    </div>

                    <section class="max-sm:text-2xl mt-10 max-sm:text-center max-sm:mt-[2rem] w-full max-w-[40rem] max-sm:max-w-[20rem] ">
                        <h1 class="text-primary font-bold text-[20px]">Descripción del servicio</h1>
                        <p class="text-[16px] max-sm:text-[14px] font-light text-black mt-3 w-full border-[1px] border-blue border-opacity-50 rounded-[16px] p-[20px] min-h-[48px] max-h-auto">
                            {{ $gig->gig_description }}
                        </p>
                    </section>


                    

                </div>

                <!-- Segunda columna -->
                <div>

                    <!-- Botón Compartir -->
                    <!-- <div class="w-[46px] h-[45px] border border-gray-300 p-3 rounded-md flex ml-auto hover:bg-gray-200">
                        <img class="cursor-pointer " src="{{ asset('images/profile/share.png') }}" alt="">
                    </div> -->

                    <!-- Detalle de servicio -->
                    
                    <div class="border-[1px] border-blue border-opacity-50 rounded-[16px] w-[630px] h-[400px] max-sm:w-full max-md:justify-center p-[20px] relative">
                        <h1 class=" text-2xl font-semibold">Detalle del servicio</h1>
                        <div class="h-[1px] bg-blue bg-opacity-50 w-full"></div>
                        <div class="mt-3 grid gap-3">
                            <div class="flex mt-5">
                                <img class="w-[14px] h-[15px] mr-2 mt-1" src="{{ asset('images/profile/star.png') }}">
                                <span class="text-primary font-medium text-xl max-sm:text-[14px]">Desde  ₡
                                {{ $gig->gig_price }}</span>
                            </div>
                            <div class="flex">
                                <img class="w-[14px] h-[15px] mr-2 mt-1" src="{{ asset('images/profile/star.png') }}"alt="">
                                <div class="flex max-sm:justify-center">
                                    @if($averageRating == null)
                                    <span
                                        class="text-primary font-medium text-xl max-sm:text-[14px]">Sin reseñas
                                    </span>
                                    @else
                                    <span
                                        class="text-primary font-semibold text-[18px] max-sm:text-[14px]">{{ $averageRating }}
                                    </span>
                                    @endif
                                    <span
                                        class="text-primary text-gray-400 font-semibold text-[18px] max-sm:text-[14px]">
                                        <!-- (10 opiniones) -->
                                    </span>
                                </div>
                            </div>
                            <span class="text-primary text-gray-400 text-xl max-sm:text-[14px]">Publicado en {{ $published_at }}</span>
                        </div>

                        <!-- Contacto -->
                        <div class="grid gap-8 w-auto place-items-center content-center h-[84px] bg-gray-200 rounded-md p-6 mt-24">
                            <div class="flex w-full h-[45px] border border-gray-400 rounded-md cursor-pointer place-items-center place-content-center 
                             hover:translate-y-[-5px] transition-all duration-500 ease-out hover:bg-blue hover:text-white text-blue font-semibold " id="contact-button">
                                <span class=" text-xl text-center ">Contáctame</span>
                            </div>

                            <div id="contact-container"
                                class="hidden transition-all duration-1000 ease-in-out transform -translate-y-10">
                                <div class="flex gap-4 border border-gray rounded-t-md p-3 hover:bg-gray-200 cursor-pointer">
                                    <img class="w-[24px] h-[24px]" src="{{ asset('images/profile/whatsapp.png') }}"
                                        alt="">
                                    <span class="font-medium text-xl">Whatsapp</span>
                                </div>
                                <div class="flex gap-4 border border-gray p-3 hover:bg-gray-200 cursor-pointer">
                                    <img class="w-[24px] h-[24px]" src="{{ asset('images/profile/message.png') }}"
                                        alt="">
                                    <span class="font-medium text-xl ">Correo</span>
                                </div>
                                <div class="flex gap-4 border border-gray rounded-b-md p-3 hover:bg-gray-200 cursor-pointer">
                                    <img class="w-[24px] h-[24px]" src="{{ asset('images/profile/phone.png') }}"
                                        alt="">
                                    <span class="font-medium text-xl">Teléfono</span>
                                </div>
                            </div>

                        </div>
                    </div>



                </div>

            </div>

            <!-- termina contenedor de arriba -->



           

        </section>
    </section>

    <!-- Añadir Reseñas -->
    <div class="container mx-auto px-4 mt-10 grid grid-cols-2 gap-8">

    <!-- Formulario para dejar la reseña -->
    <div class="border border-gray-300 p-6 rounded-[16px] ">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Deja tu Reseña</h2>
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('reviews.store', ['gig' => $gig->id]) }}" method="POST" class="space-y-4">
            @csrf

            <div class="form-group">
                <label for="gig-rating" class="block text-sm font-semibold text-gray-700 mb-2">Calificación</label>
                <select name="rating" id="gig-rating"
                    class="w-full px-[20px] py-[10px] rounded-[10px] text-blue font-semibold border-solid border-[1px] transition-all duration-500 focus:outline-none focus:border-blue focus:ring-2 focus:ring-blue">
                    <option value="5">5 - Excelente</option>
                    <option value="4">4 - Muy bueno</option>
                    <option value="3">3 - Bueno</option>
                    <option value="2">2 - Regular</option>
                    <option value="1">1 - Malo</option>
                </select>
            </div>

            <div class="form-group">
                <label for="review-comments" class="block text-sm font-semibold text-blue mb-2">Comentario</label>
                <textarea name="comment" id="review-comments" rows="4" placeholder="Escribe tu reseña aquí..."
                    class="w-full px-[20px] py-[10px] rounded-[10px] text-blue font-semibold border-solid border-[1px] transition-all duration-500 focus:outline-none focus:border-blue focus:ring-2 focus:ring-blue"></textarea>
            </div>

            <button type="submit"
                class="w-full px-[20px] py-[10px] rounded-[10px] text-blue font-semibold border-solid border-[1px] border-blue hover:translate-y-[-5px] transition-all duration-500 ease-out hover:bg-blue hover:text-white">
                Enviar Reseña
            </button>
        </form>
    </div>

    <!-- Sección de reseñas -->
    <div class="border border-gray-300 p-6 rounded-[16px] ">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Reseñas</h2>
        @forelse($reviews as $review)
        <div class="border border-gray-300 p-4 mb-4 rounded-lg">
            <p class="text-blue font-semibold">Calificación: {{ $review->rating }} / 5</p>
            <p class="text-blue">{{ $review->comment }}</p>
            <p class="text-sm text-blue">{{ $review->created_at->format('d M Y') }}</p>
        </div>
        @empty
            <p class="text-blue">Aún no hay reseñas para este servicio.</p>
        @endforelse
    </div>

</div>


@endsection




<script>
    function changeImage(element) {
        const mainImage = document.getElementById('mainImage');
        mainImage.src = element.src;
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
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
    });
</script>
