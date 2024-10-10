@extends('buyers.layout')

@section('content')
<div class="w-[90vw] bg-bg flex justify-center mt-[100px] m-auto">
    <div class="bg-bg rounded-lg w-full grid grid-cols-2 gap-[20px] max-sm:grid-cols-1">

        <!-- column left-->
        <div class="flex flex-col justify-start items-start gap-[20px] py-[20px]">
            <a class="flex w-full items-center gap-[10px] justify-center border-[1px] border-blue border-opacity-50 rounded-[12px] p-[10px] text-white bg-blue transition-all duration-500 hover:translate-y-[-5px]">Cuenta</a>
            <a class="flex w-full items-center gap-[10px] justify-center border-[1px] border-blue border-opacity-50 rounded-[12px] p-[10px] text-blue hover:text-white hover:bg-blue hover:border-blue transition-all duration-500 hover:translate-y-[-5px] " href="{{ route('buyerProfileSettingsSecurity', ['username' => $username]) }}">Seguridad</a>
            <a class="text-[16px] text-blue underline hover:text-green transition-all duration-500 ease-out" href="{{ route('buyerProfile', ['username' => $username]) }}">🡠 Ir a mi perfil</a>

            <!-- message -->
            @if ($message = Session::get('success'))
            <div class="bg-[#DCFCE7] border-[1px] border-[#4ADE80] text-[#15763D] px-4 py-3 rounded-[10px] text-center w-full" role="alert">
                <p>{{ $message }}</p>
            </div>
            @endif


            <!-- error -->
            @if ($message = Session::get('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-[10px]  text-center w-full" role="alert">
                <p>{{ $message }}</p>
            </div>
            @endif
        </div>

        <!--column right -->
        <div class="w-full flex-col flex py-[20px] gap-[20px]">
            <!-- Personal information -->
            <form action="{{ route('buyers.updatePersonalInfo', ['username' => $username]) }}" method="POST" class="w-full flex flex-col p-[20px] gap-[20px] border-[0.5px] border-solid border-blue border-opacity-50 rounded-[16px]">
                @csrf
                <h4 class="text-[22px] text-blue font-semibold">Información personal</h4>
                <!-- name -->
                <div class="flex items-center justify-between">
                    <label for="name" class="text-[14px] font-light">NOMBRE</label>
                    <input type="text" name="name" id="name" value="{{ $name }}" placeholder="{{ $name }}" class="outline-none bg-transparent border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] w-[80%]">
                </div>
                <!-- lastname -->
                <div class="flex items-center justify-between">
                    <label for="lastname" class="text-[14px] font-light">APELLIDOS</label>
                    <input type="text" name="lastname" id="lastname" value="{{ $lastname }}" placeholder="{{ $lastname }}" class="outline-none bg-transparent border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] w-[80%]">
                </div>
                <!-- username -->
                <div class="flex items-center justify-between">
                    <label for="username" class="text-[14px] font-light">USERNAME</label>
                    <input type="text" name="username" id="username" value="{{ $username }}" placeholder="{{ $username }}" class="outline-none bg-transparent border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] w-[80%]">
                </div>
                <!-- email -->
                <div class="flex items-center justify-between">
                    <label for="email" class="text-[14px] font-light">EMAIL</label>
                    <input type="text" name="email" id="email" value="{{ $email }}" placeholder="{{ $email }}" class="outline-none bg-transparent border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] w-[80%]">
                </div>

                <!-- save changes -->
                <div class="items-center justify-end flex w-full">
                    <button type="submit" class="w-fit bg-green rounded-[10px] p-[10px] text-white font-semibold text-[14px] hover:translate-y-[-5px] transition-all duration-500 ease-out">Guardar cambios</button>
                </div>
            </form>
            <!-- Personal information end -->

            <!-- Contact information -->
            <form action="{{ route('buyers.updateContactInfo', ['username' => $username]) }}" method="POST" class="w-full flex flex-col p-[20px] gap-[20px] border-[0.5px] border-solid border-blue border-opacity-50 rounded-[16px]">
                @csrf
                <h4 class="text-[22px] text-blue font-semibold">Contacto</h4>
                <!-- phone -->
                <div class="flex items-center justify-between">
                    <label for="phone" class="text-[14px] font-light">TELEFÓNO</label>
                    <div class="flex items-center justify-between w-[80%] gap-[20px]">
                        <input type="text" readonly value="+506" class="outline-none bg-transparent border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] w-[20%]">
                        <input type="tel" name="phone" id="phone" value="{{ $phone }}" placeholder="{{ $phone }}" class="outline-none bg-transparent border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] w-[80%]">
                    </div>
                </div>

                <!-- save changes -->
                <div class="items-center justify-end flex w-full">
                    <button type="submit" class="w-fit bg-green rounded-[10px] p-[10px] text-white font-semibold text-[14px] hover:translate-y-[-5px] transition-all duration-500 ease-out">Guardar cambios</button>
                </div>
            </form>
            <!-- Contact information end -->

            <!-- Languages -->
            <form action="{{ route('buyers.updateLanguages', ['username' => $username]) }}" method="POST" id="languages-form" class="w-full flex flex-col p-[20px] gap-[20px] border-[0.5px] border-solid border-blue border-opacity-50 rounded-[16px]">
                @csrf
                <h4 class="text-[22px] text-blue font-semibold">Idiomas</h4>

                <!-- Languages from User (User's registered languages) -->
                <div id="user-languages-container">
                    @foreach ($userLanguages as $userLanguage)
                    <div class="language-item flex items-center gap-[20px] my-[20px]">
                        <select name="language_ids[]" class="text-[14px] font-light uppercase outline-none bg-transparent border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] w-full">
                            <option class="text-[14px] font-light uppercase" value="{{ $userLanguage->language_id }}" selected>{{ $userLanguage->language_name }}</option>
                            @foreach ($languages as $optionLanguage)
                            <option class="text-[14px] font-light uppercase" value="{{ $optionLanguage->id }}">{{ $optionLanguage->language }}</option>
                            @endforeach
                        </select>

                        <select name="level[]" class="text-[14px] font-light uppercase outline-none bg-transparent border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] w-full">
                            <option class="text-[14px] font-light uppercase" value="{{ $userLanguage->level_id }}" selected>{{ $userLanguage->level_name }}</option>
                            @foreach ($levels as $level)
                            <option class="text-[14px] font-light uppercase" value="{{ $level->id }}">{{ $level->level }}</option>
                            @endforeach
                        </select>

                        <button type="button" class="remove-language"><img class="w-[26px]" src="{{ asset('icons/close-blue.svg') }}" alt="Eliminar idioma"></button>
                    </div>
                    @endforeach
                </div>

                <!-- Dynamic Languages (Newly added languages) -->
                <div id="new-languages-container">
                    <div class="language-item flex items-center gap-[20px] my-[20px]">
                        <select name="language_ids[]" class="text-[14px] font-light uppercase outline-none bg-transparent border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] w-full">
                            <option class="text-[14px] font-light uppercase" value="" disabled selected>Nuevo idioma</option>
                            @foreach ($languages as $language)
                            <option class="text-[14px] font-light uppercase" value="{{ $language->id }}">{{ $language->language }}</option>
                            @endforeach
                        </select>

                        <select name="level[]" class="text-[14px] font-light uppercase outline-none bg-transparent border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] w-full">
                            <option class="text-[14px] font-light uppercase" value="" disabled selected>Selecciona el nivel</option>
                            @foreach ($levels as $level)
                            <option class="text-[14px] font-light uppercase" value="{{ $level->id }}">{{ $level->level }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>

                <!-- Add new language button -->
                <div class="items-end justify-center flex flex-col w-full gap-[10px]">
                    <button type="button" id="add-language" class="text-[14px] p-[10px] font-light underline hover:text-green transition-all duration-500 ease-out">Agregar nuevo</button>
                    <button type="submit" class="w-fit bg-green rounded-[10px] p-[10px] text-white font-semibold text-[14px] hover:translate-y-[-5px] transition-all duration-500 ease-out">Guardar cambios</button>
                </div>
            </form>

            <!-- Languages end -->

            <!-- location -->
            <form action="{{ route('buyers.updateLocation', ['username' => $username]) }}" method="POST" class="w-full flex flex-col p-[20px] gap-[20px] border-[0.5px] border-solid border-blue border-opacity-50 rounded-[16px]">
                @csrf
                <h4 class="text-[22px] text-blue font-semibold">Ubicación</h4>

                <div class="flex items-center gap-[20px]">
                    <!-- Selector de Provincias -->
                    <select name="province" id="province" class="text-[14px] font-light uppercase outline-none bg-transparent border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] w-full">
                        <option selected disabled class="text-[14px] font-light uppercase" value=""> {{$userProvince }}</option>
                        @foreach ($provinces as $province)
                        <option class="text-[14px] font-light uppercase" value="{{ $province->id }}">{{ $province->province }}</option>
                        @endforeach
                    </select>

                    <!-- Selector de Ciudades -->
                    <select name="city" id="city" class="text-[14px] font-light uppercase outline-none bg-transparent border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] w-full">
                        <option selected disabled class="text-[14px] font-light uppercase" value="">{{$userCity }}</option>
                        @foreach ($cities as $city)
                        <option class="text-[14px] font-light uppercase" value="{{ $city->id }}">{{ $city->city }}</option>
                        @endforeach
                    </select>

                    <button class="submit"><img class="w-[26px]" src="{{ asset('icons/close-blue.svg') }}" alt=""></button>
                </div>


                <!-- save changes -->
                <div class="items-end justify-center flex flex-col w-full gap-[10px]">
                    <button class="w-fit bg-green rounded-[10px] p-[10px] text-white font-semibold text-[14px] hover:translate-y-[-5px] transition-all duration-500 ease-out">Guardar cambios</button>
                </div>
            </form>
            <!-- location end -->


            <!-- Desactive account -->
            <form action="{{ route('buyers.desactivateAccount', ['username' => $username]) }}" method="POST" class="w-full flex flex-col p-[20px] gap-[20px] border-[0.5px] border-solid border-blue border-opacity-50 rounded-[16px]">
                @csrf
                <h4 class="text-[22px] text-blue font-semibold">Desactivar cuenta</h4>
                <!-- desactive reason -->
                <div class="flex flex-col items-start justify-center gap-[20px]">
                    <p class="text-[14px] font-medium">¿Qué pasa si desactivas tu cuenta?</p>
                    <p class="text-[14px] font-light"> - Tu perfil no se mostrará más en Ticolancer.<br>
                        - Tus datos serán eliminados.<br>
                        - No podrás reactivar tu cuenta.</p>
                    <div class="flex items-center justify-between w-full">
                        <label for="reason" class="text-[14px] font-light">Quiero salir porque...</label>
                        <select name="reason" id="reason" class="text-[14px] font-light outline-none bg-transparent border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] w-full">
                            <option class="text-[14px] font-light" value="Basic">No tengo tiempo</option>
                            <option class="text-[14px] font-light" value="Basic">No me sirve el sitio</option>
                            <option class="text-[14px] font-light" value="Basic">No me sirve la app</option>
                            <option class="text-[14px] font-light" value="Basic">Otro</option>
                        </select>
                    </div>
                </div>

                <!-- save changes -->
                <div class="items-end justify-center flex flex-col w-full gap-[10px]">
                    <button type="submit" class="w-fit bg-red-600 rounded-[10px] p-[10px] text-white font-semibold text-[14px] hover:translate-y-[-5px] transition-all duration-500 ease-out">Desactivar</button>
                </div>

            </form>
            <!-- Desactive account end -->
        </div>



    </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const languagesContainer = document.getElementById('new-languages-container');
    const addLanguageButton = document.getElementById('add-language');

    // Evento para agregar nuevo idioma
    addLanguageButton.addEventListener('click', function() {
        const languageItem = document.querySelector('.language-item').cloneNode(true);

        // Resetear valores de selects para que el usuario seleccione nuevos valores
        languageItem.querySelector('select[name="language_ids[]"]').value = '';
        languageItem.querySelector('select[name="level[]"]').value = '';

        // Agregar evento para remover el idioma agregado
        languageItem.querySelector('.remove-language').addEventListener('click', function() {
            languageItem.remove();
        });

        languagesContainer.appendChild(languageItem);
    });

    // Remover idioma existente
    document.querySelectorAll('.remove-language').forEach(function(button) {
        button.addEventListener('click', function() {
            this.parentElement.remove();
        });
    });
});

</script>