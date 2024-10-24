@extends('ticolancer.layout')
@section('content')
    <div class="grid grid-cols-2 max-sm:grid-cols-1 bg-blue h-screen w-full">
        <div style="background-image: url(https://i.postimg.cc/VknftBhX/image.jpg);"
            class="flex flex-col justify-center items-start bg-no-repeat bg-cover bg-center px-[120px] gap-[20px] max-sm:hidden">
            <h1 class="w-fit text-[62px] max-sm:text-[48px] font-light font-main text-white">Bienvenido a <span
                    class="font-secondary text-white    ">Ticolancer</span></h1>
            <p class="text-[22px] max-sm:text-[14px] font-light text-white">Registrate y empieza a crecer con nosotros.</p>
        </div>
        <div
            class="flex flex-col justify-center items-center px-[120px] gap-[20px] max-sm:px-0 max-sm:w-[90vw] max-sm:m-auto">
            <form class="w-full flex flex-col gap-[20px]" action="{{ route('signup.store') }} " method="POST">
                @csrf
                {{-- Step 1 --}}
                <div id="step-1" class="flex flex-col items-start w-full gap-[20px]">
                    <img class="w-[200px]" src="{{ asset('images/signup/account.png') }}" alt="">
                    <h2 class="text-white text-[24px] font-light">1. Crea una cuenta</h2>
                    <input id="email" name="email" type="text" placeholder="Email"
                        class="placeholder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-white text-[16px] font-regular  outline-none">
                    <input oninput="checkPasswordMatch(), checkPasswordCharacters()" id="password" name="password"
                        type="password" placeholder="Contraseña"
                        class="placeholder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-white text-[16px] font-regular  outline-none">
                    <input oninput="checkPasswordMatch()" id="password_confirmation" name="password_confirmation"
                        type="password" placeholder="Confirmar contraseña"
                        class="placeholder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-white text-[16px] font-regular  outline-none">
                    <div id="alert"
                        class="hidden w-full p-[10px] justify-between bg-red-100 border-[1px] border-red-300 rounded-[10px]">
                        <p id="alert-text" class="text-red-600">Las contraseñas no coinciden</p>
                    </div>
                    <input onclick="nextStep(1)" type="button" value="Siguiente "
                        class="rounded-[10px] cursor-pointer transition-all duration-500 ease-out hover:translate-y-[-5px] hover:bg-green hover:text-white w-full bg-white px-[20px] py-[10px] text-blue text-[16px] font-semibold  outline-none">
                    <div id="check-password" class="text-red-600 text-[12px] flex flex-col p-[10px] justify-between">
                        <p id="password-length">- La contraseña debe ser de al menos 8 caracteres</p>
                        <p id="password-uppercase">- Una mayuscula</p>
                        <p id="password-lowercase">- Una minuscula</p>
                        <p id="password-number">- Un numero</p>
                        <p id="password-special">- Un caracter especial</p>
                    </div>
                </div>
                {{-- Step 1 end --}}

                {{-- Step 2 --}}
                <div id="step-2" class="hidden flex-col w-full gap-[20px] items-center">
                    <img class="w-[200px]" src="{{ asset('images/signup/account.png') }}" alt="">
                    <h2 class="text-white text-[24px] font-light">2. Crea tu perfil</h2>
                    <input id="username" name="username" type="text" placeholder="Username"
                        class="placeholder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-white text-[16px] font-regular  outline-none">
                    <input id="name" name="name" type="text" placeholder="Nombre"
                        class="placeholder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-white text-[16px] font-regular  outline-none">
                    <input id="lastname" name="lastname" type="text" placeholder="Apellidos"
                        class="placehotext-slate-400lder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-white text-[16px] font-regular  outline-none">
                    <div class="flex flex-row w-full gap-[20px]">
                        <input onclick="prevStep(2)" type="button" value="Atrás "
                            class="rounded-[10px] cursor-pointer transition-all duration-500 ease-out hover:translate-y-[-5px] hover:bg-green hover:border-green w-full px-[20px] py-[10px] text-white border-[1px] border-solid border-white text-[16px] font-semibold  outline-none">
                        <input onclick="nextStep(2)" type="button" value="Siguiente "
                            class="rounded-[10px] cursor-pointer transition-all duration-500 ease-out hover:translate-y-[-5px] hover:bg-green hover:text-white w-full bg-white px-[20px] py-[10px] text-blue text-[16px] font-semibold  outline-none">
                    </div>
                </div>

                {{-- Step 2 end --}}

                {{-- Step 3 --}}
                <div id="step-3" class="hidden flex-col w-full gap-[20px] items-center">
                    <img class="w-[200px]" src="{{ asset('images/signup/contact.png') }}" alt="">
                    <h2 class="text-white text-[24px] font-light">3. Informacion de contacto</h2>
                    <div class="flex flex-row w-full gap-[20px]">
                        <input value="+506" readonly
                            class="placeholder:text-slate-400 flex w-[25%] border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-white text-[16px] font-regular  outline-none">
                        <input id="phone" name="phone" type="tel" maxlength="15" placeholder="Teléfono"
                            class="placeholder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-white text-[16px] font-regular  outline-none">
                    </div>
                    <div class="flex flex-row w-full gap-[20px]">
                        <input onclick="prevStep(3)" type="button" value="Atrás "
                            class="rounded-[10px] cursor-pointer transition-all duration-500 ease-out hover:translate-y-[-5px] hover:bg-green hover:border-green w-full px-[20px] py-[10px] text-white border-[1px] border-solid border-white text-[16px] font-semibold  outline-none">
                        <input onclick="nextStep(3)" type="button" value="Siguiente "
                            class="rounded-[10px] cursor-pointer transition-all duration-500 ease-out hover:translate-y-[-5px] hover:bg-green hover:text-white w-full bg-white px-[20px] py-[10px] text-blue text-[16px] font-semibold  outline-none">
                    </div>
                </div>
                {{-- Step 3 end --}}

                {{-- Step 4 --}}
                <div id="step-4" class="hidden flex-col items-center w-full gap-[20px]">
                    <img class="w-[200px]" src="{{ asset('images/signup/location.png') }}" alt="">
                    <h2 class="text-white text-[24px] font-light">4. Donde te encuentras</h2>
                    <div class="flex flex-row w-full gap-[20px]">
                        <select name="province" id="province"
                            class="placeholder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-[16px] font-regular outline-none text-white">
                            <option selected disabled value="">Provincia</option>
                            @foreach ($provinces as $province)
                                <option class="text-blue bg-white" value="{{ $province->id }}">{{ $province->province }}
                                </option>
                            @endforeach
                        </select>

                        <select name="city" id="city"
                            class="placeholder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-[16px] font-regular outline-none text-white">
                            <option selected disabled value="">Ciudad</option>
                        </select>

                    </div>

                    <div class="flex flex-row w-full gap-[20px]">
                        <input onclick="prevStep(4)" type="button" value="Atrás "
                            class="rounded-[10px] cursor-pointer transition-all duration-500 ease-out hover:translate-y-[-5px] hover:bg-green hover:border-green w-full px-[20px] py-[10px] text-white border-[1px] border-solid border-white text-[16px] font-semibold  outline-none">
                        <input onclick="nextStep(4)" type="button" value="Siguiente "
                            class="rounded-[10px] cursor-pointer transition-all duration-500 ease-out hover:translate-y-[-5px] hover:bg-green hover:text-white w-full bg-white px-[20px] py-[10px] text-blue text-[16px] font-semibold  outline-none">
                    </div>

                </div>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $('#province').on('change', function() {
                            var provinceId = $(this).val();
                            if (provinceId) {
                                $.ajax({
                                    url: '/signup/get-cities/' + provinceId,
                                    type: 'GET',
                                    dataType: 'json',
                                    success: function(data) {
                                        $('#city').empty().append(
                                            '<option selected disabled value="">Ciudad</option>');
                                        $.each(data, function(key, city) {
                                            $('#city').append(
                                                '<option class="text-blue bg-white" value="' +
                                                city.id + '">' + city.city + '</option>');
                                        });
                                    }
                                });
                            } else {
                                $('#city').empty().append('<option selected disabled value="">Ciudad</option>');
                            }
                        });
                    });
                </script>
                {{-- Step 4 end --}}

                {{-- Step 5 --}}
                <div id="step-5" class="hidden flex-col items-center w-full gap-[20px]">
                    <img class="w-[200px]" src="{{ asset('images/signup/location.png') }}" alt="">
                    <h2 class="text-white text-[24px] font-light">5. Tus idiomas</h2>
                    <div class="flex flex-row w-full gap-[20px]">

                        <select name="language" id="language"
                            class="placeholder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px]  text-[16px] font-regular  outline-none text-white">
                            <option selected disabled value="">Lenguage</option>
                            @foreach ($languages as $language)
                                <option class="text-blue bg-white" value="{{ $language->id }}">{{ $language->language }}
                                </option>
                            @endforeach
                        </select>

                        <select name="level" id="level"
                            class="placeholder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px]  text-[16px] font-regular  outline-none text-white">
                            <option selected disabled value="">Nivel</option>
                            @foreach ($levels as $level)
                                <option class="text-blue bg-white" value="{{ $level->id }}">{{ $level->level }}
                                </option>
                            @endforeach
                        </select>

                    </div>

                    <div class="flex flex-row w-full gap-[20px]">
                        <input onclick="prevStep(5)" type="button" value="Atrás "
                            class="rounded-[10px] cursor-pointer transition-all duration-500 ease-out hover:translate-y-[-5px] hover:bg-green hover:border-green w-full px-[20px] py-[10px] text-white border-[1px] border-solid border-white text-[16px] font-semibold  outline-none">
                        <input type="submit" value="Enviar "
                            class="rounded-[10px] cursor-pointer transition-all duration-500 ease-out hover:translate-y-[-5px] hover:bg-green hover:text-white w-full bg-white px-[20px] py-[10px] text-blue text-[16px] font-semibold  outline-none">
                    </div>

                </div>
                {{-- Step 5 end --}}


                @if ($message = Session::get('error'))
                    <div id="error"
                        class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-[10px] relative text-center"
                        role="alert">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                @if ($message = Session::get('warning'))
                    <div id="warning"
                        class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded-[10px]  text-center w-full"
                        role="alert">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <p class="text-center text-[14px] text-white">¿Ya tienes cuenta? <a href="{{ route('login') }}"
                        class="text-white underline">Inicia sesión</a></p>
            </form>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
    const password = document.getElementById('password');
    const password_confirmation = document.getElementById('password_confirmation');
    const alert = document.getElementById('alert');

    const checkPassword = document.getElementById('check-password');
    const passwordLength = document.getElementById('password-length');
    const passwordUppercase = document.getElementById('password-uppercase');
    const passwordLowercase = document.getElementById('password-lowercase');
    const passwordNumber = document.getElementById('password-number');
    const passwordSpecial = document.getElementById('password-special');

    let currentStep = 1;

    // Asignar eventos a los campos de entrada
    password.oninput = function() {
        checkPasswordMatch();
        checkPasswordCharacters();
    };

    password_confirmation.oninput = checkPasswordMatch;

    // Agregar un evento para el manejo de la tecla Enter
    document.querySelectorAll('input[type="text"], input[type="password"], input[type="tel"], select')
        .forEach(function(input) {
            input.addEventListener('keypress', function(event) {
                if (event.key === 'Enter') {
                    if (currentStep < 5) { // Evita el envío del formulario en pasos que no son el último
                        event.preventDefault(); 
                        nextStep(currentStep); 
                    } else {
                        // Enviar el formulario si estamos en el último paso
                        document.querySelector('form').submit();
                    }
                }
            });
        });

    window.nextStep = function(step) { // Hacer la función global
        if (step === 1) {
            const isPasswordValid = checkPasswordCharacters();
            checkPasswordMatch();

            if (!isPasswordValid || alert.classList.contains('flex')) {
                return; // No avanzar si no es válido o hay error
            }
        }

        // Avanza al siguiente paso
        document.getElementById(`step-${step}`).classList.add('hidden');
        document.getElementById(`step-${step + 1}`).classList.remove('hidden', 'flex', 'flex-col', 'w-full', 'gap-[20px]');
        document.getElementById(`step-${step + 1}`).classList.add('flex', 'flex-col', 'w-full', 'gap-[20px]');

        currentStep = step + 1; // Actualiza currentStep
    };

    window.prevStep = function(step) { // Hacer la función global
        document.getElementById(`step-${step}`).classList.add('hidden');
        document.getElementById(`step-${step - 1}`).classList.remove('hidden', 'flex', 'flex-col', 'w-full', 'gap-[20px]');
        document.getElementById(`step-${step - 1}`).classList.add('flex', 'flex-col', 'w-full', 'gap-[20px]');
    };

    function checkPasswordMatch() {
        if (password.value !== password_confirmation.value) {
            alert.classList.add('flex');
            alert.classList.remove('hidden');
        } else {
            alert.classList.remove('flex');
            alert.classList.add('hidden');
        }
    }

            function checkPasswordCharacters() {
                let isValid = true;

                if (password.value.length >= 8) {
                    passwordLength.classList.remove('text-red-600');
                    passwordLength.classList.add('text-[#4ADE80]');
                } else {
                    passwordLength.classList.remove('text-[#4ADE80]');
                    passwordLength.classList.add('text-red-600');
                    isValid = false;
                }

                if (/[A-Z]/.test(password.value)) {
                    passwordUppercase.classList.remove('text-red-600');
                    passwordUppercase.classList.add('text-[#4ADE80]');
                } else {
                    passwordUppercase.classList.remove('text-[#4ADE80]');
                    passwordUppercase.classList.add('text-red-600');
                    isValid = false;
                }

                if (/[a-z]/.test(password.value)) {
                    passwordLowercase.classList.add('text-[#4ADE80]');
                    passwordLowercase.classList.remove('text-red-600');
                } else {
                    passwordLowercase.classList.remove('text-[#4ADE80]');
                    passwordLowercase.classList.add('text-red-600');
                    isValid = false;
                }

                if (/[0-9]/.test(password.value)) {
                    passwordNumber.classList.add('text-[#4ADE80]');
                    passwordNumber.classList.remove('text-red-600');
                } else {
                    passwordNumber.classList.remove('text-[#4ADE80]');
                    passwordNumber.classList.add('text-red-600');
                    isValid = false;
                }

                if (/[^A-Za-z0-9]/.test(password.value)) {
                    passwordSpecial.classList.add('text-[#4ADE80]');
                    passwordSpecial.classList.remove('text-red-600');
                } else {
                    passwordSpecial.classList.remove('text-[#4ADE80]');
                    passwordSpecial.classList.add('text-red-600');
                    isValid = false;
                }

                return isValid;
            }
        });
    </script>

  
@endsection
