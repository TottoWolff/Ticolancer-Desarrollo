@extends('ticolancer.layout')
@section ('content')
<div class="flex flex-col justify-center items-center px-[120px] gap-[20px] max-sm:w-[90vw] max-sm:px-0 max-sm:m-auto mt-[80px]">
    <h1 class="text-blue w-fit text-[36px] font-light">Dashboard de administrador</h1>
    
    @if (Auth::check())
        <h2>Bienvenido (a), {{ Auth::user()->username }}</h2>        
    @endif

    <form action="{{ route('admin.login.logout') }}" method="POST">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form>

</div>

@endsection