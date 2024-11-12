@extends('buyers.layout')

@section('content')
<div class="min-h-[90vh] min-w-[90vw] flex items-center justify-center mt-[140px]">
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

                        <div class="flex w-[50%] justify-between">
                            <a href="{{$sellerFacebook}}" class="flex gap-[10px] items-center">
                                <img src="{{ asset('icons/facebook.svg') }}" alt="Facebook" class="w-[34px] h-[34px]" />
                            </a>
                            <a href="{{$sellerLinkedin}}" class="flex gap-[10px] items-center">
                                <img src="{{ asset('icons/linkedin.svg') }}" alt="Facebook" class="w-[34px] h-[34px]" />
                            </a>
                            <a href="{{$sellerInstagram}}" class="flex gap-[10px] items-center">
                                <img src="{{ asset('icons/instagram.svg') }}" alt="Facebook"
                                    class="w-[34px] h-[34px]" />
                            </a>
                            <a href="{{$sellerTwitter}}" class="flex gap-[10px] items-center">
                                <img src="{{ asset('icons/twitter.svg') }}" alt="Facebook" class="w-[34px] h-[34px]" />
                            </a>
                            <a href="{{$sellerWebsite}}" class="flex gap-[10px] items-center">
                                <img src="{{ asset('icons/internet.svg') }}" alt="Facebook" class="w-[34px] h-[34px]" />
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
                    <div class="flex gap-[10px] items-center">
                        <img src="https://i0.wp.com/lamiradafotografia.es/wp-content/uploads/2014/07/foto-perfil-psicologo-180x180.jpg?resize=180%2C180"
                            alt="" class="rounded-full w-[30px] h-[30px] bg-cover object-fill">
                        <div class="flex gap-[10px]">
                            <span class=" font-light text-[#132D46]">@corralesjonathan</span>
                            <img src="{{ asset('icons/liked.svg') }}" alt="">
                        </div>
                    </div>

                    <div class="flex gap-[10px] items-center">
                        <img src="https://media.istockphoto.com/id/1326417862/es/foto/mujer-joven-riendo-mientras-se-relaja-en-casa.jpg?s=612x612&w=0&k=20&c=BQHE9M8b6hixE_TB1XzuvxobnyD4ylKMTprVbrhPxOU="
                            alt="" class="rounded-full w-[30px] h-[30px] bg-cover object-fill">
                        <div class="flex gap-[10px]">
                            <span class=" font-light text-[#132D46]">@lucia_rodrigueza</span>
                            <img src="{{ asset('icons/liked.svg') }}" alt="">
                        </div>
                    </div>

                    <div class="flex gap-[10px] items-center">
                        <img src="https://media.istockphoto.com/id/1200677760/es/foto/retrato-de-apuesto-joven-sonriente-con-los-brazos-cruzados.jpg?s=612x612&w=0&k=20&c=RhKR8pxX3y_YVe5CjrRnTcNFEGDryD2FVOcUT_w3m4w="
                            alt="" class="rounded-full w-[30px] h-[30px] bg-cover object-fill">
                        <div class="flex gap-[10px]">
                            <span class=" font-light text-[#132D46]">@felipe_vargas.rg</span>
                            <img src="{{ asset('icons/liked.svg') }}" alt="">
                        </div>
                    </div>

                </div>

                <div class=" flex justify-end ">
                    <a class="hover:text-green text-gray-500 underline text-[16px] font-light" href="">Ver todos</a>
                </div>
            </div>



            <!-- Favorite Services -->
            <div class="border-[0.5px] border-blue border-opacity-50 rounded-[16px] p-6">
                <h3 class="font-semibold text-[22px] mb-4 text-blue">Servicios favoritos</h3>
                <div class="space-y-4">

                    <div class="flex items-start gap-[20px]">
                        <img src="https://fiverr-res.cloudinary.com/t_gig_cards_web,q_auto,f_auto/gigs/312842484/original/3d1263366a69d9b04cd979b7697966eff112122f.jpg"
                            alt="Service"
                            class="w-[80px] h-[60px] rounded-[10px] border-[0.5px] border-blue border-opacity-50 bg-cover object-cover">
                        <div class="flex flex-col gap-[5px]">
                            <div class="flex items-center gap-[5px]">
                                <img class="w-[30px] h-[30px] rounded-full bg-cover object-fill"
                                    src="https://i0.wp.com/lamiradafotografia.es/wp-content/uploads/2014/07/foto-perfil-psicologo-180x180.jpg?resize=180%2C180"
                                    alt="">
                                <p class="font-light text-blue text-[16px]">@michael_vargas</p>
                            </div>
                            <p class="text-[14px] text-gray-500 font-light">Crearé un logo de marca profesional para tu
                                negocio</p>
                        </div>
                    </div>
                </div>

                <div class=" flex justify-end ">
                    <a class="hover:text-green text-gray-500 underline text-[16px] font-light" href="">Ver todos</a>
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