@extends('ticolancer.layout')
@section ('content')
<div class="grid grid-cols-2 max-sm:grid-cols-1 bg-blue h-screen w-full">
        <div style="background-image: url(https://i.postimg.cc/VknftBhX/image.jpg);" class="flex flex-col justify-center items-start bg-no-repeat bg-cover bg-center px-[120px] gap-[20px] max-sm:hidden">
        <h1 class="w-fit text-[62px] max-sm:text-[48px] font-light font-main text-white">Bienvenido a <span class="font-secondary text-white    ">Ticolancer</span></h1>
            <p class="text-[22px] max-sm:text-[14px] font-light text-white">Registrate y empieza a crecer con nosotros.</p>
        </div>
        <div class="flex flex-col justify-center items-center px-[120px] gap-[20px] max-sm:px-0 max-sm:w-[90vw] max-sm:m-auto">
            <form class="w-full flex flex-col gap-[20px]" action="{{ route('signup.store') }} " method="POST">
                @csrf
                {{--Step 1--}}
                    <div id="step-1" class="flex flex-col w-full gap-[20px]">
                        <h2 class="text-white text-[24px] font-light">1. Crea una cuenta</h2>
                        <input oninput="hideMessage()" id="email" name="email" type="text" placeholder="Email" class="placeholder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-white text-[16px] font-regular  outline-none">
                        <input oninput="checkPassword(), hideMessage()" id="password" name="password" type="password" placeholder="Contraseña" class="placeholder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-white text-[16px] font-regular  outline-none">
                        <input oninput="checkPassword(), hideMessage()" id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirmar contraseña" class="placeholder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-white text-[16px] font-regular  outline-none">
                        <input onclick="nextStep(1)" type="button" value="Siguiente " class="rounded-[10px] cursor-pointer transition-all duration-500 ease-out hover:translate-y-[-5px] hover:bg-green hover:text-white w-full bg-white px-[20px] py-[10px] text-blue text-[16px] font-semibold  outline-none">
                    </div>
                {{--Step 1 end--}}

                {{--Step 2--}}
                    <div id="step-2" class="hidden flex-col w-full gap-[20px]">
                        <h2 class="text-white text-[24px] font-light">2. Crea tu perfil</h2>
                        <input oninput="hideMessage()" id="username" name="username" type="text" placeholder="Username" class="placeholder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-white text-[16px] font-regular  outline-none">
                        <input oninput="hideMessage()" id="name" name="name" type="text" placeholder="Nombre" class="placeholder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-white text-[16px] font-regular  outline-none">
                        <input oninput="hideMessage()" id="lastname" name="lastname" type="text" placeholder="Apellidos" class="placehotext-slate-400lder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-white text-[16px] font-regular  outline-none">
                        <div class="flex flex-row w-full gap-[20px]">
                            <input onclick="prevStep(2)" type="button" value="Atrás " class="rounded-[10px] cursor-pointer transition-all duration-500 ease-out hover:translate-y-[-5px] hover:bg-green hover:border-green w-full px-[20px] py-[10px] text-white border-[1px] border-solid border-white text-[16px] font-semibold  outline-none">
                            <input onclick="nextStep(2)" type="button" value="Siguiente " class="rounded-[10px] cursor-pointer transition-all duration-500 ease-out hover:translate-y-[-5px] hover:bg-green hover:text-white w-full bg-white px-[20px] py-[10px] text-blue text-[16px] font-semibold  outline-none">
                        </div>
                    </div>
                    
                {{--Step 2 end--}}

                {{--Step 3--}}
                    <div id="step-3" class="hidden flex-col w-full gap-[20px]">
                        <h2 class="text-white text-[24px] font-light">3. Informacion de contacto</h2>
                        <div class="flex flex-row w-full gap-[20px]">
                            <input value="+506" readonly class="placeholder:text-slate-400 flex w-[25%] border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-white text-[16px] font-regular  outline-none">
                            <input  id="phone" name="phone" type="tel" maxlength="15"  placeholder="Teléfono" class="placeholder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-white text-[16px] font-regular  outline-none">
                        </div>
                        <div class="flex flex-row w-full gap-[20px]">
                            <input onclick="prevStep(3)" type="button" value="Atrás " class="rounded-[10px] cursor-pointer transition-all duration-500 ease-out hover:translate-y-[-5px] hover:bg-green hover:border-green w-full px-[20px] py-[10px] text-white border-[1px] border-solid border-white text-[16px] font-semibold  outline-none">
                            <input onclick="nextStep(3)" type="button" value="Siguiente " class="rounded-[10px] cursor-pointer transition-all duration-500 ease-out hover:translate-y-[-5px] hover:bg-green hover:text-white w-full bg-white px-[20px] py-[10px] text-blue text-[16px] font-semibold  outline-none">
                        </div>
                    </div>
                {{--Step 3 end--}}

                {{--Step 4--}}
                    <div id="step-4" class="hidden flex-col w-full gap-[20px]">
                        <h2 class="text-white text-[24px] font-light">4. Donde te encuentras</h2>
                        <div class="flex flex-row w-full gap-[20px]">

                        <select name="province" id="province" class="placeholder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px]  text-[16px] font-regular  outline-none text-white">
                            <option selected disabled value="">Provincia</option>
                            @foreach ($provinces as $province)
                                <option class="text-blue bg-white" value="{{ $province->id }}">{{ $province->province }}</option>
                            @endforeach
                        </select>

                        <select name="city" id="city" class="placeholder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px]  text-[16px] font-regular  outline-none text-white">
                            <option selected disabled value="">Ciudad</option>
                            @foreach ($cities as $city)
                                <option class="text-blue bg-white" value="{{ $city->id }}">{{ $city->city }}</option>
                            @endforeach
                        </select>    

                        </div>
                        
                        <div class="flex flex-row w-full gap-[20px]">
                            <input onclick="prevStep(4)" type="button" value="Atrás " class="rounded-[10px] cursor-pointer transition-all duration-500 ease-out hover:translate-y-[-5px] hover:bg-green hover:border-green w-full px-[20px] py-[10px] text-white border-[1px] border-solid border-white text-[16px] font-semibold  outline-none">
                            <input type="submit" value="Enviar " class="rounded-[10px] cursor-pointer transition-all duration-500 ease-out hover:translate-y-[-5px] hover:bg-green hover:text-white w-full bg-white px-[20px] py-[10px] text-blue text-[16px] font-semibold  outline-none">
                        </div>

                    </div>
                {{--Step 4 end--}}


                <div id="alert" class="hidden p-[10px] justify-between bg-red-100 border-[1px] border-red-300 rounded-[10px]">
                    <p id="alert-text" class="text-red-600">Las contraseñas no coinciden</p>
                    <p onclick="alert.classList.add('hidden')" class="text-red-600 cursor-pointer">X</p>
                </div>

                @if ($message = Session::get('error'))
                    <div id="error" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-[10px] relative text-center" role="alert">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                @if ($message = Session::get('warning'))
                    <div id="warning" class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded-[10px]  text-center w-full" role="alert">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <p class="text-center text-[14px] text-white">¿Ya tienes cuenta? <a href="{{ route('login') }}" class="text-white underline">Inicia sesión</a></p>
            </form>
        </div>
    </div>

    <script>
        password = document.getElementById('password');
        password_confirmation = document.getElementById('password_confirmation');
        submit = document.getElementById('submit');
        alert = document.getElementById('alert');
        alertText = document.getElementById('alert-text');

        warning = document.getElementById('warning');
        error = document.getElementById('error');

        step1 = document.getElementById('step-1');
        step2 = document.getElementById('step-2');
        step3 = document.getElementById('step-3');
        step4 = document.getElementById('step-4');

        phone = document.getElementById('phone');

        let currentStep = 1;

        function nextStep(step) {
            document.getElementById(`step-${step}`).classList.add('hidden');
            document.getElementById(`step-${step + 1}`).classList.remove('hidden', 'flex', 'flex-col', 'w-full', 'gap-[20px]');
            document.getElementById(`step-${step + 1}`).classList.add('flex', 'flex-col', 'w-full', 'gap-[20px]');
        }

        function prevStep(step) {
            document.getElementById(`step-${step}`).classList.add('hidden');
            document.getElementById(`step-${step - 1}`).classList.remove('hidden', 'flex', 'flex-col', 'w-full', 'gap-[20px]');
            document.getElementById(`step-${step - 1}`).classList.add('flex', 'flex-col', 'w-full', 'gap-[20px]');
        }

        function checkPassword() {
            if (password.value != password_confirmation.value) {
                alertText.innerHTML = 'Las contraseñas no coinciden';
                alert.classList.remove('hidden');
                alert.classList.add('flex');
            } else {
                alert.classList.remove('flex');
                alert.classList.add('hidden');
            }
        }

        function hideMessage() {
            warning.classList.add('hidden');
            error.classList.add('hidden');
        }



    </script>
@endsection