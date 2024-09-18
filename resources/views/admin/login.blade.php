@extends('ticolancer.layout')

@section('content') 
    <div class="flex items-center justify-center bg-blue h-screen w-full max-sm:grid-cols-1">
        <div class="flex flex-col w-[90vw] justify-center items-center px-[120px] gap-[20px] max-sm:w-[90vw] max-sm:px-0 max-sm:m-auto ">
            <img class="w-[180px] max-sm:w-[120px]" src="{{ asset('icons/logo_blanco.svg') }}" alt="">
            
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
                        <p>{{ $message }}, <button onclick=openModal() class="underline font-medium" >recuperar contraseña</button></p>
                    </div>
            @endif
            
            <form class="w-full flex flex-col gap-[20px]" action="{{ route('admin.login.login') }}" method="POST">
                @csrf
                <input id="username" name="username" type="text" placeholder="Username" class="placeholder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-white text-[16px] font-regular  outline-none">
                <input id="password" name="password" type="password" placeholder="Contraseña" class="placeholder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-white text-[16px] font-regular  outline-none">
                <input type="submit" value="Iniciar sesión" class="rounded-[10px] transition-all duration-500 ease-out hover:translate-y-[-5px] hover:bg-green cursor-pointer w-full bg-white px-[20px] py-[10px] text-primary text-[16px] font-semibold  outline-none">
                <p class="text-center text-[14px] text-white">¿No tienes cuenta? <a href="{{ route('admin.signup') }}" class="text-white underline">Regístrate</a></p>
            </form>
        </div>

    </div>
@endsection