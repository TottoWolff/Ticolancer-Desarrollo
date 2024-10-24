<header>
    <div id="navbar" class="flex-col h-[100px] z-[999] flex fixed top-0 w-full left-[50%] -translate-x-1/2 m-auto py-[20px] max-sm:py-[20px] max-sm:px-[20px] items-center justify-between font-main font-semibold text-[18px] text-white transition-all duration-500 ease-out bg-bg">
        <div id="navbar" class=" w-[90vw] flex flex-row justify-between items-center">
            <!-- Logo -->
            <a href="{{ route ('buyers.dashboard', auth()->guard('buyers')->user()->username) }}">
                <img class="w-[140px]" src="{{ asset('icons/logo.svg') }}" alt="">
            </a>

            <!-- Search -->
            <div class="relative">
                <form action="">
                    <input type="text" placeholder="¿Cuál servicio buscas hoy?" class="w-[600px] placeholder:text-[18px] placeholder:font-light bg-transparent border-blue border-[0.5px] border-opacity-50 rounded-[16px] p-[10px] outline-none text-[18px] text-black font-light">
                    <button class="bg-blue absolute rounded-[8px] p-[8px] right-[10px] top-[50%] translate-y-[-50%]"><img class="w-[18px]" src="{{ asset('icons/search.svg') }}" alt=""></button>
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

        <div id="account" class="w-[400px] h-[100vh] bg-blue absolute top-0 right-0 z-[999] hidden items-start flex-col gap-[40px] p-[40px] transition-all duration-500 ease-out">
            @if (auth()->guard('buyers')->check())
            <div class="w-full items-end justify-center flex flex-col gap-[20px]">
                <button onclick="closeAccount()"><img class="w-[20px] h-[20px]" src="{{ asset('icons/close.svg') }}" alt=""></button>
            </div>
            <div class="flex gap-[20px] items-center">
                <img class="w-[50px] h-[50px] rounded-full" src="{{ asset('images/buyers_profiles/'.auth()->guard('buyers')->user()->picture) }}" alt="">
                <h2 class="text-white font-light text-[24px]">Hola, {{ auth()->guard('buyers')->user()->name }}!</h2>
            </div>

            <div class="flex flex-col w-full items-start justify-center">
                <a class="text-white w-full  py-[10px] border-b-[0.5px] border-t-[0.5px]  border-opacity-50 border-white font-light text-[16px] hover:text-green transition-all duration-500 ease-out" href="{{ route('buyerProfile', auth()->guard('buyers')->user()->username) }}">Perfil</a>
                <a class="text-white w-full  py-[10px] border-b-[0.5px] border-opacity-50 border-white font-light text-[16px] hover:text-green transition-all duration-500 ease-out" href="{{ route('buyerProfileSettingsAccount', auth()->guard('buyers')->user()->username) }}">Configuraciones</a>
                <a class="text-white w-full  py-[10px] border-b-[0.5px] border-opacity-50 border-white font-light text-[16px] hover:text-green transition-all duration-500 ease-out" href="{{ route('buyers.dashboard', auth()->guard('buyers')->user()->username) }}">Dashboard</a>
            </div>

            <div class="flex w-full items-end justify-center">
                <a class="text-white font-medium text-[16px] p-[10px] bg-green rounded-[10px] hover:text-green hover:bg-white w-full text-center hover:translate-y-[-5px] transition-all duration-500 ease-out" href="{{  route('sellerApplication', auth()->guard('buyers')->user()->username) }}">Ser vendedor</a>
            </div>

            <div class="flex h-full w-full items-end justify-center">
                <a class="text-white font-light text-[18px] hover:text-green transition-all duration-500 ease-out"
                    href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Cerrar sesión
                </a>

                <!-- Formulario oculto para el logout -->
                <form id="logout-form" action="{{ route('login.logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>


            @endif
        </div>
    </div>
</header>

<script>
    account = document.getElementById('account');

    function openAccount() {
        account.classList.remove('hidden');
        account.classList.add('flex');
    }

    function closeAccount() {
        account.classList.add('hidden');
        account.classList.remove('flex');
    }
</script>