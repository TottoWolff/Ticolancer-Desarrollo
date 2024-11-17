@extends('buyers.layout')

@section('content')

<section class="mt-[210px]">

    <section class="flex flex-col px-[140px] gap-[20px] max-sm:w-[90vw] max-sm:px-0 max-sm:m-auto mt-[80px]">


        <section class="container mx-auto px-4 mt-10 grid grid-cols-1 md:grid-cols-2 sm:grid-cols-1 gap-8">
            <div class="relative border-[1px] border-blue rounded-[16px] p-[30px]">

            @if (auth('buyers')->user()->hasLikedSeller($buyerId))
                <form action="{{ route('unlike.seller', ['username' => $username, 'buyerId']) }}" method="POST">
                    @csrf
                    <button class="absolute top-4 right-4  text-blue px-3 py-2 rounded  ">
                        <svg width="30" height="30" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="fill-red-500 hover:fill-red-500 transition-all duration-500 ease-out" d="M3.91337 0.216696C5.01251 0.195629 5.94832 0.58572 6.69974 1.38176C6.9342 1.63027 7.06853 1.62732 7.30594 1.38221C8.35705 0.296889 9.65872 -0.0426845 11.0929 0.330416C12.5509 0.709633 13.5159 1.68124 13.8673 3.15778C14.2718 4.85724 13.7381 6.27148 12.451 7.44538C10.9325 8.83041 9.44442 10.2487 7.9468 11.6566C7.26018 12.302 6.74617 12.3032 6.06114 11.6582C4.48809 10.1771 2.90666 8.70491 1.33769 7.2193C0.12324 6.06942 -0.257563 4.65018 0.167867 3.05856C0.582423 1.50658 1.66027 0.599085 3.21588 0.246372C3.26141 0.236178 3.30672 0.218735 3.35248 0.218056C3.53937 0.214884 3.72648 0.216696 3.91337 0.216696Z" fill="red" />
                        </svg>
                        <input type="hidden" name="sellerId" value="{{ $buyerId }}">
                        <input type="hidden" name="usernameId" value="{{ auth('buyers')->user()->id }}">
                    </button>
                </form>
                @else
                <form id="likeSellerForm" action="{{ route('like.seller', ['username' => $username, 'buyerId']) }}" method="POST">
                    @csrf
                    <button type="submit" class="absolute top-4 right-4  text-blue px-3 py-2 rounded  ">
                        <svg width="30" height="30" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="fill-slate-300 hover:fill-red-500 transition-all duration-500 ease-out"
                                d="M3.91337 0.216696C5.01251 0.195629 5.94832 0.58572 6.69974 1.38176C6.9342 1.63027 7.06853 1.62732 7.30594 1.38221C8.35705 0.296889 9.65872 -0.0426845 11.0929 0.330416C12.5509 0.709633 13.5159 1.68124 13.8673 3.15778C14.2718 4.85724 13.7381 6.27148 12.451 7.44538C10.9325 8.83041 9.44442 10.2487 7.9468 11.6566C7.26018 12.302 6.74617 12.3032 6.06114 11.6582C4.48809 10.1771 2.90666 8.70491 1.33769 7.2193C0.12324 6.06942 -0.257563 4.65018 0.167867 3.05856C0.582423 1.50658 1.66027 0.599085 3.21588 0.246372C3.26141 0.236178 3.30672 0.218735 3.35248 0.218056C3.53937 0.214884 3.72648 0.216696 3.91337 0.216696Z"
                                  />
                        </svg>
                        <input type="hidden" name="sellerId" value="{{ $buyerId }}">
                        <input type="hidden" name="usernameId" value="{{ auth('buyers')->user()->id }}">
                    </button>
                </form>
                @endif


                <div class="flex max-sm:grid gap-9 max-sm:place-items-center max-sm:text-center">
                    <div>
                        @if ($profile == null)
                        <img class="w-[190px] max-sm:w-[120px] max-sm:h-[120px] rounded-full h-[190px] object-cover" src="{{ asset('images/buyers_profiles/profile_placeholder.png') }}" alt="">
                        @else
                        <img class="w-[190px] max-sm:w-[120px] max-sm:h-[120px] rounded-full h-[190px] object-cover" src="{{ asset('images/buyers_profiles/' . $profile) }}" alt="">

                        @endif
                    </div>

                    <div class="grid max-sm:place-items-center">
                        <div class="grid grid-cols-2 max-sm:grid-cols-1 max-md:grid-cols-1 max-lg:grid-cols-1 gap-30 max-sm:gap-1">
                            <div class="w-40">
                                <span class="text-primary font-semibold text-[18px] max-sm:text-center">{{ $name }} {{ $lastname }}</span>
                            </div>
                            <span class="text-[16px]  font-light text-gray-400 "> @ {{ $username }}</span>
                        </div>
                        <div class="flex">
                            <img class="w-[14px] h-[15px] mr-2 mt-1" src="{{ asset('images/profile/star.png') }}" alt="">
                            <span class="text-[16px] font-light text-black"> {{ number_format($userRating, 1) }} </span>
                        </div>
                        <div class="flex">
                            <img class="w-[14px] h-[19px] mr-2" src="{{ asset('icons/location.svg') }}" alt="">
                            <span class="text-[16px] font-light text-black ">{{ $userCity }} , {{ $userProvince }}, CR</span>
                        </div>
                        <div class="flex">
                            <img class="w-[14px] h-[19px] mr-2" src="{{ asset('images/profile/user.png') }}" alt="">
                            <span class="text-[16px] font-light text-black">Se unió en {{ $created_at }}</span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="h-[1px] bg-blue bg-opacity-50 w-full mt-8"></div>
                    <section class="max-sm:text-2xl mt-10 max-sm:text-center max-sm:mt-[2rem] w-full max-w-[40rem] max-sm:max-w-[20rem] mb-10">
                        <h1 class="text-primary font-bold text-[20px] max-sm:text-[20px]">Sobre mi</h1>
                        <p
                            class="text-[16px] max-sm:text-[14px] font-light text-black mt-3 w-full border-[1px] border-blue border-opacity-50 rounded-[16px] p-[20px] min-h-[48px] max-h-auto">
                            {{ $seller->description }}
                        </p>
                    </section>

                    <div class="h-[1px] bg-blue bg-opacity-50 w-full"></div>
                    <section class="py-14 max-sm:text-center">
                        <h2 class="text-primary font-bold text-[20px] max-sm:text-[20px]">Idiomas</h2>
                        <div>
                            <div class="flex flex-col flex-wrap gap-5 mt-5 md:flex-row">
                                @foreach ($languages as $language)
                                <div class="border border-gray-400 rounded-full px-3 py-1">
                                    <span class="font-light text-[16px]">{{ $language->language_name }}
                                        ({{ $language->level_name }})</span>
                                </div>


                                @endforeach
                            </div>
                        </div>
                    </section>

                </div>
            </div>

            <div class="flex flex-col gap-4 max-sm:justify-centery border-[1px] border-blue rounded-[16px] p-[30px]">
                <div class="flex gap-3 py-8">
                    <div class="w-full h-[45px] bg-white border border-gray-300 rounded-lg shadow-sm text-center">
                        <button id="openModalBtn" class="text-primary font-medium text-[20px] py-2">Más sobre mi</button>
                    </div>
                </div>

                <div id="userModal" class="z-[999] fixed inset-0 bg-gray-300 bg-opacity-50 flex items-center justify-center hidden">
                    <div class="bg-white w-[90%] max-w-md rounded-lg p-6 shadow-lg relative">
                        <button id="closeModalBtn" class="absolute top-3 right-3 text-gray-500 font-bold text-xl">&times;</button>

                        <h2 class="text-2xl font-semibold text-center mb-4">Información del Usuario</h2>

                        <div class="w-40">
                            <span class="font-semibold text-[18px] text-center">{{ $name }} {{ $lastname }}</span>
                        </div>

                        <p
                            class="text-[16px] max-sm:text-[14px] font-light text-black mt-3 w-full border-[1px] border-blue border-opacity-50 rounded-[16px] p-[20px] min-h-[48px] max-h-auto">
                            {{ $seller->sellerDescription }}
                        </p>
                        
                    </div>
                </div>


                <div>
                    <div class=" flex w-full mb-12 max-sm:w-[80%] h-[45px] border border-gray-400 rounded-md cursor-pointer place-items-center place-content-center 
                             hover:translate-y-[-5px] transition-all duration-500 ease-out hover:bg-blue hover:text-white text-blue font-semibold "
                        id="contact-button">
                        <span class=" text-xl text-center ">Contáctame</span>
                    </div>
                    <div id="contact-container"
                        class="z-[9999] absolute hidden transition-all duration-1000 ease-in-out transform translate-y-10 w-[35%] border border-gray-400 rounded-md">

                        <div class="flex gap-4 border border-gray rounded-t-md p-3 bg-white">
                            <img class="w-[24px] h-[24px] cursor-pointer" src="{{ asset('images/profile/whatsapp.png') }}" alt=""
                                onclick="window.open('https://wa.me/+506{{ $phone }}', '_blank')">
                            <span class="font-medium text-xl cursor-pointer hover:underline"
                                onclick="window.open('https://wa.me/+506{{ $phone }}', '_blank')">Whatsapp</span>
                            <div class="ml-auto hover:bg-gray-200 rounded-md">
                                <button class="ml-2 p-1 text-white bg-blue-500 rounded "
                                    onclick="copyToClipboard('+506{{ $phone }}'); event.stopPropagation();">
                                    <img src="{{ asset('images/profile/copy.png') }}" alt="Copiar" class="mr-2" />
                                </button>
                            </div>
                            <div id="copy-notification" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-60 rounded-sm">
                                <div class=" text-white text-sm p-4 rounded-lg shadow-lg border border-gray-300">¡Copiado en portapapeles!</div>
                            </div>
                        </div>

                        <div class="flex gap-4 border border-gray p-3 bg-white">
                            <img class="w-[24px] h-[24px] cursor-pointer" src="{{ asset('images/profile/message.png') }}" alt=""
                                onclick="window.location.href='mailto:{{ $email }}?subject={{ urlencode($emailSubject) }}&body={{ urlencode($emailBody) }}'">
                            <span class="font-medium text-xl cursor-pointer hover:underline"
                                onclick="window.location.href='mailto:{{ $email }}?subject={{ urlencode($emailSubject) }}&body={{ urlencode($emailBody) }} '">Correo</span>
                            <div class="ml-auto hover:bg-gray-200 rounded-md">
                                <button class="ml-2 p-1 text-white bg-blue-500 rounded "
                                    onclick="copyToClipboard('{{ $email }}'); event.stopPropagation();">
                                    <img src="{{ asset('images/profile/copy.png') }}" alt="Copiar" class="mr-2" />
                                </button>
                            </div>
                            <div id="copy-notification" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-60 rounded-sm">
                                <div class=" text-white text-sm p-4 rounded-lg shadow-lg border border-gray-300">¡Copiado en portapapeles!</div>
                            </div>
                        </div>


                        <div class="flex gap-4 border border-gray rounded-b-md p-3 bg-white">
                            <img class="w-[24px] h-[24px]  cursor-pointer" src="{{ asset('images/profile/phone.png') }}" alt="" onclick="window.location.href='tel:+506{{ $phone }}'">
                            <span class="font-medium text-xl cursor-pointer hover:underline" onclick="window.location.href='tel:+506{{ $phone }}'">Teléfono</span>
                            <div class="ml-auto hover:bg-gray-200 rounded-md">
                                <button class="ml-2 p-1 text-white bg-blue-500 rounded "
                                    onclick="copyToClipboard('+506{{ $phone }}'); event.stopPropagation();">
                                    <img src="{{ asset('images/profile/copy.png') }}" alt="Copiar" class="mr-2" />
                                </button>
                            </div>
                            <div id="copy-notification" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-60 rounded-sm">
                                <div class=" text-white text-sm p-4 rounded-lg shadow-lg border border-gray-300">¡Copiado en portapapeles!</div>
                            </div>
                        </div>


                    </div>

                    <div class="h-[1px] bg-blue bg-opacity-50 w-full"></div>
                    <section class="py-10 max-sm:text-center">
                        <h2 class="text-blue font-medium text-[20px] max-sm:text-[20px] ">Redes Sociales</h2>
                        <div class="flex gap-[10px] mt-5">
                            <a class="transform hover:scale-110 transition-all duration-500 ease-out" href="{{ $sellerFacebook }}" class="flex gap-[10px] items-center">
                                <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect class="fill-blue" y="0.603271" width="40" height="40" rx="20"/>
                                    <g clip-path="url(#clip0_82_134)">
                                    <path d="M21.1325 29.5542V23.4391C21.3278 23.4391 21.5119 23.4391 21.6965 23.4391C22.2328 23.4391 22.7691 23.4379 23.3055 23.4391C23.4477 23.4391 23.5567 23.4233 23.59 23.2443C23.7289 22.4963 23.8824 21.7511 24.0247 21.0036C24.0907 20.6547 24.0574 20.6192 23.6865 20.6186C22.842 20.6163 21.9968 20.618 21.119 20.618C21.1432 19.9417 21.049 19.275 21.2748 18.6286C21.4825 18.0341 21.9556 17.793 22.5309 17.74C23.0153 17.6948 23.5053 17.7016 23.9931 17.7005C24.1737 17.7005 24.2511 17.6378 24.2505 17.4577C24.2477 16.7706 24.2562 16.0836 24.2398 15.3965C24.2375 15.309 24.1263 15.1623 24.0456 15.147C22.7595 14.9065 21.4718 14.8032 20.2016 15.234C18.994 15.6432 18.2934 16.5076 17.9739 17.7213C17.752 18.5642 17.8107 19.4212 17.8113 20.2748C17.8113 20.53 17.7723 20.6496 17.472 20.6265C17.0514 20.5938 16.6257 20.622 16.2023 20.6175C15.9997 20.6152 15.8952 20.6717 15.8992 20.9076C15.9122 21.6602 15.9099 22.4133 15.9003 23.1664C15.8975 23.3781 15.972 23.447 16.1786 23.4419C16.6393 23.4312 17.1011 23.4464 17.5618 23.4346C17.7514 23.4295 17.8085 23.5017 17.8079 23.6796C17.8045 25.5149 17.8062 27.3503 17.8045 29.1856C17.8045 29.2477 17.7814 29.3104 17.7689 29.373C14.1242 28.533 10.6681 24.9814 11.0254 19.9829C11.3749 15.0996 15.4278 11.5243 20.2264 11.6559C25.3525 11.7964 29.1383 15.9746 28.9961 20.915C28.8533 25.874 24.963 29.1585 21.1325 29.5537V29.5542Z" fill="#FFF8F3"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_82_134">
                                    <rect width="18" height="17.9018" fill="white" transform="translate(11 11.6523)"/>
                                    </clipPath>
                                    </defs>
                                </svg> 
                            </a>
                            <a class="transform hover:scale-110 transition-all duration-500 ease-out" href="{{ $sellerLinkedin }}" class="flex gap-[10px] items-center">
                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="40" height="40" rx="20" fill="#132D46"/>
                                    <g clip-path="url(#clip0_844_1496)">
                                    <path d="M17.3718 28.9919C17.3718 28.7959 17.3718 28.6549 17.3718 28.5139C17.3718 24.8369 17.3774 21.1603 17.3633 17.4833C17.3618 17.1069 17.4573 16.9884 17.8406 17.001C18.6996 17.029 19.5613 17.0316 20.4204 17.001C20.8533 16.9855 20.9765 17.1512 20.9435 17.549C20.918 17.8572 20.9384 18.169 20.9384 18.5625C21.0649 18.4672 21.1263 18.4396 21.1603 18.3927C22.2588 16.8792 23.7898 16.5249 25.5371 16.7784C26.6064 16.9338 27.6245 17.2855 28.1466 18.2916C28.5136 18.9987 28.8247 19.8117 28.8702 20.5942C28.9949 22.7329 28.9672 24.8805 28.996 27.0247C29.0034 27.5684 28.9923 28.112 28.9986 28.6556C29.0012 28.8741 28.9553 29 28.6908 28.9966C27.6589 28.9848 26.6267 28.9871 25.5945 28.9955C25.3658 28.9974 25.2937 28.9051 25.2948 28.6907C25.3033 26.8026 25.3233 24.9141 25.3022 23.0259C25.2952 22.4029 25.2438 21.7656 25.0995 21.1618C24.8623 20.1712 23.7883 19.7125 22.6288 20.0092C21.722 20.241 21.3472 20.909 21.1677 21.7342C21.0986 22.0527 21.0712 22.386 21.0697 22.7126C21.0608 24.6583 21.0564 26.604 21.0734 28.5497C21.0764 28.9114 20.9661 29.0074 20.612 29C19.5539 28.9775 18.4947 28.9919 17.3714 28.9919H17.3718Z" fill="white"/>
                                    <path d="M11.275 23.0016C11.275 21.1574 11.2835 19.3128 11.2676 17.4686C11.2647 17.1043 11.393 16.9984 11.7401 17.0043C12.6709 17.0206 13.6025 17.0187 14.5334 17.0051C14.8605 17.0003 14.984 17.0999 14.9829 17.4465C14.9722 21.1637 14.974 24.8809 14.9807 28.5981C14.9811 28.8819 14.913 29.0041 14.5978 28.9982C13.624 28.9793 12.6495 28.9775 11.6757 28.9989C11.3413 29.0063 11.2676 28.8852 11.2695 28.5771C11.2809 26.7185 11.2754 24.8599 11.2754 23.0012L11.275 23.0016Z" fill="white"/>
                                    <path d="M13.1359 15.2729C11.9583 15.2747 11.0048 14.3273 11 13.15C10.9952 11.983 11.9597 11.0057 13.1215 10.9998C14.3102 10.9939 15.2902 11.972 15.2832 13.1578C15.2766 14.3222 14.3131 15.2714 13.1359 15.2732V15.2729Z" fill="white"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_844_1496">
                                    <rect width="18" height="18" fill="white" transform="translate(11 11)"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                            </a>
                            <a class="transform hover:scale-110 transition-all duration-500 ease-out" href="{{ $sellerInstagram }}" class="flex gap-[10px] items-center">
                                <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect class="fill-blue" y="0.603271" width="40" height="40" rx="20"/>
                                    <g clip-path="url(#clip0_82_129)">
                                    <path class="fill-white" d="M28.9759 20.5825C28.9759 22.0851 29.0233 23.5885 28.9655 25.0884C28.8689 27.6001 26.906 29.7141 24.5177 29.8882C21.4625 30.1101 18.4038 30.1119 15.3486 29.8738C13.4426 29.725 11.6566 28.0538 11.2615 25.9749C11.0751 24.9964 11.038 23.9781 11.0207 22.9761C10.9888 21.1273 10.9931 19.2766 11.0389 17.4286C11.0725 16.064 11.1346 14.6932 11.9414 13.5072C12.9155 12.0741 14.2477 11.2804 15.9025 11.2236C18.2856 11.1415 20.6722 11.1524 23.057 11.1551C24.2511 11.1569 25.4366 11.2443 26.5048 11.9253C28 12.8786 28.8594 14.2639 28.9586 16.0776C29.0406 17.5747 28.975 19.08 28.9759 20.5825ZM12.6238 20.5798C12.6238 21.9029 12.5885 23.2278 12.6351 24.549C12.6696 25.5339 12.8818 26.4719 13.5816 27.2339C14.3771 28.1007 15.3909 28.3081 16.4521 28.3424C18.1182 28.3974 19.786 28.4244 21.453 28.4046C22.5272 28.392 23.6083 28.3388 24.6722 28.1918C26.1596 27.9852 27.2451 26.8407 27.3331 25.275C27.4616 22.9815 27.4789 20.6808 27.5022 18.3828C27.5108 17.5296 27.4323 16.6719 27.3391 15.8223C27.2218 14.7572 26.6842 13.95 25.8162 13.3809C25.1424 12.939 24.3771 12.8488 23.6204 12.8353C21.3788 12.7929 19.1355 12.7613 16.8948 12.8118C16.0915 12.8299 15.239 12.9561 14.5048 13.2745C13.1372 13.8661 12.6816 15.1631 12.6359 16.6124C12.5945 17.9337 12.6273 19.2576 12.6264 20.5807L12.6238 20.5798Z" fill="#FFF8F3"/>
                                    <path d="M24.6368 20.5996C24.6342 23.2421 22.5358 25.4445 20.0319 25.4319C17.5048 25.4184 15.4038 23.2178 15.4176 20.5987C15.4314 17.9057 17.5073 15.7393 20.0578 15.7564C22.6057 15.7745 24.6394 17.9255 24.6368 20.5996ZM20.0095 23.786C21.7213 23.7959 23.0854 22.3853 23.0897 20.5996C23.0941 18.813 21.742 17.3925 20.0319 17.3871C18.3589 17.3826 16.9715 18.813 16.9629 20.5518C16.9543 22.3294 18.3167 23.7751 20.0095 23.7851V23.786Z" fill="#FFF8F3"/>
                                    <path d="M25.9232 15.4959C25.9258 16.1092 25.4866 16.5917 24.9085 16.6098C24.3046 16.6287 23.8154 16.1173 23.8188 15.4716C23.8223 14.9079 24.2856 14.4552 24.8688 14.4452C25.4789 14.4353 25.9206 14.8754 25.9232 15.4959Z" fill="#FFF8F3"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_82_129">
                                    <rect width="18" height="18.9" fill="white" transform="translate(11 11.1533)"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                            </a>
                            <a class="transform hover:scale-110 transition-all duration-500 ease-out" href="{{ $sellerTwitter }}" class="flex gap-[10px] items-center">
                                <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect class="fill-blue" y="0.603271" width="40" height="40" rx="20"/>
                                    <g clip-path="url(#clip0_82_140)">
                                    <path d="M19.0789 23.0911C18.7564 23.4458 18.4524 23.77 18.1587 24.1044C16.8575 25.5876 15.5639 27.0776 14.2517 28.5524C14.1315 28.6878 13.9072 28.7962 13.7268 28.8021C12.959 28.8292 12.1903 28.814 11.32 28.814C11.723 28.3441 12.054 27.9504 12.3935 27.5644C14.0689 25.6587 15.7468 23.7556 17.423 21.8508C17.8234 21.3954 17.8167 21.3979 17.4391 20.9052C15.3836 18.2181 13.3306 15.5294 11.2785 12.8398C11.1947 12.7306 11.1228 12.6112 11 12.4284C11.193 12.4131 11.3234 12.3945 11.4538 12.3945C13.0335 12.3928 14.6132 12.3996 16.1929 12.3877C16.4867 12.3861 16.6789 12.4673 16.8626 12.7137C18.0004 14.2384 19.1585 15.7487 20.3115 17.2624C20.4038 17.3834 20.5071 17.4952 20.6375 17.6492C20.9905 17.2505 21.3173 16.8848 21.6398 16.5165C22.7531 15.2433 23.8697 13.9734 24.972 12.6917C25.1667 12.4648 25.3741 12.3818 25.6653 12.3877C26.379 12.4038 27.0935 12.3928 27.8698 12.4944C27.648 12.7535 27.4287 13.0159 27.2044 13.2724C25.5426 15.1713 23.8858 17.0736 22.2113 18.9606C21.9573 19.2467 21.9497 19.4237 22.1867 19.7352C24.409 22.6483 26.6118 25.5775 28.8188 28.5024C28.8764 28.5786 28.9204 28.6633 28.9992 28.7894C28.8502 28.7996 28.746 28.8131 28.641 28.8131C27.0478 28.814 25.4537 28.808 23.8604 28.8199C23.5929 28.8216 23.4253 28.7403 23.2627 28.5253C21.9598 26.8067 20.6442 25.0983 19.332 23.3882C19.266 23.3019 19.1907 23.2223 19.0789 23.0911ZM25.8465 27.2283C25.7051 27.0082 25.6408 26.8897 25.5595 26.7839C24.9559 25.9855 24.3472 25.1914 23.7436 24.3931C21.1734 20.9975 18.604 17.601 16.0321 14.207C15.9491 14.0978 15.8399 13.9353 15.7358 13.9294C15.2143 13.9006 14.6902 13.9167 14.0722 13.9167C14.2695 14.1817 14.3922 14.351 14.5192 14.5169C15.9906 16.4446 17.4628 18.3714 18.935 20.299C20.6205 22.5061 22.3044 24.7157 23.9967 26.9176C24.0983 27.0497 24.2659 27.2012 24.4149 27.2148C24.8467 27.2545 25.2835 27.2292 25.8465 27.2292V27.2283Z" fill="#FFF8F3"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_82_140">
                                    <rect width="18" height="16.4313" fill="white" transform="translate(11 12.3877)"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                            </a>
                            <a class="transform hover:scale-110 transition-all duration-500 ease-out" href="{{ $sellerWebsite }}" class="flex gap-[10px] items-center">
                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="40" height="40" rx="20" fill="#132D46"/>
                                    <g clip-path="url(#clip0_844_1969)">
                                    <path d="M19.9937 28.8941C14.976 28.9192 10.9161 24.8307 11.0013 19.7922C11.0803 15.1231 14.7928 10.9932 20.0239 11C25.1949 11.0068 29.07 15.1621 28.9991 20.0945C28.9301 24.8941 25.0261 28.9139 19.994 28.8941H19.9937ZM19.9937 22.2137C20.9485 22.2137 21.9036 22.2066 22.8584 22.2187C23.1015 22.2218 23.1988 22.1358 23.2386 21.9028C23.4594 20.6046 23.4572 19.3084 23.2402 18.0099C23.2026 17.7856 23.1217 17.6826 22.8702 17.6838C20.9603 17.6931 19.0507 17.6931 17.1408 17.6838C16.8967 17.6826 16.8001 17.7673 16.7615 17.9984C16.5423 19.3063 16.5392 20.6117 16.7646 21.9192C16.8029 22.1407 16.8995 22.2208 17.1293 22.2181C18.0841 22.2069 19.0389 22.2134 19.994 22.2134L19.9937 22.2137ZM15.6994 17.7281C15.6261 17.7117 15.5804 17.6925 15.5347 17.6925C14.5509 17.6906 13.5672 17.694 12.5838 17.6872C12.4016 17.686 12.3578 17.7927 12.3233 17.9307C11.9903 19.2679 11.9853 20.6046 12.3146 21.944C12.3646 22.1478 12.462 22.2205 12.6752 22.2181C13.5719 22.2075 14.4692 22.2051 15.3658 22.219C15.6357 22.2233 15.7256 22.1553 15.6758 21.8762C15.497 20.8796 15.4703 19.8751 15.5689 18.8676C15.6059 18.4899 15.655 18.1135 15.6998 17.7277L15.6994 17.7281ZM24.2842 17.6888C24.3361 18.0346 24.3934 18.3158 24.4182 18.5994C24.514 19.6908 24.5258 20.7818 24.3278 21.8648C24.2802 22.1249 24.334 22.2249 24.6247 22.2196C25.5207 22.2029 26.4177 22.206 27.314 22.2187C27.5425 22.2218 27.638 22.1407 27.6899 21.9267C28.0133 20.5965 28.0055 19.2701 27.6824 17.9415C27.6352 17.7472 27.5404 17.6826 27.3414 17.6851C26.5318 17.6946 25.7219 17.6891 24.9123 17.6888C24.722 17.6888 24.532 17.6888 24.2842 17.6888ZM20.0024 23.3122C19.1639 23.3122 18.3251 23.3116 17.4865 23.3125C17.1685 23.3128 17.157 23.3382 17.2723 23.6422C17.8083 25.0571 18.6605 26.2598 19.7372 27.3168C19.9318 27.508 20.0605 27.5052 20.2617 27.3193C21.3838 26.2812 22.1999 25.0451 22.7371 23.6215C22.8416 23.345 22.8233 23.3131 22.5183 23.3125C21.6798 23.3112 20.8409 23.3122 20.0024 23.3122ZM19.9859 16.6089C20.8341 16.6089 21.6822 16.6061 22.5304 16.6107C22.7645 16.612 22.845 16.5498 22.7511 16.3042C22.208 14.8819 21.3632 13.664 20.2707 12.6064C20.0658 12.4081 19.9297 12.4158 19.7226 12.6092C18.6207 13.6368 17.8012 14.8469 17.2748 16.2547C17.152 16.5832 17.166 16.6079 17.5282 16.6086C18.3474 16.6101 19.1667 16.6092 19.9859 16.6089ZM27.0948 23.3527C27.0068 23.3363 26.9434 23.314 26.88 23.314C25.9933 23.3119 25.1066 23.3177 24.2202 23.3088C24.0187 23.3066 23.9587 23.4152 23.9037 23.5723C23.4155 24.9724 22.6756 26.2283 21.709 27.3539C21.6396 27.4347 21.5921 27.5334 21.5168 27.6506C23.9618 27.3246 26.3089 25.2956 27.0945 23.3524L27.0948 23.3527ZM18.4398 12.2927C16.9922 11.9865 13.1668 14.9332 12.9289 16.573C13.0402 16.5851 13.1516 16.6073 13.2625 16.6079C14.0625 16.611 14.8631 16.5996 15.6628 16.6151C15.9252 16.62 16.0219 16.5037 16.1204 16.2825C16.4394 15.5661 16.7463 14.8389 17.1393 14.1627C17.5176 13.5118 17.9977 12.9197 18.4395 12.2927H18.4398ZM21.5106 12.2853C21.5619 12.3605 21.588 12.4093 21.6241 12.4496C22.6597 13.599 23.4323 14.901 23.9174 16.3691C23.9783 16.5535 24.0971 16.6138 24.2876 16.6123C25.1358 16.6052 25.9843 16.6104 26.8324 16.6079C26.9235 16.6079 27.0143 16.5872 27.106 16.5761C26.8564 14.9493 23.1706 12.1142 21.5106 12.2853ZM18.483 27.6404C18.4084 27.5293 18.3568 27.4297 18.2846 27.3481C17.3075 26.2394 16.5697 24.9925 16.1039 23.5918C16.0358 23.3867 15.9398 23.3038 15.7131 23.3075C14.8746 23.3211 14.0361 23.3122 13.1973 23.314C13.1062 23.314 13.0151 23.331 12.9215 23.34C13.2162 25.0095 16.5737 27.6076 18.483 27.6404Z" fill="white"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_844_1969">
                                    <rect width="18" height="17.8941" fill="white" transform="translate(11 11)"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </div>

                    </section>
                </div>
        </section>





        <section class="py-[60px]">
            <h1 class="text-primary font-bold text-[30px] max-sm:text-[20px]">Mis Servicios</h1>

            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 ">
                @if ($gigs && count($gigs) > 0)
                @foreach ($gigs as $gig)
                <div class="border border-gray-300 rounded-lg p-4 shadow-md">
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
                                <img class="w-3 h-3" src="{{ asset('images/profile/star.png') }}"
                                    alt="Calificación">
                                <span class="text-primary font-semibold text-[15px] max-sm:text-[12px]">
                                    {{ $gig->reviews->isNotEmpty() ? number_format(optional($gig->reviews->first())->average_rating, 1) : 'Sin calificaciones' }}
                                </span>
                            </div>

                            <!-- Precio del gig -->
                            <div class="text-primary font-semibold text-[16px] max-sm:text-[12px] mt-2">Desde
                                ₡{{ number_format($gig->gig_price) }}</div>
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



        </section>
    </section>
