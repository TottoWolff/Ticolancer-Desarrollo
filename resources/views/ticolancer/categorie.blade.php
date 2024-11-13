@extends('ticolancer.layout')
@section ('content')

{{-- Hero --}}
<div style="background-image: url({{$imageCategory}});" class=" bg-cover h-[600px] max-sm:h-[600px] bg-center flex items-center justify-center relative">
    <div class="absolute inset-0 bg-blue opacity-50"></div>
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class=" flex flex-col w-[90vw] gap-[20px] rad z-10 items-center justify-center">
        <h1 class="w-fit text-[72px] max-sm:text-[48px] font-light font-secondary text-white">{{ $nameCategory }}</h1>
    </div>
</div>
{{-- Hero end --}}

{{-- Servicios --}}

    <div class="flex flex-col justify-center items-center bg-bg py-[40px] gap-[60px] m-auto max-sm:w-[90vw] mx-16">
        <h2 class="text-blue text-[36px] max-sm:text-[28px] font-light">Se encontraron <span class="text-green font-secondary">{{ $gigs->count() }}</span> servicios</h2>

        <div class="grid grid-cols-6 gap-[30px] max-sm:grid-cols-2">
            @if ($gigs && count($gigs) > 0)
            @foreach ($gigs as $gig)
            <div class="border relative border-gray-300 rounded-lg p-4 shadow-md">
            @if (Auth::guard('buyers')->check())
            @if (auth('buyers')->user()->hasLikedGigs($gig->id))
                <form action="{{ route('unlike.gig', ['username' => $username, 'gigId' => $gig->id]) }}" method="POST">
                    @csrf
                    <button  class="absolute top-2 right-2 bg-white text-blue px-2 py-2 rounded shadow-md">
                        <svg width="26" height="26" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="fill-red-500 hover:fill-red-500 transition-all duration-500 ease-out" d="M3.91337 0.216696C5.01251 0.195629 5.94832 0.58572 6.69974 1.38176C6.9342 1.63027 7.06853 1.62732 7.30594 1.38221C8.35705 0.296889 9.65872 -0.0426845 11.0929 0.330416C12.5509 0.709633 13.5159 1.68124 13.8673 3.15778C14.2718 4.85724 13.7381 6.27148 12.451 7.44538C10.9325 8.83041 9.44442 10.2487 7.9468 11.6566C7.26018 12.302 6.74617 12.3032 6.06114 11.6582C4.48809 10.1771 2.90666 8.70491 1.33769 7.2193C0.12324 6.06942 -0.257563 4.65018 0.167867 3.05856C0.582423 1.50658 1.66027 0.599085 3.21588 0.246372C3.26141 0.236178 3.30672 0.218735 3.35248 0.218056C3.53937 0.214884 3.72648 0.216696 3.91337 0.216696Z" fill="white" />
                        </svg>
                        <input type="hidden" name="gigId" value="{{ $gig->id }}">
                        <input type="hidden" name="usernameId" value="{{ auth('buyers')->user()->id }}">
                    </button>
                </form>
                @else
                <form id="likeGigForm" action="{{ route('like.gig', ['username' => $username, 'gigId' => $gig->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="absolute top-2 right-2 bg-white text-blue px-2 py-2 rounded shadow-md">
                        <svg width="26" height="26" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="fill-slate-300 hover:fill-red-500 transition-all duration-500 ease-out" d="M3.91337 0.216696C5.01251 0.195629 5.94832 0.58572 6.69974 1.38176C6.9342 1.63027 7.06853 1.62732 7.30594 1.38221C8.35705 0.296889 9.65872 -0.0426845 11.0929 0.330416C12.5509 0.709633 13.5159 1.68124 13.8673 3.15778C14.2718 4.85724 13.7381 6.27148 12.451 7.44538C10.9325 8.83041 9.44442 10.2487 7.9468 11.6566C7.26018 12.302 6.74617 12.3032 6.06114 11.6582C4.48809 10.1771 2.90666 8.70491 1.33769 7.2193C0.12324 6.06942 -0.257563 4.65018 0.167867 3.05856C0.582423 1.50658 1.66027 0.599085 3.21588 0.246372C3.26141 0.236178 3.30672 0.218735 3.35248 0.218056C3.53937 0.214884 3.72648 0.216696 3.91337 0.216696Z" fill="white" />
                        </svg>
                        <input type="hidden" name="gigId" value="{{ $gig->id }}">
                        <input type="hidden" name="usernameId" value="{{ auth('buyers')->user()->id }}">
                    </button>
                </form>
                @endif
                
                <a href="{{ route('sellerGig', ['id' => $gig->id, 'username' => $username]) }}" class="block w-full cursor-pointer service-link" data-authenticated="true">
                    @else
                    <a href="#" class="block w-full cursor-pointer service-link" data-authenticated="false">
                        @endif
                        <div class="flex flex-col items-center">
                            <!-- Imagen del gig -->
                            <img class="w-full h-40 object-cover rounded-md cursor-pointer mb-4" src="{{ asset('images/gigs/' . $gig->gig_image) }}" alt="{{ $gig->gig_name }}">

                            <!-- Nombre del gig -->
                            <span class="text-[16px] max-sm:text-[14px] font-light text-black">{{ $gig->gig_name }}</span>

                            <!-- Calificación y cantidad de reseñas -->
                            <div class="flex gap-2 mt-2 items-center">
                                <img class="w-5 h-5" src="{{ asset('images/profile/star.png') }}" alt="Calificación">
                                <span class="text-primary font-semibold text-[15px] max-sm:text-[12px]">
                                    {{ $gig->reviews->isNotEmpty() ? number_format(optional($gig->reviews->first())->average_rating, 1) : 'Sin calificaciones' }} / 5
                                </span>
                                <span class="text-gray-400 text-[15px] max-sm:text-[10px]">(221)</span>
                            </div>

                            <!-- Precio del gig -->
                            <div class="text-primary font-semibold text-[16px] max-sm:text-[12px] mt-2">Desde ₡{{ $gig->gig_price }}</div>
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
    </div>

