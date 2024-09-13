<!DOCTYPE html>
<html lang {{ str_replace('_', '-', app()->getLocale()) }}>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="https://i.postimg.cc/7YKTFXk6/icon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <title>Ticolancer</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-bg font-main">
    <header>
        <div id="navbar" class="flex-col gap-[20px] z-[999] flex fixed top-0 w-full left-[50%] -translate-x-1/2 m-auto py-[20px] max-sm:py-[10px] px-[120px] max-sm:px-[20px] items-center justify-between font-main font-semibold text-[18px] text-white transition-all duration-500 ease-out">

            {{-- Desktop navbar --}}
            <div id="navbar" class=" w-full flex flex-row justify-between items-center bg-transparent>
                    <a href="{{ route('inicio') }}">
                    <svg class="max-sm:w-[20px]" width="30" height="79" viewBox="0 0 30 79" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M30 11.1222V0L4.19744 10.1989L3.51562 21.2784L30 11.1222Z" fill="white"/>
                    <path d="M30 25.2841L2.58523 36.3281L1.78978 49.1974L30 37.3935V25.2841Z" fill="white"/>
                    <path d="M0.852273 64.2472L0 78.0611L30 65.9943V51.5625L0.852273 64.2472Z" fill="white"/>
                    </svg>
                    </a>

                    <button class="lg:hidden" onclick="openMenu()">
                        <svg width="28" height="25" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_86_303)">
                        <path d="M0.00927734 7.10878H19.9284V9.0752H0.00927734V7.10878Z" fill="white"/>
                        <path d="M19.9832 16.2162H0.00927734V14.2137C0.210151 14.2137 0.420156 14.2137 0.628856 14.2137C6.84551 14.2137 13.0622 14.2227 19.2788 14.1995C19.8736 14.1969 20.0471 14.3813 19.9897 14.9332C19.9493 15.3329 19.9819 15.7391 19.9819 16.2162H19.9832Z" fill="white"/>
                        <path d="M0 0H0.770886C6.87276 0 12.9746 0 19.0765 0C19.68 0 19.9822 0.287549 19.983 0.862647C19.9839 1.66641 19.5861 2.06829 18.7895 2.06829C12.8181 2.06829 6.84667 2.06829 0.873932 2.06829H0V0Z" fill="white"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_86_303">
                        <rect width="20" height="16.2162" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>
                    </button>


                    <ul class="flex flex-row gap-[10px] max-sm:hidden">
                        <li class="p-[10px] hover:text-blue rounded-[10px] hover:bg-white transition-all duration-500 hover:translate-y-[-5px] ease-out"><a href="#">Inicio</a></li>
                        <li class="p-[10px] hover:text-blue rounded-[10px] hover:bg-white transition-all duration-500 hover:translate-y-[-5px] ease-out"><a href="#">Servicios</a></li>
                        <li class="p-[10px] hover:text-blue rounded-[10px] hover:bg-white transition-all duration-500 hover:translate-y-[-5px] ease-out"><a href="#">Nosotros</a></li>
                        <li class="p-[10px] hover:text-blue rounded-[10px] hover:bg-white transition-all duration-500 hover:translate-y-[-5px] ease-out"><a href="#">Contacto</a></li>
                    </ul>
                    
                    {{-- Mobile Menu --}}
                    <div id="menu" class=" hidden absolute justify-center items-center text-center top-0 right-0 h-screen w-[80vw] bg-bg">
                        <button onclick="closeMenu()">
                            <svg class="absolute top-10 left-10" width="24" height="24" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_86_301)">
                            <path d="M8.07272 10.0385C5.28881 7.27859 2.63115 4.64491 0 2.03649C0.727227 1.33452 1.35219 0.731018 2.03523 0.0707063C2.09078 0.121208 2.27763 0.277764 2.44934 0.448208C4.78884 2.78266 7.13465 5.11079 9.45395 7.46544C9.8466 7.86441 10.0675 7.86188 10.4589 7.46544C12.7643 5.12721 15.0963 2.81422 17.4206 0.493659C17.5986 0.316903 17.7842 0.147722 17.9433 -0.00125885C18.6024 0.650215 19.2387 1.27896 20.0025 2.03397C17.3562 4.65754 14.6885 7.30257 11.9778 9.98927C14.6468 12.6381 17.288 15.2604 19.899 17.8524C19.2336 18.5089 18.615 19.1187 17.9559 19.7677C15.3778 17.1833 12.7265 14.5231 10.0297 11.82C9.77464 12.0561 9.60545 12.2025 9.4489 12.3603C7.08036 14.7251 4.70677 17.0835 2.35339 19.4634C2.00871 19.8119 1.77893 19.875 1.44814 19.476C1.18174 19.1528 0.856007 18.8789 0.558046 18.5809C0.164131 18.187 0.15866 17.7985 0.541632 17.4156C2.86472 15.095 5.18654 12.7732 7.51341 10.4564C7.66113 10.3087 7.85178 10.2026 8.07272 10.0398V10.0385Z" fill="#EC6E00"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_86_301">
                            <rect width="20" height="19.7677" fill="#EC6E00"/>
                            </clipPath>
                            </defs>
                            </svg>
                        </button>

                        <ul class="flex flex-col gap-[20px]">
                            <li class="p-[10px] text-primary hover:bg-primary hover:text-white transition-all duration-500 translate-y-[-5px] ease-out"><a href="#">Inicio</a></li>
                            <li class="p-[10px] text-primary hover:bg-primary hover:text-white transition-all duration-500 translate-y-[-5px] ease-out"><a href="#">Servicios</a></li>
                            <li class="p-[10px] text-primary hover:bg-primary hover:text-white transition-all duration-500 translate-y-[-5px] ease-out"><a href="#">Nosotros</a></li>
                            <li class="p-[10px] text-primary hover:bg-primary hover:text-white transition-all duration-500 translate-y-[-5px] ease-out"><a href="#">Contacto</a></li>
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
    @yield('content')
        <footer>
            <div class="flex flex-col py-[40px] w-[90vw] gap-[40px] m-auto">
                <div class="flex justify-start">
                    <svg width="160" height="62" viewBox="0 0 160 62" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_82_79)">
                        <path d="M46.566 33.4827C39.8069 33.4827 34.8974 28.7848 34.8974 21.4796C34.8974 14.1745 39.6839 9.47656 46.566 9.47656C53.4481 9.47656 58.023 14.0515 58.023 20.9779C58.023 21.7354 57.9837 22.4881 57.8558 23.2457H40.8596C41.1548 26.6892 43.5062 28.6175 46.443 28.6175C48.9617 28.6175 50.344 27.3582 51.1016 25.8037H57.4376C56.1783 30.0835 52.3166 33.4827 46.566 33.4827ZM40.899 19.3004H51.9379C51.8542 16.2357 49.4192 14.3073 46.3987 14.3073C43.5849 14.3073 41.3614 16.1127 40.899 19.3004Z" fill="black"/>
                        <path d="M61.2501 2.04834H67.1237V33.1038H61.2501V2.04834Z" fill="black"/>
                        <path d="M81.4389 14.6812H78.7972V9.85534H81.4389V8.67963C81.4389 2.97325 84.6708 0.326672 91.2135 0.498848V5.45257C88.3603 5.36894 87.3961 6.29377 87.3961 8.89607V9.86025H91.4693V14.6861H87.3961V33.1088H81.4389V14.6812Z" fill="black"/>
                        <path d="M103.344 9.47656C107.078 9.47656 109.641 11.2377 111.023 13.1709V9.85535H116.941V33.1039H111.023V29.7047C109.636 31.7167 106.995 33.4827 103.3 33.4827C97.4266 33.4827 92.7237 28.6569 92.7237 21.396C92.7237 14.1351 97.4216 9.47656 103.34 9.47656H103.344ZM104.855 14.6369C101.706 14.6369 98.7253 16.9883 98.7253 21.396C98.7253 25.8037 101.706 28.3224 104.855 28.3224C108.003 28.3224 111.023 25.8873 111.023 21.4796C111.023 17.0719 108.087 14.6369 104.855 14.6369Z" fill="black"/>
                        <path d="M127.518 33.1038H121.644V9.85526H127.518V13.466C128.989 11.0752 131.419 9.52075 134.651 9.52075V15.6895H133.096C129.613 15.6895 127.513 17.0325 127.513 21.5238V33.1087L127.518 33.1038Z" fill="black"/>
                        <path d="M147.869 33.4827C141.154 33.4827 136.077 28.7848 136.077 21.4796C136.077 14.1745 141.321 9.47656 148.036 9.47656C154.751 9.47656 159.995 14.1351 159.995 21.4796C159.995 28.8241 154.623 33.4827 147.864 33.4827H147.869ZM147.869 28.3617C150.973 28.3617 153.954 26.0939 153.954 21.4796C153.954 16.8653 151.057 14.5975 147.953 14.5975C144.849 14.5975 142.035 16.8211 142.035 21.4796C142.035 26.1382 144.721 28.3617 147.869 28.3617Z" fill="black"/>
                        <path d="M37.1701 54.7439C34.2874 54.7439 32.2656 53.3025 32.0541 50.9757H33.7266C33.8644 52.3728 35.0745 53.3714 37.1455 53.3714C38.9608 53.3714 39.984 52.3925 39.984 51.1872C39.984 48.0487 32.3591 49.8836 32.3591 45.1168C32.3591 43.2328 34.1497 41.6733 36.8258 41.6733C39.5019 41.6733 41.3368 43.1147 41.4745 45.5547H39.8462C39.7528 44.1379 38.705 43.0655 36.7766 43.0655C35.0794 43.0655 34.007 43.9706 34.007 45.0873C34.007 48.5308 41.5188 46.691 41.5877 51.1774C41.5877 53.2238 39.797 54.734 37.1701 54.734V54.7439Z" fill="black"/>
                        <path d="M49.7734 43.2328H48.0073V41.8603H49.7734V38.6726H51.4262V41.8603H54.914V43.2328H51.4262V51.1184C51.4262 52.6778 51.9624 53.1648 53.4284 53.1648H54.9189V54.5619H53.1726C50.9638 54.5619 49.7783 53.6568 49.7783 51.1184V43.2328H49.7734Z" fill="black"/>
                        <path d="M67.5615 41.6782C70.1196 41.6782 71.8659 43.0507 72.5841 44.6544V41.8652H74.2124V54.5618H72.5841V51.748C71.8413 53.3763 70.0704 54.7488 67.5369 54.7488C64.0737 54.7488 61.4911 52.1661 61.4911 48.1914C61.4911 44.2166 64.0737 41.6782 67.5615 41.6782ZM67.8616 43.095C65.1855 43.095 63.1391 44.9545 63.1391 48.1864C63.1391 51.4184 65.1855 53.3271 67.8616 53.3271C70.5377 53.3271 72.5841 51.3741 72.5841 48.211C72.5841 45.0479 70.4688 43.095 67.8616 43.095Z" fill="black"/>
                        <path d="M84.2133 54.5619H82.5851V41.8652H84.2133V44.1232C84.9119 42.5638 86.3778 41.634 88.562 41.634V43.3312H88.1193C86.004 43.3312 84.2133 44.2855 84.2133 47.4683V54.5619Z" fill="black"/>
                        <path d="M96.118 43.2328H94.352V41.8603H96.118V38.6726H97.7709V41.8603H101.259V43.2328H97.7709V51.1184C97.7709 52.6778 98.3071 53.1648 99.7731 53.1648H101.264V54.5619H99.5173C97.3085 54.5619 96.1229 53.6568 96.1229 51.1184V43.2328H96.118Z" fill="black"/>
                        <path d="M119.583 54.562H117.955V52.3286C117.187 53.9323 115.515 54.7686 113.631 54.7686C110.748 54.7686 108.47 53.0025 108.47 49.2786V41.8604H110.074V49.0917C110.074 51.9055 111.609 53.3469 113.936 53.3469C116.263 53.3469 117.96 51.8563 117.96 48.767V41.8604H119.588V54.557L119.583 54.562Z" fill="black"/>
                        <path d="M134.602 41.6782C138.065 41.6782 140.647 44.2117 140.647 48.1914C140.647 52.1711 138.065 54.7488 134.602 54.7488C132.068 54.7488 130.297 53.3517 129.554 51.7726V60.5634H127.951V41.8652H129.554V44.6544C130.297 43.0507 132.063 41.6782 134.602 41.6782ZM134.277 43.095C131.694 43.095 129.554 45.0479 129.554 48.211C129.554 51.3741 131.694 53.3271 134.277 53.3271C136.86 53.3271 139 51.3987 139 48.1864C139 44.9741 136.953 43.095 134.277 43.095Z" fill="black"/>
                        <path d="M152.67 54.7439C149.788 54.7439 147.766 53.3025 147.554 50.9757H149.227C149.364 52.3728 150.575 53.3714 152.646 53.3714C154.461 53.3714 155.484 52.3925 155.484 51.1872C155.484 48.0487 147.859 49.8836 147.859 45.1168C147.859 43.2328 149.65 41.6733 152.326 41.6733C155.002 41.6733 156.837 43.1147 156.975 45.5547H155.346C155.253 44.1379 154.205 43.0655 152.277 43.0655C150.58 43.0655 149.512 43.9706 149.512 45.0873C149.512 48.5308 157.024 46.691 157.093 51.1774C157.093 53.2238 155.302 54.734 152.675 54.734L152.67 54.7439Z" fill="black"/>
                        <path d="M20.7791 15.239V7.5354L2.9073 14.5995L2.43504 22.2736L20.7791 15.239Z" fill="#EC6E00"/>
                        <path d="M20.7791 25.0481L1.79062 32.6976L1.23965 41.6113L20.7791 33.4355V25.0481Z" fill="#EC6E00"/>
                        <path d="M0.590315 52.0354L0 61.6034L20.7791 53.2455V43.2495L0.590315 52.0354Z" fill="#EC6E00"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_82_79">
                        <rect width="160" height="61.1123" fill="white" transform="translate(0 0.490967)"/>
                        </clipPath>
                        </defs>
                    </svg>
                </div>

                <div class="grid grid-cols-2 max-sm:grid-cols-1 max-sm:gap-[20px]">
                    <div class="flex justify-start flex-col gap-[20px]">
                        <p class="text-black font-light text-[16px]">En Ticolancer damos oportunidades a todos aquellos <br> freelacers ticos que desde su hogar u oficina quieren <br> vender su talento!</p>
                        <a class="w-fit px-[20px] py-[10px] rounded-[10px] text-blue font-semibold border-solid border-[1px] border-blue hover:translate-y-[-5px] transition-all duration-500 ease-out hover:bg-blue hover:text-white " href="#">Registrarse</a>
                    </div>
                    
                    <div class="grid grid-cols-3 max-sm:grid-cols-1 max-sm:gap-[20px]">
                        <div class="flex justify-start items-start flex-col gap-[20px]">
                            <h2 class="text-primary font-semibold text-[18px]">ENLACES</h2>
                            <div class="flex flex-col">
                                <a class="text-[16px] font-light text-black" href="#">Inicio</a>
                                <a class="text-[16px] font-light text-black" href="#">Servicios</a>
                                <a class="text-[16px] font-light text-black" href="#">Nosotros</a>
                                <a class="text-[16px] font-light text-black" href="#">Contacto</a>
                            </div>
                        </div>

                        <div class="flex justify-start items-start flex-col gap-[20px]">
                            <h2 class="text-primary font-semibold text-[18px]">CATEGORIAS</h2>
                            <div class="flex flex-col">
                                <a class="text-[16px] font-light text-black" href="">Diseño gráfico</a>
                                <a class="text-[16px] font-light text-black" href="">Desarrollo web</a>
                                <a class="text-[16px] font-light text-black" href="">Arquitectura</a>
                                <a class="text-[16px] font-light text-black" href="">Edición de video</a>
                            </div>
                        </div>

                        <div class="flex justify-start items-start flex-col gap-[20px]">
                            <h2 class="text-primary font-semibold text-[18px]">CONTACTO</h2>
                            <div class="flex flex-col">
                                <a class="text-[16px] font-light text-black" href="">Paseo de los turistas, Puntarenas</a>
                                <a class="text-[16px] font-light text-black" href="tel:+50622334455">+506 2233 - 4455</a>
                                <a class="text-[16px] font-light text-black" href="mailto:info@elfarostartups.com">info@elfarostartups.com</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="h-[1px] bg-green opacity-50"></div>

                <div class="flex justify-center gap-[10px]">
                    <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect y="0.603271" width="40" height="40" rx="20" fill="#00C48E"/>
                        <g clip-path="url(#clip0_82_129)">
                        <path d="M28.9759 20.5825C28.9759 22.0851 29.0233 23.5885 28.9655 25.0884C28.8689 27.6001 26.906 29.7141 24.5177 29.8882C21.4625 30.1101 18.4038 30.1119 15.3486 29.8738C13.4426 29.725 11.6566 28.0538 11.2615 25.9749C11.0751 24.9964 11.038 23.9781 11.0207 22.9761C10.9888 21.1273 10.9931 19.2766 11.0389 17.4286C11.0725 16.064 11.1346 14.6932 11.9414 13.5072C12.9155 12.0741 14.2477 11.2804 15.9025 11.2236C18.2856 11.1415 20.6722 11.1524 23.057 11.1551C24.2511 11.1569 25.4366 11.2443 26.5048 11.9253C28 12.8786 28.8594 14.2639 28.9586 16.0776C29.0406 17.5747 28.975 19.08 28.9759 20.5825ZM12.6238 20.5798C12.6238 21.9029 12.5885 23.2278 12.6351 24.549C12.6696 25.5339 12.8818 26.4719 13.5816 27.2339C14.3771 28.1007 15.3909 28.3081 16.4521 28.3424C18.1182 28.3974 19.786 28.4244 21.453 28.4046C22.5272 28.392 23.6083 28.3388 24.6722 28.1918C26.1596 27.9852 27.2451 26.8407 27.3331 25.275C27.4616 22.9815 27.4789 20.6808 27.5022 18.3828C27.5108 17.5296 27.4323 16.6719 27.3391 15.8223C27.2218 14.7572 26.6842 13.95 25.8162 13.3809C25.1424 12.939 24.3771 12.8488 23.6204 12.8353C21.3788 12.7929 19.1355 12.7613 16.8948 12.8118C16.0915 12.8299 15.239 12.9561 14.5048 13.2745C13.1372 13.8661 12.6816 15.1631 12.6359 16.6124C12.5945 17.9337 12.6273 19.2576 12.6264 20.5807L12.6238 20.5798Z" fill="#FFF8F3"/>
                        <path d="M24.6368 20.5996C24.6342 23.2421 22.5358 25.4445 20.0319 25.4319C17.5048 25.4184 15.4038 23.2178 15.4176 20.5987C15.4314 17.9057 17.5073 15.7393 20.0578 15.7564C22.6057 15.7745 24.6394 17.9255 24.6368 20.5996ZM20.0095 23.786C21.7213 23.7959 23.0854 22.3853 23.0897 20.5996C23.0941 18.813 21.742 17.3925 20.0319 17.3871C18.3589 17.3826 16.9715 18.813 16.9629 20.5518C16.9543 22.3294 18.3167 23.7751 20.0095 23.7851V23.786Z" fill="#FFF8F3"/>
                        <path d="M25.9232 15.4959C25.9258 16.1092 25.4866 16.5917 24.9085 16.6098C24.3046 16.6287 23.8154 16.1173 23.8188 15.4716C23.8223 14.9079 24.2856 14.4552 24.8688 14.4452C25.4789 14.4353 25.9206 14.8754 25.9232 15.4959Z" fill="#FFF8F3"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_82_129">
                        <rect width="18" height="18.9" fill="white" transform="translate(11 11.1533)"/>
                        </clipPath>
                        </defs>
                    </svg>

                    <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect y="0.603271" width="40" height="40" rx="20" fill="#00C48E"/>
                        <g clip-path="url(#clip0_82_134)">
                        <path d="M21.1325 29.5542V23.4391C21.3278 23.4391 21.5119 23.4391 21.6965 23.4391C22.2328 23.4391 22.7691 23.4379 23.3055 23.4391C23.4477 23.4391 23.5567 23.4233 23.59 23.2443C23.7289 22.4963 23.8824 21.7511 24.0247 21.0036C24.0907 20.6547 24.0574 20.6192 23.6865 20.6186C22.842 20.6163 21.9968 20.618 21.119 20.618C21.1432 19.9417 21.049 19.275 21.2748 18.6286C21.4825 18.0341 21.9556 17.793 22.5309 17.74C23.0153 17.6948 23.5053 17.7016 23.9931 17.7005C24.1737 17.7005 24.2511 17.6378 24.2505 17.4577C24.2477 16.7706 24.2562 16.0836 24.2398 15.3965C24.2375 15.309 24.1263 15.1623 24.0456 15.147C22.7595 14.9065 21.4718 14.8032 20.2016 15.234C18.994 15.6432 18.2934 16.5076 17.9739 17.7213C17.752 18.5642 17.8107 19.4212 17.8113 20.2748C17.8113 20.53 17.7723 20.6496 17.472 20.6265C17.0514 20.5938 16.6257 20.622 16.2023 20.6175C15.9997 20.6152 15.8952 20.6717 15.8992 20.9076C15.9122 21.6602 15.9099 22.4133 15.9003 23.1664C15.8975 23.3781 15.972 23.447 16.1786 23.4419C16.6393 23.4312 17.1011 23.4464 17.5618 23.4346C17.7514 23.4295 17.8085 23.5017 17.8079 23.6796C17.8045 25.5149 17.8062 27.3503 17.8045 29.1856C17.8045 29.2477 17.7814 29.3104 17.7689 29.373C14.1242 28.533 10.6681 24.9814 11.0254 19.9829C11.3749 15.0996 15.4278 11.5243 20.2264 11.6559C25.3525 11.7964 29.1383 15.9746 28.9961 20.915C28.8533 25.874 24.963 29.1585 21.1325 29.5537V29.5542Z" fill="#FFF8F3"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_82_134">
                        <rect width="18" height="17.9018" fill="white" transform="translate(11 11.6523)"/>
                        </clipPath>
                        </defs>
                    </svg>

                    <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect y="0.603271" width="40" height="40" rx="20" fill="#00C48E"/>
                        <g clip-path="url(#clip0_82_137)">
                        <path d="M18.375 21.3167C17.8135 21.3595 17.2779 21.3256 16.7827 21.4508C15.1919 21.8524 14.2539 23.3224 14.5125 24.9154C14.8419 26.9432 17.2462 28.0506 19.0249 26.9881C20.0358 26.3846 20.5464 25.4894 20.5464 24.3083C20.5464 19.7893 20.5508 15.2703 20.5383 10.7513C20.5376 10.3962 20.6326 10.2916 20.9878 10.3011C21.8712 10.3254 22.7562 10.3225 23.6396 10.3019C23.9557 10.2945 24.0375 10.4293 24.0596 10.7071C24.2306 12.8483 25.8369 14.5939 27.8322 15.1038C28.1033 15.173 28.3841 15.2173 28.6626 15.2386C28.9139 15.2578 29.0008 15.3624 28.9979 15.61C28.989 16.5435 28.9905 17.4764 28.9964 18.4099C28.9979 18.6656 28.9146 18.7378 28.6434 18.7224C27.0394 18.6288 25.5598 18.1778 24.2284 17.2656C24.1923 17.2406 24.1399 17.2398 24.0456 17.2133C24.0346 17.3526 24.0176 17.4675 24.0176 17.5825C24.0162 19.8298 24.0176 22.0771 24.0176 24.3245C24.0176 27.1951 22.3288 29.6672 19.5952 30.544C17.1393 31.3317 14.8861 30.8358 12.9888 29.038C11.6359 27.7559 10.9603 26.1356 11.0015 24.2898C11.0774 20.9564 13.548 18.197 16.8151 17.8978C17.2506 17.858 17.6927 17.8706 18.1304 17.8897C18.2195 17.8934 18.3772 18.0349 18.3779 18.1137C18.3897 19.1814 18.3794 20.2498 18.3728 21.3175C18.3728 21.3381 18.3492 21.3595 18.375 21.3167Z" fill="white"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_82_137">
                        <rect width="18" height="20.6062" fill="white" transform="translate(11 10.3003)"/>
                        </clipPath>
                        </defs>
                    </svg>

                    <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect y="0.603271" width="40" height="40" rx="20" fill="#00C48E"/>
                        <g clip-path="url(#clip0_82_140)">
                        <path d="M19.0789 23.0911C18.7564 23.4458 18.4524 23.77 18.1587 24.1044C16.8575 25.5876 15.5639 27.0776 14.2517 28.5524C14.1315 28.6878 13.9072 28.7962 13.7268 28.8021C12.959 28.8292 12.1903 28.814 11.32 28.814C11.723 28.3441 12.054 27.9504 12.3935 27.5644C14.0689 25.6587 15.7468 23.7556 17.423 21.8508C17.8234 21.3954 17.8167 21.3979 17.4391 20.9052C15.3836 18.2181 13.3306 15.5294 11.2785 12.8398C11.1947 12.7306 11.1228 12.6112 11 12.4284C11.193 12.4131 11.3234 12.3945 11.4538 12.3945C13.0335 12.3928 14.6132 12.3996 16.1929 12.3877C16.4867 12.3861 16.6789 12.4673 16.8626 12.7137C18.0004 14.2384 19.1585 15.7487 20.3115 17.2624C20.4038 17.3834 20.5071 17.4952 20.6375 17.6492C20.9905 17.2505 21.3173 16.8848 21.6398 16.5165C22.7531 15.2433 23.8697 13.9734 24.972 12.6917C25.1667 12.4648 25.3741 12.3818 25.6653 12.3877C26.379 12.4038 27.0935 12.3928 27.8698 12.4944C27.648 12.7535 27.4287 13.0159 27.2044 13.2724C25.5426 15.1713 23.8858 17.0736 22.2113 18.9606C21.9573 19.2467 21.9497 19.4237 22.1867 19.7352C24.409 22.6483 26.6118 25.5775 28.8188 28.5024C28.8764 28.5786 28.9204 28.6633 28.9992 28.7894C28.8502 28.7996 28.746 28.8131 28.641 28.8131C27.0478 28.814 25.4537 28.808 23.8604 28.8199C23.5929 28.8216 23.4253 28.7403 23.2627 28.5253C21.9598 26.8067 20.6442 25.0983 19.332 23.3882C19.266 23.3019 19.1907 23.2223 19.0789 23.0911ZM25.8465 27.2283C25.7051 27.0082 25.6408 26.8897 25.5595 26.7839C24.9559 25.9855 24.3472 25.1914 23.7436 24.3931C21.1734 20.9975 18.604 17.601 16.0321 14.207C15.9491 14.0978 15.8399 13.9353 15.7358 13.9294C15.2143 13.9006 14.6902 13.9167 14.0722 13.9167C14.2695 14.1817 14.3922 14.351 14.5192 14.5169C15.9906 16.4446 17.4628 18.3714 18.935 20.299C20.6205 22.5061 22.3044 24.7157 23.9967 26.9176C24.0983 27.0497 24.2659 27.2012 24.4149 27.2148C24.8467 27.2545 25.2835 27.2292 25.8465 27.2292V27.2283Z" fill="#FFF8F3"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_82_140">
                        <rect width="18" height="16.4313" fill="white" transform="translate(11 12.3877)"/>
                        </clipPath>
                        </defs>
                    </svg>
                </div>
                
                <div class="flex items-center justify-center">
                    <p class="text-black font-light text-[14px]">© 2024 Ticolancer</p>
                </div>
                
            </div>
        </footer>
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
</body>

</html> 