</section>
@endsection


<script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(function() {
            const notification = document.getElementById('copy-notification');
            notification.classList.remove('hidden');

            setTimeout(() => {
                notification.classList.add('hidden');
            }, 1000);
        }, function(err) {
            console.error('Error al copiar al portapapeles: ', err);
        });
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const contactButton = document.getElementById('contact-button');
        const contactContainer = document.getElementById('contact-container');

        function toggleContactContainer() {
            contactContainer.classList.toggle('hidden');

            if (contactContainer.classList.contains('hidden')) {
                contactContainer.classList.remove('opacity-100', 'translate-y-0');
                contactContainer.classList.add('opacity-0', 'translate-y-5');
            } else {
                contactContainer.classList.remove('opacity-0', 'translate-y-5');
                contactContainer.classList.add('opacity-100', 'translate-y-0');
            }
        }

        contactButton.addEventListener('click', function(event) {
            event.stopPropagation();
            toggleContactContainer();
        });

        document.addEventListener('click', function(event) {
            if (!contactContainer.classList.contains('hidden') && !contactButton.contains(event.target)) {
                contactContainer.classList.add('hidden');
                contactContainer.classList.remove('opacity-100', 'translate-y-0');
                contactContainer.classList.add('opacity-0', 'translate-y-5');
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const userModal = document.getElementById('userModal');

        openModalBtn.addEventListener('click', function() {
            userModal.classList.remove('hidden');
        });

        closeModalBtn.addEventListener('click', function() {
            userModal.classList.add('hidden');
        });
        window.addEventListener('click', function(event) {
            if (event.target === userModal) {
                userModal.classList.add('hidden');
            }
        });
    });
</script>

<style>
    #userModal .bg-opacity-50 {
        animation: fadeIn 0.3s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
</style>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const likeButton = document.getElementById('likeButton');
        const likeIcon = document.getElementById('likeIcon');
        let liked = false;

        likeButton.addEventListener('click', function() {
            if (liked) {
                likeIcon.src = "{{ asset('images/profile/heart-like-empty.png') }}";
            } else {
                likeIcon.src = "{{ asset('images/profile/heart-like-fill.png') }}";
            }
            liked = !liked; 
        });
    });
</script>