@extends('buyers.buyerLayout')

@section('content')
<div class="min-h-[90vh] min-w-[90vw] flex items-center justify-center mt-[100px]">
    <div class=" rounded-lg w-full  sm:max-w-4xl md:max-w-6xl lg:max-w-[90vw] grid md:grid-cols-2 gap-6 p-6">
        <!-- Left Column -->
        <div class="flex flex-col gap-[20px]">
            <!-- Profile Card -->
            <div class="border-[1px] border-blue border-opacity-50 rounded-[16px] p-[20px] relative">
                <!-- Edit button -->
                <button class="absolute top-4 right-4 text-gray-400">
                    <img src="{{ asset('icons/edit.svg') }}" alt="">
                </button>
                <!-- Edit button end -->

                <div class="flex flex-col items-center gap-[20px]">
                    <div class="relative flex items-start justify-center w-[120px] h-[120px]">
                        <div onmouseover="showProfileButton()" onmouseout="hideProfileButton()" id="picture-overlay" class="absolute rounded-full h-[120px] w-[120px] bg-transparent hover:bg-blue hover:bg-opacity-50 transition-all duration-500">
                            <button id="profile-button" onclick="openModal()" class="hidden top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]" >
                                <img src="{{ asset('icons/camera.svg') }}" alt="">
                            </button>
                        </div>
                        @if ($picture == null)
                            <img class="w-[120px] h-[120px] rounded-full bg-center object-cover" src="{{ asset('images/buyers_profiles/profile_placeholder.png') }}" alt="">
                        @else
                            <img class="w-[120px] h-[120px] rounded-full bg-center object-cover" src="{{ asset('images/buyers_profiles/' . $picture) }}" alt="">
                        @endif
                    </div>
                    <h2 class="mt-4 text-[22px] font-semibold text-blue">{{ $name }} {{ $lastname }}</h2>
                    <p class="text-blue text-[18px] font-light">{{ $username }}</p>
                    <div class="h-[1px] bg-blue bg-opacity-50 w-full"></div>
                </div>

                <div class="mt-6 space-y-2">
                    <div class="flex flex-col gap-[20px] items-center">
                        <div class="flex gap-[10px] w-full items-center justify-start">
                            <img src="{{ asset('icons/location.svg') }}" alt="">
                            <span class="font-light text-[16px]">{{ $cityName }},  {{ $provinceName }}, CR</span>
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

                <div class="flex items-center gap-[10px] mt-[20px] ">
                        <!-- Icono de Tranducción -->
                        <div class="flex flex-col gap-[20px]">
                            @foreach ($languages as $language)
                            <div class="flex gap-[10px]">
                                <img src="{{ asset('icons/translate_2.svg') }}" alt="">
                                <span class="font-light text-[16px]">{{ $language->language_name }} ({{ $language->level_name }})</span>
                                </div> 
                            @endforeach
                        </div>
                    </div>
            </div>
            <!-- Profile Card end -->

            <!-- Modal -->
            <form action="{{ route('buyers.updatePicture') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="modal" class="w-[100vw] h-[100vh] fixed hidden z-10 top-0 right-0 bg-blue bg-opacity-50 backdrop-blur-sm">
                    <div id="modal-content" class="fixed flex items-center flex-col gap-[40px] right-[50%] left-[50%] top-[50%] -translate-x-[50%] -translate-y-[50%] rounded-[16px] w-[30vw] max-sm:w-[90vw] max-sm:h-[70vh] h-[600px] bg-white p-[40px]">
                        
                        <button class="absolute p-[14px] rounded-bl-[10px] bg-blue right-0 top-0" onclick="closeModal()"><img src="{{ asset('icons/close.svg') }}"></button>    

                        <div class="flex items-start w-full flex-col">
                            <h5 class="text-[36px] text-blue font-medium">Imagen de perfil</h5>
                            <p class="text-[16px] text-slate-400 font-light">Selecciona una nueva imagen de tu perfil</p>
                        </div>

                        <img class="rounded-full w-[280px] h-[280px] max-sm:w-[180px] max-sm:h-[180px] bg-center object-cover" src="{{ asset('images/buyers_profiles/' . $picture) }}" alt="">

                        <div class="items-center justify-center flex gap-[20px] w-full">
                                <input class="hidden" name="picture" id="image-input" type="file" accept="image/*">
                                <button onclick="showFileChooser()" type="button" id="change-button" class="button px-[20px] py-[10px] rounded-[10px] text-blue font-semibold border-solid border-[1px] border-blue hover:translate-y-[-5px] transition-all duration-500 ease-out hover:bg-blue hover:text-white ">Cambiar</button>
                                <button type="button" class="button px-[20px] py-[10px] rounded-[10px] text-blue font-semibold border-solid border-[1px] border-blue hover:translate-y-[-5px] transition-all duration-500 ease-out hover:bg-blue hover:text-white ">Eliminar</button>
                        </div>
                    </div>

                    <div id="modal-changes" class="fixed hidden items-center flex-col gap-[40px] right-[50%] left-[50%] top-[50%] -translate-x-[50%] -translate-y-[50%] rounded-[16px] w-[30vw] max-sm:w-[90vw] max-sm:h-[70vh] h-[600px] bg-white p-[40px]">
                        
                        <button class="absolute p-[14px] rounded-bl-[10px] bg-blue right-0 top-0" onclick="closeModal()"><img src="{{ asset('icons/close.svg') }}"></button>    

                        <div class="flex items-start w-full flex-col">
                            <h5 class="text-[36px] text-blue font-medium">Desea guardar los cambios?</h5>
                            <p class="text-[16px] text-slate-400 font-light">Esta será tu nueva imagen de perfil</p>
                        </div>

                        <img id="modal-changes-image" class="rounded-full w-[280px] h-[280px] bg-center object-cover" src="{{ $picture }}" alt="">

                        <div class="items-center justify-center flex gap-[20px] w-full">
                            <button type="submit" class="button px-[20px] py-[10px] rounded-[10px] text-blue font-semibold border-solid border-[1px] border-blue hover:translate-y-[-5px] transition-all duration-500 ease-out hover:bg-blue hover:text-white ">Guardar cambios</button>
                            <button onclick="closeModal()" type="button" class="button px-[20px] py-[10px] rounded-[10px] text-blue font-semibold border-solid border-[1px] border-blue hover:translate-y-[-5px] transition-all duration-500 ease-out hover:bg-red-600 hover:border-red-600 hover:text-white ">Cancelar</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Modal end -->

            <!-- Settings -->
            <a class="flex w-full items-center gap-[10px] justify-center border-[1px] border-blue border-opacity-50 rounded-[12px] p-[10px] text-blue hover:text-white hover:bg-blue hover:border-blue transition-all duration-500 " href="{{ route('buyerProfileSettings') }}"><img src="{{ asset('icons/settings.svg') }}" alt="">Configuraciones</a>
            <!-- Settings end -->

            <!--Logout -->
            <a class="flex w-full items-center gap-[10px] justify-center border-[1px] border-blue border-opacity-50 rounded-[12px] p-[10px] text-blue hover:text-white hover:bg-red-600 hover:border-red-600 transition-all duration-500 " href="{{ route('login.logout') }}"><img src="{{ asset('icons/leave.svg') }}" alt="">Cerrar sesión</a>
            <!--Logout end -->

            <!-- Note -->
            <p class="text-[16px] text-gray-500">
                Actualmente estás en tu perfil de comprador. Para acceder a tu perfil de vendedor, <a href="#" class="underline hover:text-green"> cambia a modo vendedor</a>
            </p>
            <!-- Note end -->

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
                        <img src="https://i0.wp.com/lamiradafotografia.es/wp-content/uploads/2014/07/foto-perfil-psicologo-180x180.jpg?resize=180%2C180" alt="" class="rounded-full w-[30px] h-[30px] bg-cover object-fill">
                        <div class="flex gap-[10px]">
                            <span class=" font-light text-[#132D46]">@corralesjonathan</span>
                            <img src="{{ asset('icons/liked.svg') }}" alt="">
                        </div>
                    </div>

                    <div class="flex gap-[10px] items-center">
                        <img src="https://media.istockphoto.com/id/1326417862/es/foto/mujer-joven-riendo-mientras-se-relaja-en-casa.jpg?s=612x612&w=0&k=20&c=BQHE9M8b6hixE_TB1XzuvxobnyD4ylKMTprVbrhPxOU=" alt="" class="rounded-full w-[30px] h-[30px] bg-cover object-fill">
                        <div class="flex gap-[10px]">
                            <span class=" font-light text-[#132D46]">@lucia_rodrigueza</span>
                            <img src="{{ asset('icons/liked.svg') }}" alt="">
                        </div>
                    </div>

                    <div class="flex gap-[10px] items-center">
                        <img src="https://media.istockphoto.com/id/1200677760/es/foto/retrato-de-apuesto-joven-sonriente-con-los-brazos-cruzados.jpg?s=612x612&w=0&k=20&c=RhKR8pxX3y_YVe5CjrRnTcNFEGDryD2FVOcUT_w3m4w=" alt="" class="rounded-full w-[30px] h-[30px] bg-cover object-fill">
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
                        <img src="https://fiverr-res.cloudinary.com/t_gig_cards_web,q_auto,f_auto/gigs/312842484/original/3d1263366a69d9b04cd979b7697966eff112122f.jpg" alt="Service" class="w-[80px] h-[60px] rounded-[10px] border-[0.5px] border-blue border-opacity-50 bg-cover object-cover">
                        <div class="flex flex-col gap-[5px]">   
                            <div class="flex items-center gap-[5px]">
                                <img class="w-[30px] h-[30px] rounded-full bg-cover object-fill" src="https://i0.wp.com/lamiradafotografia.es/wp-content/uploads/2014/07/foto-perfil-psicologo-180x180.jpg?resize=180%2C180" alt="">
                                <p class="font-light text-blue text-[16px]">@michael_vargas</p>
                            </div>
                            <p class="text-[14px] text-gray-500 font-light">Crearé un logo de marca profesional para tu negocio</p>
                        </div> 
                    </div>

                    



                </div>
                
                <div class=" flex justify-end ">
                    <a class="hover:text-green text-gray-500 underline text-[16px] font-light" href="">Ver todos</a>
                </div>

            </div>
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
</script>
@endsection