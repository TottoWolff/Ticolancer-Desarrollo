@extends('buyers.layout')

@section('content')
<div class="min-h-[90vh] min-w-[90vw] flex items-center justify-center mt-[140px] max-sm:mt-[80px]">
    <div class=" rounded-lg w-full  sm:max-w-4xl md:max-w-6xl lg:max-w-[90vw] grid md:grid-cols-2 gap-6 p-6">
        <!-- Left Column -->
        <div class="flex flex-col gap-[20px]">
            <!-- Profile Card -->
            <div class="border-[1px] border-blue border-opacity-50 rounded-[16px] p-[20px] relative">
                <!-- Edit button -->
                <a href="{{ route('buyerProfileSettingsAccount', ['username' => $username]) }}" class="absolute top-4 right-4 text-gray-400">
                    <img src="{{ asset('icons/edit.svg') }}" alt="">
                </a>
                <!-- Edit button end -->

                <div class="flex flex-col items-center gap-[20px]">
                    <div class="relative flex items-start justify-center w-[120px] h-[120px]">
                        <div onmouseover="showProfileButton()" onmouseout="hideProfileButton()" id="picture-overlay"
                            class="absolute rounded-full h-[120px] w-[120px] bg-transparent hover:bg-blue hover:bg-opacity-50 transition-all duration-500">
                            <button id="profile-button" onclick="openModal()"
                                class="hidden top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
                                <img src="{{ asset('icons/camera.svg') }}" alt="">
                            </button>
                        </div>
                        @if ($picture == null)
                        <img class="w-[120px] h-[120px] rounded-full bg-center object-cover"
                            src="{{ asset('images/buyers_profiles/profile_placeholder.png') }}" alt="">
                        @else
                        <img class="w-[120px] h-[120px] rounded-full bg-center object-cover"
                            src="{{ asset('images/buyers_profiles/' . $picture) }}" alt="">
                        @endif
                    </div>
                    <h2 class="mt-4 text-[22px] font-semibold text-blue">{{ $name }} {{ $lastname }}</h2>
                    <p class="text-blue text-[18px] font-light">{{ $username }}</p>
                    <div class="h-[1px] bg-blue bg-opacity-50 w-full"></div>
                </div>

                <div class="mt-6 space-y-2">
                    <div class="flex flex-col gap-[20px] items-center">
                        <div class="flex gap-[10px] w-full items-center justify-center">
                            <span class="font-light text-[16px]">Description</span>
                        </div>

                        <div class="flex w-[85%] gap-[10px] items-center text-center">
                            <span class="font-light text-[16px]">{{ $sellerDescription }}</span>
                        </div>

                        <div class="h-[1px] bg-blue bg-opacity-50 w-full"></div>
                    </div>
                </div>

                <div class="mt-6 space-y-2">
                    <div class="flex flex-col gap-[20px] items-center">
                        <div class="flex gap-[10px] w-full items-center justify-start">
                            <img src="{{ asset('icons/BirthdayCake.svg') }}" alt="">
                            <span class="font-light text-[16px]">{{ $sellerBirthdate }}</span>
                        </div>

                        <div class="flex w-full gap-[10px] items-center">
                            <img src="{{ asset('icons/home.svg') }}" alt="">
                            <span class="font-light text-[16px]">{{ $sellerAddress }}</span>
                        </div>

                        <div class="h-[1px] bg-blue bg-opacity-50 w-full"></div>
                    </div>
                </div>

                <div class="mt-6 space-y-2">
                    <div class="flex flex-col gap-[20px] items-center">
                        <div class="flex gap-[10px] w-full items-center justify-start">
                            <img src="{{ asset('icons/location.svg') }}" alt="">
                            <span class="font-light text-[16px]">{{ $cityName }}, {{ $provinceName }}, CR</span>
                        </div>

                        <div class="flex w-full gap-[10px] items-center">
                            <img src="{{ asset('icons/user.svg') }}" alt="">
                            <span class="font-light text-[16px]">Se unió el {{ $joinDate }}</span>
                        </div>

                        <div class="h-[1px] bg-blue bg-opacity-50 w-full"></div>
                    </div>
                </div>

                <div class="mt-6 space-y-2">
                    <div class="flex flex-col gap-[20px] items-center">
                        <div class="flex gap-[10px] w-full items-center justify-start">
                            <img src="{{ asset('icons/phone.svg') }}" alt="">
                            <span class="font-light text-[16px]">+506 {{ $phone }}</span>
                        </div>

                        <div class="flex w-full gap-[10px] items-center">
                            <img src="{{ asset('icons/email.svg') }}" alt="">
                            <span class="font-light text-[16px]">{{ $email }}</span>
                        </div>

                        <div class="h-[1px] bg-blue bg-opacity-50 w-full"></div>
                    </div>
                </div>

                <div class="flex items-center gap-[10px] mt-[20px] mb-[20px]">
                    <!-- Icono de Tranducción -->
                    <div class="flex flex-col gap-[20px]">
                        @foreach ($languages as $language)
                        <div class="flex gap-[10px]">
                            <img src="{{ asset('icons/translate_2.svg') }}" alt="">
                            <span class="font-light text-[16px]">{{ $language->language_name }}
                                ({{ $language->level_name }})</span>
                        </div>
                        @endforeach
                    </div>

                </div>
                <div class="h-[1px] bg-blue bg-opacity-50 w-full"></div>


                <div class="mt-6 space-y-2">
                    <div class="flex flex-col gap-[20px] ">
                        <div class="flex gap-[10px] w-full items-center justify-start">
                            <img src="{{ asset('icons/World wide web.svg') }}" alt="">
                            <span class="font-light text-[16px]">Redes Sociales</span>
                        </div>

                        <div class="flex w-fit gap-[10px] justify-between">
                            <a class="transform hover:scale-110 transition-all duration-500 ease-out" href="{{$sellerFacebook}}" class="flex gap-[10px] items-center">
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
                            <a class="transform hover:scale-110 transition-all duration-500 ease-out" href="{{$sellerLinkedin}}" class="flex gap-[10px] items-center">
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
                            <a class="transform hover:scale-110 transition-all duration-500 ease-out" href="{{$sellerInstagram}}" class="flex gap-[10px] items-center">
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
                            <a class="transform hover:scale-110 transition-all duration-500 ease-out" href="{{$sellerTwitter}}" class="flex gap-[10px] items-center">
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
                            <a class="transform hover:scale-110 transition-all duration-500 ease-out" href="{{$sellerWebsite}}" class="flex gap-[10px] items-center">
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
                    </div>
                </div>
            </div>


            <!-- Profile Card end -->

            <!-- Modal -->
            <div id="modal"
                class="w-[100vw] h-[100vh] fixed hidden z-10 top-0 right-0 bg-blue bg-opacity-50 backdrop-blur-sm">

                <form action="{{ route('buyers.updatePicture') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="modal-content"
                        class="fixed flex items-center flex-col gap-[40px] right-[50%] left-[50%] top-[50%] -translate-x-[50%] -translate-y-[50%] rounded-[16px] w-[30vw] max-sm:w-[90vw] max-sm:h-[70vh] h-[600px] bg-white p-[40px]">

                        <button type="button" class="absolute p-[14px] rounded-bl-[10px] bg-blue right-0 top-0"
                            onclick="closeModal()"><img src="{{ asset('icons/close.svg') }}"></button>

                        <div class="flex items-start w-full flex-col">
                            <h5 class="text-[36px] text-blue font-medium">Imagen de perfil</h5>
                            <p class="text-[16px] text-slate-400 font-light">Selecciona una nueva imagen de perfil o
                                elimina la actual</p>
                        </div>

                        <img class="rounded-full w-[280px] h-[280px] max-sm:w-[180px] max-sm:h-[180px] bg-center object-cover"
                            src="{{ asset('images/buyers_profiles/' . $picture) }}" alt="">

                        <div class="items-center justify-center flex gap-[20px] w-full">
                            <input class="hidden" name="picture" id="image-input" type="file" accept="image/*">
                            <button onclick="showFileChooser()" type="button" id="change-button"
                                class="button px-[20px] py-[10px] rounded-[10px] text-blue font-semibold border-solid border-[1px] border-blue hover:translate-y-[-5px] transition-all duration-500 ease-out hover:bg-blue hover:text-white ">Cambiar</button>
                            @if ($picture != 'profile_placeholder.png')
                            <button onclick="openDeleteModal()" type="button"
                                class="button px-[20px] py-[10px] rounded-[10px] text-blue font-semibold border-solid border-[1px] border-blue hover:translate-y-[-5px] transition-all duration-500 ease-out hover:bg-blue hover:text-white ">Eliminar</button>
                            @endif
                        </div>
                    </div>

                    <div id="modal-changes"
                        class="fixed hidden items-center flex-col gap-[40px] right-[50%] left-[50%] top-[50%] -translate-x-[50%] -translate-y-[50%] rounded-[16px] w-[30vw] max-sm:w-[90vw] max-sm:h-[70vh] h-[600px] bg-white p-[40px]">

                        <button type="button" class="absolute p-[14px] rounded-bl-[10px] bg-blue right-0 top-0"
                            onclick="closeModal()"><img src="{{ asset('icons/close.svg') }}"></button>

                        <div class="flex items-start w-full flex-col">
                            <h5 class="text-[36px] text-blue font-medium">Desea guardar los cambios?</h5>
                            <p class="text-[16px] text-slate-400 font-light">Esta será tu nueva imagen de perfil</p>
                        </div>

                        <img id="modal-changes-image" class="rounded-full w-[280px] h-[280px] bg-center object-cover"
                            src="{{ $picture }}" alt="">

                        <div class="items-center justify-center flex gap-[20px] w-full">
                            <button type="submit"
                                class="button px-[20px] py-[10px] rounded-[10px] text-blue font-semibold border-solid border-[1px] border-blue hover:translate-y-[-5px] transition-all duration-500 ease-out hover:bg-blue hover:text-white ">Guardar
                                cambios</button>
                            <button onclick="closeModal()" type="button"
                                class="button px-[20px] py-[10px] rounded-[10px] text-blue font-semibold border-solid border-[1px] border-blue hover:translate-y-[-5px] transition-all duration-500 ease-out hover:bg-red-600 hover:border-red-600 hover:text-white ">Cancelar</button>
                        </div>
                    </div>
                </form>

                <div id="modal-delete"
                    class="fixed hidden items-center flex-col gap-[40px] right-[50%] left-[50%] top-[50%] -translate-x-[50%] -translate-y-[50%] rounded-[16px] w-[30vw] max-sm:w-[90vw] max-sm:h-[70vh] h-[600px] bg-white p-[40px]">
                    <button type="button" class="absolute p-[14px] rounded-bl-[10px] bg-blue right-0 top-0"
                        onclick="closeModal()"><img src="{{ asset('icons/close.svg') }}"></button>

                    <div class="flex items-start w-full flex-col">
                        <h5 class="text-[36px] text-blue font-medium">Quitar la imagen de perfil?</h5>
                    </div>

                    <div class="flex gap-[20px] items-center justify-center h-full w-full">
                        <img class="rounded-full w-[180px] h-[180px] max-sm:w-[180px] max-sm:h-[180px] bg-center object-cover"
                            src="{{ asset('images/buyers_profiles/' . $picture) }}" alt="">
                        <img src="{{ asset('icons/arrow-right.svg') }}" alt="">
                        <img class="rounded-full w-[180px] h-[180px] max-sm:w-[180px] max-sm:h-[180px] bg-center object-cover"
                            src="{{ asset('images/buyers_profiles/profile_placeholder.png') }}" alt="">
                    </div>

                    <div id="modal-delete" class="flex h-full items-end justify-between w-full">
                        <button onclick="closeDeleteModal()"
                            class="button px-[20px] py-[10px] rounded-[10px] text-blue font-semibold border-solid border-[1px] border-blue hover:translate-y-[-5px] transition-all duration-500 ease-out hover:bg-blue hover:text-white ">Cancelar</button>
                        <form action="{{ route('buyers.deletePicture') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="px-[20px] py-[10px] rounded-[10px] text-blue font-semibold border-solid border-[1px] border-blue hover:translate-y-[-5px] transition-all duration-500 ease-out hover:bg-blue hover:text-white ">Quitar</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal end -->

            <!-- modal membership -->
            <div id="successModal" class="hidden fixed inset-0 bg-blue bg-opacity-50 backdrop-blur-sm flex items-center justify-center z-50">
                <div class="bg-white rounded-lg p-8 max-w-sm w-full shadow-lg text-center">
                    <h2 class="text-xl font-semibold">{{ session('success') }}</p>
                        <div class="flex justify-center gap-5 mt-2">
                            <button id="closeModal" class="button px-[20px] py-[10px] rounded-[10px] text-blue font-semibold border-solid border-[1px] border-blue hover:translate-y-[-5px] transition-all duration-500 ease-out hover:bg-blue hover:text-white ">
                                Aceptar
                            </button>
                        </div>
                </div>
            </div>
            <!-- modal membership end -->

            <!-- Settings -->
            <a class="flex w-full items-center gap-[10px] justify-center border-[1px] border-blue border-opacity-50 rounded-[12px] p-[10px] text-blue hover:text-white hover:bg-blue hover:border-blue transition-all duration-500 "
                href="{{ route('sellerProfileSettingsAccount', ['username' => $username]) }}"><img
                    src="{{ asset('icons/settings.svg') }}" alt="">Configuraciones</a>
            <!-- Settings end -->

            <!--Logout -->
            <form action="{{ route('login.logout') }}" method="POST">
                @csrf
                <button
                    class="flex w-full items-center gap-[10px] justify-center border-[1px] border-blue border-opacity-50 rounded-[12px] p-[10px] text-blue hover:text-white hover:bg-red-600 hover:border-red-600 transition-all duration-500 "><img
                        src="{{ asset('icons/leave.svg') }}" alt="">Cerrar sesión</Button>
            </form>

            <!--Logout end -->



        </div>

        <!-- Right Column -->
        <div class="flex flex-col gap-[20px]">
            <!-- Breadcrumb -->
            <p class="text-[18px] font-light text-gray-500">
                Inicio / Mi perfil
            </p>

            <!-- Welcome Message -->
            <div>
                <h1 class="text-[32px] font-medium text-blue">Hola {{ $name }} 👋 <br>Bienvenido a tu perfil!</h1>
            </div>

            <!-- Favorite Freelancers -->
            <div class="border-[0.5px] border-blue border-opacity-50 rounded-[16px] p-6">
                <h3 class="font-semibold text-[22px] mb-4 text-blue">Freelancers favoritos</h3>
                <div class="flex flex-col gap-[10px]">
                    @foreach ($favoritesBuyers as $favoriteBuyer)
                    <div class="flex gap-[10px] items-center">
                    <a href="{{ route('sellerGigsProfile', $favoriteBuyer['id'] ?? '') }}"><img src="{{ asset('images/buyers_profiles/'.$favoriteBuyer['picture']) }}"
                            alt="" class="rounded-full w-[30px] h-[30px] bg-cover object-fill"> </a>
                        <div class="flex gap-[10px]">
                        <a href="{{ route('sellerGigsProfile', $favoriteBuyer['id'] ?? '') }}"><span class=" font-light text-[#132D46]"> {{ '@'.$favoriteBuyer['username'] }}</span> </a>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class=" flex justify-end ">
                    <a class="hover:text-green text-gray-500 underline text-[16px] font-light" href="{{ route('favorites.sellers', ['username' => $username]) }}">Ver todos</a>
                </div>
            </div>

            <!-- Favorite Services -->
            <div class="border-[0.5px] border-blue border-opacity-50 rounded-[16px] p-6">
                <h3 class="font-semibold text-[22px] mb-4 text-blue">Servicios favoritos</h3>
                <div class="space-y-4">


                    @foreach ($favoritesData as $favorite)

                    <div class="flex items-start gap-[20px]">
                        <a href="{{ route('sellerGig', ['id' => $favorite['gig']['id'], 'username' => $favorite['gig']['buyer']['username'] ?? '']) }}">
                            <img src="{{ asset('images/gigs/' . $favorite['gig']['gig_image']) }}"
                                alt="Service"
                                class="w-[80px] h-[60px] rounded-[10px] border-[0.5px] border-blue border-opacity-50 bg-cover object-cover">
                        </a>
                        <div class="flex flex-col gap-[5px]">
                            <div class="flex items-center gap-[5px]">
                                <a href="{{ route('sellerGigsProfile', $favorite['gig']['buyer']['id'] ?? '') }}">
                                    <img class="w-[30px] h-[30px] rounded-full object-cover"
                                        src="{{ asset('images/buyers_profiles/' . ($favorite['gig']['buyer']['picture'] ?? 'default.jpg')) }}"
                                        alt="">
                                </a>
                                <a href="{{ route('sellerGigsProfile', $favorite['gig']['buyer']['id'] ?? '') }}">
                                    <p class="font-light text-blue text-[16px]">@ {{ $favorite['gig']['buyer']['username'] ?? 'N/A' }}</p>
                                </a>
                            </div>
                            <p class="text-[14px] text-gray-500 font-light">{{ $favorite['gig']['gig_name'] }}</p>
                        </div>
                    </div>
                    @endforeach

                </div>

                <div class=" flex justify-end ">
                    <a class="hover:text-green text-gray-500 underline text-[16px] font-light" href="{{ route('favorites.gigs', ['username' => $username]) }}">Ver todos</a>
                </div>

            </div>

            <!-- My Services -->
            <ul class="list-none border-[0.5px] border-blue border-opacity-50 rounded-[16px] p-6">

                <h3 class="font-semibold text-[22px] mb-4 text-blue">Mis Servicios</h3>

                @foreach ($gigs as $gig)
                <li class="flex items-center justify-between p-4 ">
                    <a href="{{ route('sellerGig', ['id' => $gig->id, 'username' => $username]) }}" class="block w-full cursor-pointer">
                        <div class="flex items-center gap-4">
                            <img class="w-16 h-16 object-cover rounded-md"
                                src="{{ asset('images/gigs/' . $gig->gig_image) }}" alt="{{ $gig->gig_name }}">


                            <div class="flex flex-col">
                                <span class="text-[16px] font-light text-black">{{ $gig->gig_name }}</span>
                                <div class="flex gap-2">

                                    <img class="w-4 h-4 mt-0.5" src="{{ asset('images/profile/star.png') }}" alt="Rating">
                                    <span class="text-primary font-semibold text-[15px]">4.9</span>
                                    <span class="text-gray-400 text-[15px]">(221)</span>
                                </div>

                                <div class="text-primary font-semibold text-[16px]">Desde ₡15,000</div>
                            </div>
                        </div>

                    </a>

                    <!-- Botones de editar y eliminar -->
                    <div class="flex gap-4">

                        <a href="{{ route('editGig', ['id' => $gig->id]) }}"
                            class="bg-blue-500 py-1 px-3 rounded hover:bg-blue-600 border-[1px] border-blue border-opacity-50 p-[10px] text-blue hover:text-white hover:bg-blue hover:border-blue transition-all duration-500">
                            Editar
                        </a>


                        <form action="{{ route('deleteGig', ['id' => $gig->id]) }}" method="POST"
                            onsubmit="return confirm('¿Estás seguro de que deseas eliminar este gig?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-blue-500 py-1 px-3 rounded hover:bg-blue-600  border-[1px] border-blue border-opacity-50  p-[10px] text-blue hover:text-white hover:bg-red-600 hover:border-red-600 transition-all duration-500 ">
                                Eliminar
                            </button>
                        </form>
                    </div>

                </li>
                <div class="h-[1px] bg-blue bg-opacity-50 w-full"></div>
                @endforeach
                <a href="{{ route('gigCreation', ['username' => $username]) }}" class="block w-full cursor-pointer">
                    <div class="flex wrap ">
                        <div class="mt-5 gap-2 w-full h-[10vh] border border-gray-400 bg-white flex place-content-center 
                    items-center rounded-md transition-all duration-500 ease-out hover:translate-y-[-5px] 
                        hover:bg-gray-300 hover:text-green">
                            <img class="w-[50px] h-[50px] cursor-pointer " src="{{ asset('images/profile/add.png') }}"
                                type="button">

                        </div>
                    </div>
                </a>

            </ul>

            @if($status == 0)
            <a href="{{ route('membership') }}" class="list-none border-[0.5px] hover:border-red-600 hover:border-2   border-blue border-opacity-50 rounded-[16px] p-6 cursor-pointer">
                <span class="font-semibold text-[22px] mb-4 text-blue">Membresía</span>
                <ul class="grid">
                    <span>Fecha de inicio: {{ $paymentDate }}</span>
                    <span>Fecha de expiración: {{ $trialExpirationDate }}</span>
                    <span>Estado: Expirado</span>
                </ul>
            </a>
            @else
            <div class="list-none border-[0.5px] border-blue hover:bg-green hover:translate-y-[-5px] transition-all duration-500 ease-out border-opacity-50 rounded-[16px] p-6 cursor-pointer">
                <span class="font-semibold text-[22px] mb-4 text-blue">Membresía</span>
                <ul class="grid">
                    <span>Fecha de inicio: {{ $paymentDate }}</span>
                    <span>Fecha de expiración: {{ $trialExpirationDate }}</span>
                    <span>Estado: Activo</span>
                </ul>
            </div>
            @endif

        </div>

    </div>
