<header>
    <div id="navbar" class="flex-col h-[100px] z-[999] flex fixed top-0 w-full left-[50%] -translate-x-1/2 m-auto py-[20px] max-sm:py-[20px] max-sm:px-[20px] items-center justify-between font-main font-semibold text-[18px] text-white transition-all duration-500 ease-out bg-bg">
        <div id="navbar-wrapper" class=" w-[90vw] flex flex-row justify-between items-center">
            <!-- Logo -->
            <a href="{{ route ('inicio') }}">
                <img class="w-[140px]" src="{{ asset('icons/logo.svg') }}" alt="">
                <!-- <h1 class="text-[36px] font-light font-main">{ { $user->name }}</h1> -->
            </a>

            <!-- Search -->
            <div class="relative">
                <form action="">
                    <div class="relative">
                        <input type="text" placeholder="¿Cuál servicio buscas hoy?" class="w-[600px] placeholder:text-[18px] placeholder:font-light bg-transparent border-blue border-[0.5px] border-opacity-50 rounded-[16px] p-[10px] outline-none text-[18px] text-black font-light">
                        <button class="bg-blue absolute rounded-[8px] p-[8px] right-[10px] top-[50%] translate-y-[-50%] items-center"><img class="w-[18px]" src="{{ asset('icons/search.svg') }}" alt=""></button>
                    </div>
                </form>
            </div>

            <!-- Account -->
            <div class="flex items-center gap-[20px]">
                <img src="{{ asset('icons/like.svg') }}" alt="">
                <div class="relative">
                    @if (auth()->guard('buyers')->check())
                    <button onclick="openAccount()">
                        <img class="w-[40px] h-[40px] rounded-full bg-center object-cover" src="{{ asset('images/buyers_profiles/'.auth()->guard('buyers')->user()->picture) }}" alt="">
                    </button>
                    @endif
                    <div class="w-[10px] h-[10px] bg-green border-[1px] border-bg rounded-full absolute right-1 top-8"></div>
                </div>
            </div>
        </div>

        <div id="account" class="w-[400px] h-[100vh] bg-blue absolute top-0 right-0 z-[9999] hidden items-start flex-col gap-[40px] p-[40px] transition-all duration-500 ease-out">
            @if (auth()->guard('buyers')->check())
            <div class="w-full items-end justify-center flex flex-col gap-[20px]">
                <button onclick="closeAccount()"><img class="w-[20px] h-[20px]" src="{{ asset('icons/close.svg') }}" alt=""></button>
            </div>
            <div class="flex gap-[20px] items-center">
                <img class="w-[50px] h-[50px] rounded-full" src="{{ asset('images/buyers_profiles/'.auth()->guard('buyers')->user()->picture) }}" alt="">
                <h2 class="text-white font-light text-[24px]">Hola, {{ auth()->guard('buyers')->user()->name }}!</h2>
            </div>

            <div class="flex flex-col w-full items-start justify-center">
                @if(auth('buyers')->check() && \App\Models\SellersUsersTicolancer::where('buyers_users_ticolancers_id', auth('buyers')->user()->id)->exists())
                <!-- Profile para sellers -->
                <a class="text-white w-full  py-[10px] border-b-[0.5px] border-t-[0.5px]  border-opacity-50 border-white font-light text-[16px] hover:text-green transition-all duration-500 ease-out" href="{{ route('sellerProfile', auth()->guard('buyers')->user()->username) }}">Perfil</a>

                @else
                <!-- Profile para buyers -->
                <a class="text-white w-full  py-[10px] border-b-[0.5px] border-t-[0.5px]  border-opacity-50 border-white font-light text-[16px] hover:text-green transition-all duration-500 ease-out" href="{{ route('buyerProfile', auth()->guard('buyers')->user()->username) }}">Perfil</a>
                @endif
                <a class="text-white w-full  py-[10px] border-b-[0.5px] border-opacity-50 border-white font-light text-[16px] hover:text-green transition-all duration-500 ease-out" href="{{ route('buyerProfileSettingsAccount', auth()->guard('buyers')->user()->username) }}">Configuraciones</a>
                <a class="text-white w-full  py-[10px] border-b-[0.5px] border-opacity-50 border-white font-light text-[16px] hover:text-green transition-all duration-500 ease-out" href="{{ route('buyers.dashboard', auth()->guard('buyers')->user()->username) }}">Dashboard</a>
                <a class="text-white w-full  py-[10px] border-b-[0.5px] border-opacity-50 border-white font-light text-[16px] hover:text-green transition-all duration-500 ease-out" href="{{ route('inicio')}}">Inicio</a>

            </div>

            <div class="flex h-full w-full items-end justify-center">
                <!-- Formulario de logout -->
                <form id="logout-form" action="{{ route('login.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                <!-- Botón de logout -->
                <a class="text-white font-light text-[18px] hover:text-green transition-all duration-500 ease-out" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Cerrar sesión
                </a>
            </div>


            @endif
        </div>

        {{-- Services bar --}}
        <div class="bg-white w-full flex flex-row items-center justify-center">

            <ul id="services-bar" class="font-light text-blue text-[14px] flex-row justify-between items-center w-[90%] hidden max-sm:hidden transition-all duration-500 ease-out border-green border-opacity-20 border-b-[0.5px] py-[10px]">
                <li class="hover:text-green transition-all duration-500 ease-out"><a href="{{ route('categorie', '1') }}">Programación y tecnología</a></li>
                <li class="hover:text-green transition-all duration-500 ease-out"><a href="{{ route('categorie', '2') }}">Marketing Digital</a></li>
                <li class="hover:text-green transition-all duration-500 ease-out"><a href="{{ route('categorie', '3') }}">Video y Animación</a></li>
                <li class="hover:text-green transition-all duration-500 ease-out"><a href="{{ route('categorie', '4') }}">Arquitectura</a></li>
                <li class="hover:text-green transition-all duration-500 ease-out"><a href="{{ route('categorie', '5') }}">Diseño Gráfico</a></li>
                <li class="hover:text-green transition-all duration-500 ease-out"><a href="{{ route('categorie', '6') }}">Música y Audio</a></li>
                <li class="hover:text-green transition-all duration-500 ease-out"><a href="{{ route('categorie', '7') }}">Servicios de IA</a></li>
                <li class="hover:text-green transition-all duration-500 ease-out"><a href="{{ route('categorie', '8') }}">Traducción y Escritura</a></li>
                <li class="hover:text-green transition-all duration-500 ease-out"><a href="{{ route('categorie', '9') }}">Fotografía</a></li>
            </ul>
        </div>
        {{-- Services bar end --}}

    </div>
</header>

<script>
    account = document.getElementById('account');
    servicesBar = document.getElementById('services-bar');

    function openAccount() {
        account.classList.remove('hidden');
        account.classList.add('flex');
    }

    function closeAccount() {
        account.classList.add('hidden');
        account.classList.remove('flex');
    }

    window.onscroll = function() {
        if (window.scrollY > 50) {
            navbar.classList.add('bg-white');
            servicesBar.classList.remove('hidden');
            servicesBar.classList.add('flex');
        } else {
            navbar.classList.remove('bg-blue');
            servicesBar.classList.add('hidden');
        }
    }
</script>