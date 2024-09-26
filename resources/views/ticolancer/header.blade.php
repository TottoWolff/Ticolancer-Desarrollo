<header>
        <div id="navbar" class="flex-col gap-[20px] z-[999] flex fixed top-0 w-full left-[50%] -translate-x-1/2 m-auto py-[20px] max-sm:py-[20px] px-[120px] max-sm:px-[20px] items-center justify-between font-main font-semibold text-[18px] text-white transition-all duration-500 ease-out">

            {{-- Desktop navbar --}}
            <div id="navbar" class=" w-full flex flex-row justify-between items-center bg-transparent">
                    <a href="{{ route ('inicio') }}">
                        <img class="w-[40px] max-sm:w-[20px]" src="{{ asset('icons/icon.svg') }}" alt="">
                    </a>

                    <button class="lg:hidden" onclick="openMenu()">
                        <img src="{{ asset('icons/bars.svg') }}" alt="">
                    </button>


                    <ul class="flex flex-row gap-[10px] max-sm:hidden">
                        <li class="p-[10px] hover:text-blue rounded-[10px] hover:bg-white transition-all duration-500 hover:translate-y-[-5px] ease-out"><a href="{{ route('inicio') }}">Inicio</a></li>
                        <li class="p-[10px] hover:text-blue rounded-[10px] hover:bg-white transition-all duration-500 hover:translate-y-[-5px] ease-out"><a href="#">Servicios</a></li>
                        <li class="p-[10px] hover:text-blue rounded-[10px] hover:bg-white transition-all duration-500 hover:translate-y-[-5px] ease-out"><a href="{{ route('nosotros') }}">Nosotros</a></li>
                        <li class="p-[10px] hover:text-blue rounded-[10px] hover:bg-white transition-all duration-500 hover:translate-y-[-5px] ease-out"><a href="#">Contacto</a></li>
                        <li class="p-[10px] hover:text-blue rounded-[10px] hover:bg-white transition-all duration-500 hover:translate-y-[-5px] ease-out"><a href="{{ route('login') }}">Iniciar sesión</a></li>
                        <li class="py-[10px] px-[20px] border-[1px] border-white hover:text-blue rounded-[10px] hover:bg-white transition-all duration-500 hover:translate-y-[-5px] ease-out"><a href="{{ route('signup') }}">Unirse</a></li>
                    </ul>
                    
                    {{-- Mobile Menu --}}
                    <div id="menu" class=" hidden absolute justify-center items-center text-center top-0 right-0 h-screen w-[80vw] bg-blue">
                        <button class="absolute top-10 right-10" onclick="closeMenu()">
                            <img class="w-[20px]" src="{{ asset('icons/close.svg') }}" alt="">
                        </button>

                        <ul class="flex flex-col gap-[20px]">
                            <li class="text-white hover:text-green transition-all duration-500 translate-y-[-5px] ease-out"><a href="{{ route('inicio') }}">Inicio</a></li>
                            <li class="text-white hover:text-green transition-all duration-500 translate-y-[-5px] ease-out"><a href="#">Servicios</a></li>
                            <li class="text-white hover:text-green transition-all duration-500 translate-y-[-5px] ease-out"><a href="#">Nosotros</a></li>
                            <li class="text-white hover:text-green transition-all duration-500 translate-y-[-5px] ease-out"><a href="#">Contacto</a></li>
                            <li class="text-white hover:text-green transition-all duration-500 translate-y-[-5px] ease-out"><a href="{{ route('login') }}">Iniciar sesión</a></li>
                            <li class="text-green hover:text-white hover:bg-green p-[10px] border-[1px] border-solid border-green rounded-[10px] transition-all duration-500 translate-y-[-5px] ease-out"><a href="{{ route('signup') }}">Únete</a></li>
                        </ul>
                    </div>
                    {{-- Mobile Menu end --}}
                    
            </div>
            {{-- Desktop navbar end --}}
            
            {{-- Services bar --}}
            <ul id="services-bar" class="font-light text-[14px] flex-row justify-between items-center w-full hidden max-sm:hidden transition-all duration-500 ease-out border-green border-opacity-20 border-t-[0.5px] border-b-[0.5px] py-[10px]">
                <li class="hover:text-green transition-all duration-500 ease-out"><a href="">Programación y tecnología</a></li>
                <li class="hover:text-green transition-all duration-500 ease-out"><a href="">Diseño gráfico</a></li>
                <li class="hover:text-green transition-all duration-500 ease-out"><a href="">Marketing Digital</a></li>
                <li class="hover:text-green transition-all duration-500 ease-out"><a href="">Traducción y escritura</a></li>
                <li class="hover:text-green transition-all duration-500 ease-out"><a href="">Servicios de IA</a></li>
                <li class="hover:text-green transition-all duration-500 ease-out"><a href="">Video y animación</a></li>
                <li class="hover:text-green transition-all duration-500 ease-out"><a href="">Música y audio</a></li>
            </ul>
            {{-- Services bar end --}}

    </header>

    <script>
        menu = document.getElementById('menu');
        navbar =  document.getElementById('navbar');
        servicesBar = document.getElementById('services-bar');

        function openMenu() {
            menu.classList.remove('hidden');
            menu.classList.add('flex');
        }

        function closeMenu() {
            menu.classList.add('hidden');
        }

        window.onscroll = function() {
            if (window.scrollY > 50) {
                navbar.classList.add('bg-blue');
                servicesBar.classList.remove('hidden');
                servicesBar.classList.add('flex');
            } else {
                navbar.classList.remove('bg-blue');
                servicesBar.classList.add('hidden');
            }
        }
    </script>