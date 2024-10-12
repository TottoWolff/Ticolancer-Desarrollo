<header>
    <div id="navbar" class="flex-col h-[100px] gap-[20px] z-[999] flex fixed top-0 w-full left-[50%] -translate-x-1/2 m-auto py-[20px] max-sm:py-[20px] max-sm:px-[20px] items-center justify-between font-main font-semibold text-[18px] text-white transition-all duration-500 ease-out bg-bg">
        <div id="navbar" class=" w-[90vw] flex flex-row justify-between items-center ">
            <!-- Logo -->
            <a href="{{ route ('inicio') }}">
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
                        <img class="w-[40px] h-[40px] rounded-full bg-center object-cover" src="{{ asset('images/buyers_profiles/profile_placeholder.png') }}" alt="">
                    <div class="w-[10px] h-[10px] bg-green border-[1px] border-bg rounded-full absolute right-1 top-8"></div>
                </div>
            </div>
        </div>
    </div>
</header>