{{-- Servicios end --}}

<!-- Modal -->
<div id="authModal" class="hidden fixed inset-0 bg-blue bg-opacity-50 backdrop-blur-sm flex items-center justify-center z-50">
        <div class="bg-white rounded-lg p-8 max-w-sm w-full shadow-lg text-center">
            <h2 class="text-xl font-semibold mb-4 text-gray-800">Acción no permitida</h2>
            <p class="text-gray-600 mb-6">Para ver más detalles del servicio debes estar registrado.</p>
            <div class="flex justify-center gap-5">
                <button id="closeModal" class="button px-[20px] py-[10px] rounded-[10px] text-blue font-semibold border-solid border-[1px] border-blue hover:translate-y-[-5px] transition-all duration-500 ease-out hover:bg-blue hover:text-white ">
                    Cancelar
                </button>
                <a href="{{ route('login') }}" class="button px-[20px] py-[10px] rounded-[10px] text-blue font-semibold border-solid border-[1px] border-blue hover:translate-y-[-5px] transition-all duration-500 ease-out hover:bg-blue hover:text-white ">
                    Iniciar Sesión
                </a>
            </div>
        </div>
    </div>
    

@endsection


<script>
      document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('authModal');
    const closeModal = document.getElementById('closeModal');
    const serviceLinks = document.querySelectorAll('.service-link');
    const modalContent = modal.querySelector('.bg-white'); // Selecciona el contenido del modal

    // Mostrar el modal si el usuario no está autenticado
    serviceLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            if (link.dataset.authenticated === 'false') {
                e.preventDefault();
                modal.classList.remove('hidden');
            }
        });
    });

    // Cerrar el modal al hacer clic en el botón "Cancelar"
    closeModal.addEventListener('click', function () {
        modal.classList.add('hidden');
    });

    // Cerrar el modal al hacer clic fuera del contenido del modal
    modal.addEventListener('click', function (e) {
        if (!modalContent.contains(e.target)) { // Si el clic está fuera del contenido del modal
            modal.classList.add('hidden');
        }
    });
});

    </script>