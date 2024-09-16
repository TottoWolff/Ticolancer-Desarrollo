@extends('ticolancer.layout')
@section ('content')
<div class="grid grid-cols-2 max-sm:grid-cols-1 bg-blue h-screen w-full">
        <div style="background-image: url(https://i.postimg.cc/VknftBhX/image.jpg);" class="flex flex-col justify-center items-start bg-no-repeat bg-cover bg-center px-[120px] gap-[20px] max-sm:hidden">
        <h1 class="w-fit text-[62px] max-sm:text-[48px] font-light font-main text-white">Bienvenido a <span class="font-secondary text-white    ">Ticolancer</span></h1>
            <p class="text-[22px] max-sm:text-[14px] font-light text-white">Registrate y empieza a crecer con nosotros.</p>
        </div>
        <div class="flex flex-col justify-center items-center px-[120px] gap-[20px] max-sm:px-0 max-sm:w-[90vw] max-sm:m-auto">
            <h1 class=" px-[20px] py-[10px] w-fit  text-[32px]  font-bold text-white">Regístrate</h1>
            <form class="w-full flex flex-col gap-[20px]" action="{{ route('signup.store') }} " method="POST">
                @csrf
                <input oninput="hideMessage()" id="name" name="name" type="text" placeholder="Nombre" class="placeholder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-white text-[16px] font-regular  outline-none">
                <input oninput="hideMessage()" id="lastname" name="lastname" type="text" placeholder="Apellidos" class="placehotext-slate-400lder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-white text-[16px] font-regular  outline-none">
                <input oninput="hideMessage()" id="email" name="email" type="text" placeholder="Email" class="placeholder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-white text-[16px] font-regular  outline-none">
                <input oninput="checkPassword(), hideMessage()" id="password" name="password" type="password" placeholder="Contraseña" class="placeholder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-white text-[16px] font-regular  outline-none">
                <input oninput="checkPassword(), hideMessage()" id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirmar contraseña" class="placeholder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-white text-[16px] font-regular  outline-none">
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

                <input id="submit" type="submit" value="Registrarme " class="rounded-[10px] cursor-pointer transition-all duration-500 ease-out hover:translate-y-[-5px] hover:bg-green w-full bg-white px-[20px] py-[10px] text-primary text-[16px] font-semibold  outline-none">
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