</div>
</div>

<script>
    profileButton = document.getElementById('profile-button');
    modal = document.getElementById('modal');
    changeButton = document.getElementById('change-button');
    const imageInput = document.getElementById('image-input');
    modalContent = document.getElementById('modal-content');
    modalChanges = document.getElementById('modal-changes');
    modalChangesImage = document.getElementById('modal-changes-image');
    modalDelete = document.getElementById('modal-delete');

    function showProfileButton() {
        profileButton.classList.remove('hidden');
        profileButton.classList.add('absolute');
    }

    function hideProfileButton() {
        profileButton.classList.remove('absolute');
        profileButton.classList.add('hidden');
    }

    function showFileChooser() {
        imageInput.click();
        modalContent.classList.add('hidden');
        modalChanges.classList.remove('hidden');
        modalChanges.classList.add('flex');
    }

    function openModal() {
        modal.classList.remove('hidden');
        modalContent.classList.remove('hidden');
        modalContent.classList.add('flex');
        modalChanges.classList.add('hidden');
    }

    function closeModal() {
        modal.classList.add('hidden');

    }

    function openDeleteModal() {
        modalContent.classList.add('hidden');
        modalDelete.classList.remove('hidden');
        modalDelete.classList.add('flex');
    }

    function closeDeleteModal() {
        modalDelete.classList.add('hidden');
        modalContent.classList.remove('hidden');
        modalContent.classList.add('flex');
    }

    imageInput.addEventListener('change', () => {
        const file = imageInput.files[0];
        if (file) {
            const reader = new FileReader();
            console.log(imageInput.files[0]);
            reader.onload = function(e) {
                modalChangesImage.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    })

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
@endsection