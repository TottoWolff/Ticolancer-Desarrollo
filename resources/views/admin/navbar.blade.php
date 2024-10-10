<header>
    <div class="z-[999] h-[100px] flex fixed top-0 w-full left-[50%] -translate-x-1/2 m-auto py-[20px] max-sm:py-[20px] px-[120px] max-sm:px-[20px] items-center justify-between font-main font-semibold text-[18px]  transition-all duration-500 ease-out bg-bg">
        <a href="{{ route('admin.dashboard') }}"><img class="w-[140px] max-sm:w-[20px]" src="{{ asset('icons/logo.svg') }}" alt=""></a>
        <ul class="flex flex-row gap-[10px] max-sm:hidden">
            <li class="p-[10px] hover:text-white border-[1px] border-blue rounded-[10px] hover:bg-blue transition-all duration-500 hover:translate-y-[-5px] ease-out"><a href="{{ route('admin.buyers') }}">Compradores</a></li>
            <li class="p-[10px] hover:text-white border-[1px] border-blue rounded-[10px] hover:bg-blue transition-all duration-500 hover:translate-y-[-5px] ease-out"><a href="#">Vendedores</a></li>
            <li class="p-[10px] hover:text-white border-[1px] border-blue rounded-[10px] hover:bg-blue transition-all duration-500 hover:translate-y-[-5px] ease-out"><a href="#">Solicitudes</a></li>
            <li class="p-[10px] hover:text-white border-[1px] border-blue rounded-[10px] hover:bg-blue transition-all duration-500 hover:translate-y-[-5px] ease-out"><a href="{{ route('admin.forms') }}">Formularios</a></li>
            <li class="p-[10px] hover:text-white border-[1px] border-blue rounded-[10px] hover:bg-blue transition-all duration-500 hover:translate-y-[-5px] ease-out"><a href="{{ route('admin.subscriptions') }}">Suscripciones</a></li>
        </ul>
        <a class="p-[10px] hover:text-white rounded-[10px] hover:bg-blue transition-all duration-500 hover:translate-y-[-5px] ease-out" href="{{ route('admin.logout') }}">Cerrar sesión</a>
    </div>
</header>