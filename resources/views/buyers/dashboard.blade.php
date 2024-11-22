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

    <div class="flex flex-col justify-center items-center bg-bg py-[30px] gap-[0px] m-auto max-sm:w-[110vw] p-">
        <h2 class="text-blue text-[36px] max-sm:text-[28px] font-light">Todos los <span
                class="text-green font-secondary">Servicios</span></h2>

        <div class="grid grid-cols-4 py-8 gap-[20px] max-sm:grid-cols-1">
    @if ($gigs && count($gigs) > 0)
        @foreach ($gigs as $gig)
            <div class="w-full max-w-[320px] sm:max-w-[00px] lg:max-w-[500px] border border-gray-300 rounded-lg p-4 shadow-md">
                <a href="{{ route('sellerGig', ['id' => $gig->id, 'username' => $username]) }}">
                    <div class="flex flex-col items-center h-72">
                        <!-- Imagen del gig -->
                        <img class="w-full h-40 object-cover rounded-md" src="{{ asset('images/gigs/' . $gig->gig_image) }}" alt="{{ $gig->gig_name }}">
                        
                        <!-- Nombre del gig -->
                        <span class="text-[16px] pt-6 max-sm:text-[15px] text-center font-light text-black">{{ $gig->gig_name }}</span>

                        <!-- Calificación actualizada -->
                        <div class="flex gap-2 mt-2 pt-1 items-center ">
                            <img class="w-3 h-3" src="{{ asset('images/profile/star.png') }}" alt="Calificación">
                            <span class="text-primary text-[15px] max-sm:text-[14px] mt-1">
                                {{ number_format($gig->average_rating, 1) }} / 5
                            </span>
                        </div>

                        <!-- Precio del gig -->
                        <div class="text-primary font-semibold text-[16px] max-sm:text-[13px] pt-2 pb-4 mt-2">
                            Desde ₡{{ $gig->gig_price }}
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    @else
        <div class="flex flex-col items-center justify-center place-content-center text-center p-10 bg-blue-50 border border-blue-200 rounded-lg shadow-md mt-10">
            <h2 class="text-2xl font-bold text-blue-600">¡Lo sentimos!</h2>
            <p class="text-lg text-blue-500 mt-2">Actualmente no hay servicios disponibles.</p>
            <a href="{{ url('/sellers/{username}/dashboardgigs') }}" class="mt-5 inline-block bg-blue-600 text-white py-2 px-4 rounded-full">
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
</script>
