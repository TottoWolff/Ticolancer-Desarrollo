@extends('buyers.layout')

@section('content')
<div class="relative h-[70vh] max-sm:h-[100px] flex items-center justify-center mt-[100px]">

    <div class="absolute inset-0 bg-cover bg-center brightness-50 " style="background-image: url(https://traveler.marriott.com/es/wp-content/uploads/sites/2/2017/11/Costa-Rica_Animal-encounters_toucan-GettyImages-503235008.jpg);">
    </div>

    <h1 class="relative z-10 w-fit text-[150px] max-sm:text-[40px]  font-light font-secondary text-white ">Bienvenido {{$user->name}}</h1>
</div>





</div>
<div>
    {{-- Popular services --}}
    <div class="flex flex-col justify-center items-center bg-bg py-[40px] gap-[60px] m-auto max-sm:w-[90vw]">
        <h2 class="text-blue text-[36px] max-sm:text-[28px] font-light">Servicios <span
                class="text-green font-secondary">Populares</span></h2>

        <div class="grid grid-cols-6 gap-[20px] max-sm:grid-cols-2">
            {{-- Desarrollo web --}}
            <a href="">
                <div
                    class="flex flex-col justify-center items-start bg-[#00732E] gap-[20px] max-sm:gap-[10px] p-[10px] rounded-[16px] hover:bg-opacity-85 transition-all duration-500 ease-out">
                    <h5 class="h-[60px] text-white font-semibold text-[20px] max-sm:text-[16px] p-[5px]">Desarrollo Web
                    </h5>
                    <img class="rounded-[16px]" src="{{ asset('images/homepage/dev.jpg') }}" alt="">
                </div>
            </a>
            {{-- Desarrollo web end --}}

            {{-- Diseño de logo --}}
            <a href="">
                <div
                    class="flex flex-col justify-center items-start bg-[#F97B4D] gap-[20px] max-sm:gap-[10px] p-[10px] rounded-[16px] hover:bg-opacity-85 transition-all duration-500 ease-out">
                    <h5 class="h-[60px] text-white font-semibold text-[20px] max-sm:text-[16px] p-[5px]">Diseño de logo
                    </h5>
                    <img class="rounded-[16px]" src="{{ asset('images/homepage/diseno_logo.jpg') }}" alt="">
                </div>
            </a>
            {{-- Diseño de logo end --}}

            {{-- Marketing --}}
            <a href="">
                <div
                    class="flex flex-col justify-center items-start bg-[#687200] gap-[20px] max-sm:gap-[10px] p-[10px] rounded-[16px] hover:bg-opacity-85 transition-all duration-500 ease-out">
                    <h5 class="h-[60px] text-white font-semibold text-[20px] max-sm:text-[16px] p-[5px]">Marketing</h5>
                    <img class="rounded-[16px]" src="{{ asset('images/homepage/marketing.jpg') }}" alt="">
                </div>
            </a>
            {{-- Marketing end --}}

            {{-- arquitectura y diseño --}}
            <a href="">
                <div
                    class="flex flex-col justify-center items-start bg-[#4D1727] gap-[20px] max-sm:gap-[10px] p-[10px] rounded-[16px] hover:bg-opacity-85 transition-all duration-500 ease-out">
                    <h5 class="w-[180px] h-[60px]  text-white font-semibold text-[20px] max-sm:text-[16px] p-[5px]">
                        Arquitectura y Diseño Interior</h5>
                    <img class="rounded-[16px]" src="{{ asset('images/homepage/arquitectura.jpg') }}" alt="">
                </div>
            </a>
            {{-- arquitectura y diseño end --}}

            {{-- desarrollo de software --}}
            <a href="">
                <div
                    class="flex flex-col justify-center items-start bg-[#254200] gap-[20px] max-sm:gap-[10px] p-[10px] rounded-[16px] hover:bg-opacity-85 transition-all duration-500 ease-out">
                    <h5 class="w-[180px] h-[60px]  text-white font-semibold text-[20px] max-sm:text-[16px] p-[5px]">
                        Desarrollo de Software</h5>
                    <img class="rounded-[16px]" src="{{ asset('images/homepage/dev.jpg') }}" alt="">
                </div>
            </a>
            {{-- desarrollo de software end --}}

            {{-- video --}}
            <a href="">
                <div
                    class="flex flex-col justify-center items-start bg-[#C66783] gap-[20px] max-sm:gap-[10px] p-[10px] rounded-[16px] hover:bg-opacity-85 transition-all duration-500 ease-out">
                    <h5 class="w-[180px] h-[60px] text-white font-semibold text-[20px] max-sm:text-[16px] p-[5px]">
                        Edición de Video</h5>
                    <img class="rounded-[16px]" src="{{ asset('images/homepage/video.jpg') }}" alt="">
                </div>
            </a>
            {{-- video end --}}
        </div>
    </div>
    {{-- Popular services end --}}

    <div class="flex flex-col justify-center items-center bg-bg py-[40px] gap-[60px] m-auto max-sm:w-[90vw] p-7">
        <h2 class="text-blue text-[36px] max-sm:text-[28px] font-light">Todos los <span
                class="text-green font-secondary">Servicios</span></h2>
        <div class="grid lg:grid-cols-4 gap-[30px] md:grid-cols-2 max-sm:grid-cols-1 justify-center mx-auto w-[90%] ">
            @if ($gigs && count($gigs) > 0)
            @foreach ($gigs as $gig)
            <div class="border relative border-gray-300 rounded-lg p-4 shadow-md">
                @if (auth('buyers')->user()->hasLikedGigs($gig->id))
                <form action="{{ route('unlike.gig', ['username' => $username, 'gigId' => $gig->id]) }}" method="POST">
                    @csrf
                    <button class="absolute top-2 right-2 bg-white text-blue px-3 py-2 rounded shadow-md ">
                        <svg width="26" height="26" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="fill-red-500 hover:fill-red-500 transition-all duration-500 ease-out" d="M3.91337 0.216696C5.01251 0.195629 5.94832 0.58572 6.69974 1.38176C6.9342 1.63027 7.06853 1.62732 7.30594 1.38221C8.35705 0.296889 9.65872 -0.0426845 11.0929 0.330416C12.5509 0.709633 13.5159 1.68124 13.8673 3.15778C14.2718 4.85724 13.7381 6.27148 12.451 7.44538C10.9325 8.83041 9.44442 10.2487 7.9468 11.6566C7.26018 12.302 6.74617 12.3032 6.06114 11.6582C4.48809 10.1771 2.90666 8.70491 1.33769 7.2193C0.12324 6.06942 -0.257563 4.65018 0.167867 3.05856C0.582423 1.50658 1.66027 0.599085 3.21588 0.246372C3.26141 0.236178 3.30672 0.218735 3.35248 0.218056C3.53937 0.214884 3.72648 0.216696 3.91337 0.216696Z" fill="red" />
                        </svg>
                        <input type="hidden" name="gigId" value="{{ $gig->id }}">
                        <input type="hidden" name="usernameId" value="{{ auth('buyers')->user()->id }}">
                    </button>
                </form>
                @else
                <form id="likeGigForm" action="{{ route('like.gig', ['username' => $username, 'gigId' => $gig->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="absolute top-2 right-2 bg-white text-blue px-3 py-2 rounded shadow-md ">
                        <svg width="26" height="26" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="fill-slate-300 hover:fill-red-500 transition-all duration-500 ease-out"
                                d="M3.91337 0.216696C5.01251 0.195629 5.94832 0.58572 6.69974 1.38176C6.9342 1.63027 7.06853 1.62732 7.30594 1.38221C8.35705 0.296889 9.65872 -0.0426845 11.0929 0.330416C12.5509 0.709633 13.5159 1.68124 13.8673 3.15778C14.2718 4.85724 13.7381 6.27148 12.451 7.44538C10.9325 8.83041 9.44442 10.2487 7.9468 11.6566C7.26018 12.302 6.74617 12.3032 6.06114 11.6582C4.48809 10.1771 2.90666 8.70491 1.33769 7.2193C0.12324 6.06942 -0.257563 4.65018 0.167867 3.05856C0.582423 1.50658 1.66027 0.599085 3.21588 0.246372C3.26141 0.236178 3.30672 0.218735 3.35248 0.218056C3.53937 0.214884 3.72648 0.216696 3.91337 0.216696Z"
                                  />
                        </svg>
                        <input type="hidden" name="gigId" value="{{ $gig->id }}">
                        <input type="hidden" name="usernameId" value="{{ auth('buyers')->user()->id }}">
                    </button>
                </form>
                @endif
                <a href="{{ route('sellerGig', ['id' => $gig->id, 'username' => $username]) }}"
                    class="block w-full cursor-pointer">
                    <div class="flex flex-col items-center">
                        <!-- Imagen del gig -->
                        <img class="w-full h-40 object-cover rounded-md cursor-pointer mb-4"
                            src="{{ asset('images/gigs/' . $gig->gig_image) }}" alt="{{ $gig->gig_name }}">

                        <!-- Nombre del gig -->
                        <span
                            class="text-[16px] max-sm:text-[14px] text-center font-light text-black">{{ $gig->gig_name }}</span>

                        <!-- Calificación y cantidad de reseñas -->
                        <div class="flex gap-2 mt-2 items-center">
                            <img class="w-5 h-5" src="{{ asset('images/profile/star.png') }}" alt="Calificación">
                            <span class="text-primary font-semibold text-[15px] max-sm:text-[12px]">
                                @if ($gig->reviews->isNotEmpty())
                                    {{ number_format($gig->reviews->avg('rating'), 1) }} / 5
                                @else
                                    Sin calificaciones
                                @endif
                            </span>
                        </div>

                        <!-- Precio del gig -->
                        <div class="text-primary font-semibold text-[16px] max-sm:text-[12px] mt-2">Desde
                            ₡{{ $gig->gig_price }}</div>
                    </div>
                </a>
            </div>
            @endforeach
            @else
            <div
                class="flex flex-col items-center justify-center place-content-center text-center p-10 bg-blue-50 border border-blue-200 rounded-lg shadow-md mt-10">
                <h2 class="text-2xl font-bold text-blue-600">¡Lo sentimos!</h2>
                <p class="text-lg text-blue-500 mt-2">Actualmente no hay servicios disponibles.</p>
                <p class="text-gray-600 mt-2">Vuelve más tarde o explora otros perfiles.</p>
                <a href="{{ url('/sellers/{username}/dashboardgigs') }}"
                    class="mt-5 inline-block bg-blue-600 text-white py-2 px-4 rounded-full shadow-lg hover:bg-blue-700 transition duration-300 ease-in-out">
                    Explorar más servicios
                </a>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Modal -->
<div id="successModal" class="hidden fixed inset-0 bg-blue bg-opacity-50 backdrop-blur-sm flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-8 max-w-sm w-full shadow-lg text-center">
        <h2 class="text-xl font-semibold">{{ session('success') }}</p>
            <div class="flex justify-center gap-5">
                <button id="closeModal" class="button px-[20px] py-[10px] rounded-[10px] text-blue font-semibold border-solid border-[1px] border-blue hover:translate-y-[-5px] transition-all duration-500 ease-out hover:bg-blue hover:text-white ">
                    Aceptar
                </button>
            </div>
    </div>
</div>

</div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Verificar si hay un mensaje de éxito en la sesión
        @if(session('success'))
        // Mostrar el modal
        const modal = document.getElementById('successModal');
        modal.classList.remove('hidden');

        // Cerrar el modal al hacer clic en el botón
        document.getElementById('closeModal').addEventListener('click', function() {
            modal.classList.add('hidden');
        });

        // Cerrar el modal si se hace clic en el fondo
        modal.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.classList.add('hidden');
            }
        });
        @endif
    });

    document.getElementById('likeGigForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevenir el comportamiento predeterminado
        this.submit(); // Enviar el formulario
        location.reload(); // Recargar la página
    });
</script>