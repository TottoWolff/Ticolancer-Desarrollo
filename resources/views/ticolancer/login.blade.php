@extends('ticolancer.layout')

@section('content') 
    <div class="grid grid-cols-2 bg-blue h-screen w-full max-sm:grid-cols-1">
        <div class="flex flex-col justify-center items-center px-[120px] gap-[20px] max-sm:w-[90vw] max-sm:px-0 max-sm:m-auto ">
            <h1 class=" px-[20px] py-[10px] w-fit  text-[28px]  font-bold text-white">Inicia sesión</h1>
            <form class="w-full flex flex-col gap-[20px]" action="">
                <input type="text" placeholder="Email" class="placeholder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-white text-[16px] font-regular  outline-none">
                <input type="password" placeholder="Contraseña" class="placeholder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-white text-[16px] font-regular  outline-none">
                <input type="submit" value="Entrar" class="rounded-[10px] transition-all duration-500 ease-out hover:translate-y-[-5px] hover:bg-green cursor-pointer w-full bg-white px-[20px] py-[10px] text-primary text-[16px] font-semibold  outline-none">
                <p class="text-center text-[14px] text-white">¿No tienes cuenta? <a href="{{ route('signup') }}" class="text-white underline">Regístrate</a></p>
            </form>
        </div>
    
        <div style="background-image: url(https://i.postimg.cc/VknftBhX/image.jpg);" class="bg-center bg-no-repeat bg-cover flex flex-col justify-center items-star px-[120px] gap-[20px] max-sm:hidden">
        <h1 class="w-fit text-[62px] max-sm:text-[48px] font-light font-main text-white">Bienvenido <span class="font-secondary text-white">Ticolancer</span></h1>
            <p class="text-[22px] max-sm:text-[14px] font-light text-white">Inicia sesion y sigamos trabajando juntos!</p>
        </div>
        
    </div>
@endsection