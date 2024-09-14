@extends('ticolancer.layout')

@section('content') 
    <div class="grid grid-cols-2 bg-blue h-screen w-full max-sm:grid-cols-1">
        <div class="flex flex-col justify-center items-center px-[120px] gap-[20px] max-sm:w-[90vw] max-sm:px-0 max-sm:m-auto ">
            <h1 class=" px-[20px] py-[10px] w-fit  text-[28px]  font-bold text-white">Inicia sesión</h1>
            
            @if ($message = Session::get('success'))
                    <div class="bg-[#DCFCE7] border-[1px] border-[#4ADE80] text-[#15763D] px-4 py-3 rounded-[10px] text-center w-full" role="alert">
                        <p>{{ $message }}</p>
                    </div>
            @endif

            @if ($message = Session::get('warning'))
                    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded-[10px]  text-center w-full" role="alert">
                        <p>{{ $message }}</p>
                    </div>
            @endif

            @if ($message = Session::get('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-[10px]  text-center w-full" role="alert">
                        <p>{{ $message }}, <a class="underline font-medium" href="#">recuperar contraseña</a></p>
                    </div>
            @endif

            <div class="fixed flex flex-col gap-[20px] right-[50%] left-[50%] top-[50%] -translate-x-[50%] -translate-y-[50%] rounded-[16px] w-[40vw] max-sm:w-[90vw] h-[400px] bg-white p-[40px]">
                <div>
                    <h5 class="text-[36px] text-blue font-medium">Recuperación de contraseña</h5>
                    <p class="text-[16px] text-slate-400 font-light">Ingresa tu correo y te enviaremos un enlace para recuperar tu contraseña</p>
                </div>
                <form class="w-full flex flex-col gap-[20px]" action="{{ route('login.recover') }}" method="POST">
                    @csrf
                    <input type="text" id="email" name="email" placeholder="Email" class="placeholder:text-slate-400 flex max-sm:w-[100%] w-[50%] border-b-[1px] border-solid border-blue bg-transparent border-opacity-50 px-[20px] py-[10px] text-blue text-[16px] font-regular  outline-none">
                    <button class="rounded-[10px] transition-all duration-500 ease-out hover:translate-y-[-5px] hover:bg-green cursor-pointer w-fit bg-blue px-[20px] py-[10px] text-white text-[16px] font-semibold  outline-none" type="submit">Enviar</button>
                </form>
            </div>
            
            <form class="w-full flex flex-col gap-[20px]" action="{{ route('login.login') }}" method="POST">
                @csrf
                <input id="email" name="email" type="text" placeholder="Email" class="placeholder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-white text-[16px] font-regular  outline-none">
                <input id="password" name="password" type="password" placeholder="Contraseña" class="placeholder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-white text-[16px] font-regular  outline-none">
                <input type="submit" value="Iniciar sesión" class="rounded-[10px] transition-all duration-500 ease-out hover:translate-y-[-5px] hover:bg-green cursor-pointer w-full bg-white px-[20px] py-[10px] text-primary text-[16px] font-semibold  outline-none">
                <p class="text-center text-[14px] text-white">¿No tienes cuenta? <a href="{{ route('signup') }}" class="text-white underline">Regístrate</a></p>
            </form>
        </div>
    
        <div style="background-image: url(https://i.postimg.cc/VknftBhX/image.jpg);" class="bg-center bg-no-repeat bg-cover flex flex-col justify-center items-star px-[120px] gap-[20px] max-sm:hidden">
        <h1 class="w-fit text-[62px] max-sm:text-[48px] font-light font-main text-white">Bienvenido <span class="font-secondary text-white">Ticolancer</span></h1>
            <p class="text-[22px] max-sm:text-[14px] font-light text-white">Inicia sesion y sigamos trabajando juntos!</p>
        </div>
        
    </div>
@endsection