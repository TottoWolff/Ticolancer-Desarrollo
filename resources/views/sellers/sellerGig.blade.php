@extends('buyers.layout')
@section('content')
<section class=" md:px-16 md:py-16 max-sm:p-5  max-sm:mt-[8rem]  mt-[120px]">


    <section>

        <!-- Inicia contenedor arriba -->
        <div
            class=" sm:gap-10 max-sm:gap-5 container mx-auto px-4 mt-10 grid grid-cols-1 md:grid-cols-2 sm:grid-cols-1  gap-8">


            <!-- Primera columna -->
            <div class="border-[1px] border-blue border-opacity-50 rounded-[16px] p-[20px] h-auto">

                <div class="grid gap-2 max-sm:text-center">
                    <div class="flex justify-between items-center max-sm:flex-col">
                        <div>
                            <h1 class="text-3xl font-semibold">{{ $gig->gig_name }}</h1>
                            <h2 class="text-xl">Servicio de {{ $gig->gig_name }}</h2>
                        </div>
                        <div class="flex gap-3 py-8">
                        @if (auth('buyers')->user()->hasLikedGigs($gig->id))
                        <form action="{{ route('unlike.gig', ['username' => $username, 'gigId' => $gig->id]) }}" method="POST">
                            @csrf
                            <button class=" top-2 right-2  text-blue px-3 py-2 rounded  ">
                                <svg width="30" height="30" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path class="fill-red-500 hover:fill-red-500 transition-all duration-500 ease-out" d="M3.91337 0.216696C5.01251 0.195629 5.94832 0.58572 6.69974 1.38176C6.9342 1.63027 7.06853 1.62732 7.30594 1.38221C8.35705 0.296889 9.65872 -0.0426845 11.0929 0.330416C12.5509 0.709633 13.5159 1.68124 13.8673 3.15778C14.2718 4.85724 13.7381 6.27148 12.451 7.44538C10.9325 8.83041 9.44442 10.2487 7.9468 11.6566C7.26018 12.302 6.74617 12.3032 6.06114 11.6582C4.48809 10.1771 2.90666 8.70491 1.33769 7.2193C0.12324 6.06942 -0.257563 4.65018 0.167867 3.05856C0.582423 1.50658 1.66027 0.599085 3.21588 0.246372C3.26141 0.236178 3.30672 0.218735 3.35248 0.218056C3.53937 0.214884 3.72648 0.216696 3.91337 0.216696Z" fill="red" />
                                </svg>
                                <input type="hidden" name="gigId" value="{{ $gig->id }}">
                                <input type="hidden" name="usernameId" value="{{ auth('buyers')->user()->id }}">
                            </button>
                        </form>
                        @else
                        <form id="likeGigForm" action="{{ route('like.gig', ['username' => $username, 'gigId' => $gig->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class=" top-2 right-2  text-blue px-3 py-2 rounded ">
                                <svg width="30" height="30" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path class="fill-slate-300 hover:fill-red-500 transition-all duration-500 ease-out"
                                        d="M3.91337 0.216696C5.01251 0.195629 5.94832 0.58572 6.69974 1.38176C6.9342 1.63027 7.06853 1.62732 7.30594 1.38221C8.35705 0.296889 9.65872 -0.0426845 11.0929 0.330416C12.5509 0.709633 13.5159 1.68124 13.8673 3.15778C14.2718 4.85724 13.7381 6.27148 12.451 7.44538C10.9325 8.83041 9.44442 10.2487 7.9468 11.6566C7.26018 12.302 6.74617 12.3032 6.06114 11.6582C4.48809 10.1771 2.90666 8.70491 1.33769 7.2193C0.12324 6.06942 -0.257563 4.65018 0.167867 3.05856C0.582423 1.50658 1.66027 0.599085 3.21588 0.246372C3.26141 0.236178 3.30672 0.218735 3.35248 0.218056C3.53937 0.214884 3.72648 0.216696 3.91337 0.216696Z"
                                        />
                                </svg>
                                <input type="hidden" name="gigId" value="{{ $gig->id }}">
                                <input type="hidden" name="usernameId" value="{{ auth('buyers')->user()->id }}">
                            </button>
                        </form>
                        @endif
                </div>
                        
                    </div>
                    
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
                                <a href="{{ route('sellerGigsProfile', $buyerId) }}"
                                    class="text-primary font-semibold text-[18px]  hover:underline cursor-pointer">{{ $name }}
                                    {{ $lastname }} </a>
                            </div>
                            <span class="text-[16px]  font-light text-gray-400">@ {{ $username }} </span>
                        </div>
                        
                        <div class="flex max-sm:justify-center">
                            <img class="w-[14px] h-[19px] mr-2" src="{{ asset('icons/location.svg') }}" alt="">
                            <span class="text-[16px] font-light text-black">{{ $sellerCity }} , {{ $sellerProvince }},
                                CR</span>
                        </div>
                    </div>

                </div>
                <div class="h-[1px] bg-blue bg-opacity-50 w-full mt-3"></div>



                <div
                    class="flex justify-center mt-10 mb-10 max-sm:mt-[2rem] max-sm:flex max-sm:justify-center border-opacity-50 rounded-md">
                    <img class="flex justify-center w-[625px] h-[320px] rounded-md object-cover max-md:w-[70%]"
                        id="mainImage" src="{{ asset('images/gigs/' . $gig->gig_image) }}" alt="">
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mt-6 justify-center">
                    <img onclick="changeImage(this)"
                        class="w-full max-w-40 max-h-20 h-auto object-cover rounded-md shadow cursor-pointer"
                        src="{{ asset('images/gigs/' . $gig->gig_image) }}" alt="Imagen principal">

                    @foreach ($imagesNames as $imageName)
                        @if ($imageName == null)
                            <img onclick="changeImage(this)"
                                class="w-full max-w-40 h-auto object-cover rounded-md shadow cursor-pointer"
                                src="{{ asset('images/gigs/gig_placeholder.png') }}" alt="Imagen de Placeholder">
                        @else
                            <img onclick="changeImage(this)"
                                class="w-full max-w-40 max-h-20 h-auto object-cover rounded-md shadow cursor-pointer"
                                src="{{ asset('images/gigs/' . $imageName) }}" alt="Imagen secundaria">
                        @endif
                    @endforeach
                </div>


                <section
                    class="max-sm:text-2xl mt-10 max-sm:text-center max-sm:mt-[2rem] w-full max-w-[40rem] max-sm:max-w-[20rem] ">
                    <h1 class="text-primary font-bold text-[20px]">Descripción del servicio</h1>
                    <p
                        class="text-[16px] max-sm:text-[14px] font-light text-black mt-3 w-full border-[1px] border-blue border-opacity-50 rounded-[16px] p-[20px] min-h-[48px] max-h-auto">
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
                <div
                    class="border-[1px] border-blue border-opacity-50 rounded-[16px] h-auto max-sm:w-full max-md:justify-center p-[20px] relative">
                    <h1 class=" text-2xl font-semibold">Detalle del servicio</h1>
                    <div class="h-[1px] bg-blue bg-opacity-50 w-full"></div>
                    <div class="mt-3 grid gap-3">
                        <div class="flex mt-5">
                            <img class="w-[14px] h-[15px] mr-2 mt-1" src="{{ asset('images/profile/star.png') }}">
                            <span class="text-primary font-medium text-xl max-sm:text-[14px]">Desde  ₡
                                {{ number_format($gig->gig_price) }}</span>
                        </div>
                        <div class="flex">
                            <img class="w-[14px] h-[15px] mr-2 mt-1" src="{{ asset('images/profile/star.png') }}"
                                alt="">
                            <div class="flex max-sm:justify-center">
                                @if($averageRating == null)
                                    <span class="text-primary font-medium text-xl max-sm:text-[14px]">Sin reseñas
                                    </span>
                                @else
                                    <span
                                        class="text-primary font-semibold text-[18px] max-sm:text-[14px]">{{ number_format($averageRating), 1 }}
                                    </span>
                                @endif
                                <span class="text-primary text-gray-400 font-semibold text-[18px] max-sm:text-[14px]">
                                    <!-- (10 opiniones) -->
                                </span>
                            </div>
                        </div>
                        <span class="text-primary text-gray-400 text-xl max-sm:text-[14px]">Publicado en {{ $published_at }}</span>
                    </div>

                    <!-- Contacto -->
                    <div
                        class="grid gap-8 w-auto place-items-center content-center h-[84px] bg-gray-200 rounded-md p-6 mt-24">
                        <div class="absolute flex w-[90%] max-sm:w-[80%] h-[45px] border border-gray-400 rounded-md cursor-pointer place-items-center place-content-center 
                             hover:translate-y-[-5px] transition-all duration-500 ease-out hover:bg-blue hover:text-white text-blue font-semibold "
                            id="contact-button">
                            <span class=" text-xl text-center ">Contáctame</span>
                        </div>

                        

                        <div id="contact-container"
                            class="mt-[10rem] absolute hidden transition-all duration-1000 ease-in-out transform translate-y-10 w-[90%] border border-gray-400 rounded-md">
                            @if($phone == null)
                            <div>  
                            </div>
                            @else
                            <div class="flex gap-4 border border-gray rounded-t-md p-3 bg-white">
                                <img class="w-[24px] h-[24px] cursor-pointer" src="{{ asset('images/profile/whatsapp.png') }}" alt="" 
                                onclick="window.open('https://wa.me/+506{{ $phone }}?text={{ urlencode($whatsappMessage) }} {{ $gig->gig_name }} visto en el sitio web de Ticolancer.', '_blank')">
                                <span class="font-medium text-xl cursor-pointer hover:underline" 
                                onclick="window.open('https://wa.me/+506{{ $phone }}?text={{ urlencode($whatsappMessage) }} {{ $gig->gig_name }} visto en el sitio web de Ticolancer.', '_blank')">Whatsapp</span>
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
                            @endif

                            @if($phone == null)
                            <div>
                            </div>
                            @else
                            <div class="flex gap-4 border border-gray p-3 bg-white">
                                <img class="w-[24px] h-[24px] cursor-pointer" src="{{ asset('images/profile/message.png') }}" alt="" 
                                onclick="window.location.href='mailto:{{ $email }}?subject={{ urlencode($emailSubject) }}&body={{ urlencode($emailBody) }} {{ $gig->gig_name }} visto en el sitio web de Ticolancer.'">
                                <span class="font-medium text-xl cursor-pointer hover:underline" 
                                onclick="window.location.href='mailto:{{ $email }}?subject={{ urlencode($emailSubject) }}&body={{ urlencode($emailBody) }} {{ $gig->gig_name }} visto en el sitio web de Ticolancer.'">Correo</span>
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
                            @endif

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

                    </div>
                </div>



            </div>

        </div>

        <!-- termina contenedor de arriba -->


        <!-- Añadir Reseñas -->
        <div class="container mx-auto px-4 mt-10 grid grid-cols-1 md:grid-cols-2 sm:grid-cols-1 gap-8">

            <!-- Formulario para dejar la reseña -->
            <div class="border border-gray-300 p-6 rounded-[16px]">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Deja tu Reseña</h2>
                @if(session('success'))
                    <div class="bg-green-100 text-green-700 p-4 mb-4 rounded">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('reviews.store', ['gig' => $gig->id]) }}" method="POST" class="space-y-4">
                    @csrf

                    <div class="form-group">
                        <label for="gig-rating"
                            class="block text-sm font-semibold text-gray-700 mb-2">Calificación</label>
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
                        <label for="review-comments"
                            class="block text-sm font-semibold text-blue mb-2">Comentario</label>
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
            <div class="border border-gray-300 p-6 rounded-[16px]">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Reseñas</h2>
                @forelse($reviews as $review)
                    <div class="border border-gray-300 p-4 mb-4 rounded-lg">
                        <strong>{{ $review->buyer->name }}</strong> 
                        <p class="text-blue font-semibold">Calificación: {{ $review->rating }} / 5</p>
                        <p class="text-blue">{{ $review->comment }}</p>
                        <p class="text-sm text-blue">{{ $review->created_at->format('d M Y') }}</p>
                    </div>
                @empty
                    <p class="text-blue">Aún no hay reseñas para este servicio.</p>
                @endforelse
            </div>

        </div>



    </section>



</section>




@endsection




<script>
    function changeImage(element) {
        const mainImage = document.getElementById('mainImage');
        mainImage.src = element.src;
    }
</script>


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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const likeButton = document.getElementById('likeButton');
        const likeIcon = document.getElementById('likeIcon');
        let liked = false;

        likeButton.addEventListener('click', function() {
            if (liked) {
                likeIcon.src = "{{ asset('images/profile/heart-like-empty.png') }}";
            } else {
                likeIcon.src = "{{ asset('images/profile/heart-like-fill.png') }}";
            }
            liked = !liked; 
        });
    });
</script>
