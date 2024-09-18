@extends('ticolancer.layout')
@section ('content')

    {{-- Hero --}}
        <div style="background-image: url({{ asset('images/nosotros/hero_bg_nosotros.jpg') }});" class=" bg-cover bg-center h-[600px] max-sm:h-[600px] flex items-center justify-center">
                    <h2 class="text-[48px] font-light text-white">Nosotros</h2>
        </div>
    {{-- Hero end --}}

    {{-- Quienes somos --}}
        <div class="w-[90vw] m-auto grid grid-cols-2 max-sm:grid-cols-1 gap-[40px] py-[40px]">
            <div class="flex justify-center items-start max-sm:items-center flex-col gap-[20px] ">
                <h2 class="text-blue text-[36px] max-sm:text-[28px] font-light">¿Quiénes <span class="text-green font-secondary">somos?</span></h2>
                <p class="text-[18px]  font-light text-black">En Ticolancer, somos una comunidad apasionada de freelancers costarricenses que buscan conectar con empresas y emprendedores en todo el mundo. Nuestro objetivo es crear un espacio donde el talento local pueda brillar y ofrecer sus habilidades únicas en un mercado global.
                <br> <br> Nos especializamos en proporcionar una plataforma intuitiva y segura donde los profesionales ticos pueden presentar sus servicios, desde diseño gráfico y desarrollo web hasta redacción y marketing digital. Creemos firmemente en el potencial de nuestros freelancers y en la riqueza que aportan al trabajo remoto.</p>
                <a class="px-[20px] py-[10px] rounded-[10px] text-blue font-semibold border-solid border-[1px] border-blue hover:translate-y-[-5px] transition-all duration-500 ease-out hover:bg-blue hover:text-white " href="{{ route('signup') }}">Registrarse</a>
            </div>
            <div class="flex justify-center items-start">
                <img src="{{ asset('images/nosotros/phones_mockup.jpg') }}" alt="">
            </div>
        </div>
    {{-- Quienes somos end --}}

    {{-- Que buscamos --}}
        <div class="flex w-full bg-blue py-[40px]">
            <div class="flex flex-col justify-center items-center m-auto w-[90vw] gap-[40px]">
                
                <h2 class="text-white w-fit text-[36px] max-sm:text-[28px] font-light">¿Qué <span class="text-green font-secondary">buscamos?</span></h2>
                
                <div class="grid grid-cols-3 max-sm:grid-cols-1 max-sm:gap-[40px] gap-[40px] w-full">
                    <div class="flex flex-col justify-between items-center ">
                        <div class="flex flex-col items-center gap-[10px]">
                        <h3 class="text-[24px] font-semibold text-white">VISION</h3>
                        <p class="text-[16px] text-center font-light text-white">Queremos ser la plataforma líder en Costa Rica para freelancers, facilitando un entorno en el que los profesionales independientes puedan prosperar y crecer, al tiempo que aportan un toque único costarricense a sus clientes.</p>
                        </div>
                    </div>

                    <div class="flex flex-col justify-between items-center ">
                            <div class="flex flex-col items-center gap-[10px]">
                            <h3 class="text-[24px] font-semibold text-white">MISION</h3>
                            <p class="text-[16px] text-center font-light text-white">En Ticolancer, nuestra misión es conectar a freelancers costarricenses con oportunidades laborales, brindando una plataforma segura y accesible para que muestren sus habilidades y encuentren proyectos que se alineen con su talento.</p>
                            </div>
                    </div>

                    <div class="flex flex-col justify-between items-center ">
                        <div class="flex flex-col items-center gap-[10px]">
                        <h3 class="text-[24px] font-semibold text-white">VALORES</h3>
                        <p class="text-[16px] text-center font-light text-white">En Ticolancer, actuamos con integridad y transparencia, promovemos la innovación y la excelencia, y fomentamos la colaboración. Estamos comprometidos con el desarrollo del talento costarricense y el crecimiento económico local.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{-- Que buscamos end --}}

    {{-- Ya nos sigues --}}
        <div class="w-[90vw] m-auto grid grid-cols-2 max-sm:grid-cols-1 gap-[40px] py-[40px]">
            <div class="flex justify-center items-start">
                <img class="max-sm:w-[200px]" src="{{ asset('images/nosotros/redes.png') }}" alt="">
            </div>
            <div class="flex justify-center items-start max-sm:items-center flex-col gap-[20px] ">
                <h2 class="text-blue text-[36px] max-sm:text-[28px] font-light">¿Ya nos <span class="text-green font-secondary">sigues?</span></h2>
                <p class="text-[18px] max-sm:text-center font-light text-black">Síguenos en nuestras redes y no te pierdas de nuestras actualizaciones!!</p>
                <div class="flex justify-center gap-[10px]">
                        <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect y="0.603271" width="40" height="40" rx="20" fill="#132D46"/>
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
                            <rect y="0.603271" width="40" height="40" rx="20" fill="#132D46"/>
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
                            <rect y="0.603271" width="40" height="40" rx="20" fill="#132D46"/>
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
                            <rect y="0.603271" width="40" height="40" rx="20" fill="#132D46"/>
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
            </div>
        </div>
    {{-- Ya nos sigues end --}}

    {{-- Enviar email --}}
        <div class="flex w-full bg-blue py-[40px]">
            <div class="flex flex-col justify-center items-center m-auto w-[90vw] gap-[40px]">
                <img class="max-sm:w-[200px]" src="https://i.postimg.cc/L5xn179L/illustration2.png" alt="">
                <div class="flex flex-col w-full gap-[20px] max-sm:items-center">
                    <h2 class="text-white w-fit text-[36px] max-sm:text-[28px] font-light">¿Deseas <span class="text-green font-secondary">contactarnos?</span></h2>
                    <h3 class="text-white font-light text-[22px]">¡Únete a la familia Ticolancer!</h3>
                    <form class="flex flex-row" action="{{ route('contacto.store') }}" method="POST">
                        <input type="text" placeholder="Email" class="rounded-l-[10px] w-[40%] max-sm:w-[100%] p-[10px] text-[16px] text-white bg-transparent border-[1px] border-white font-light outline-none">
                        <input type="submit" placeholder="Nombre" class="rounded-r-[10px] p-[10px] cursor-pointer text-[16px] text-primary font-semibold bg-white outline-none">
                    </form>
                </div>
            </div>
        </div>
    {{-- Enviar email end --}}

@endsection