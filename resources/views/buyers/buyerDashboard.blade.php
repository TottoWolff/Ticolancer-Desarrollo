@extends('buyers.layout')
@section ('content')
<div class="flex flex-col justify-center items-center px-[120px] gap-[20px] max-sm:w-[90vw] max-sm:px-0 max-sm:m-auto mt-[80px]">
    <h1 class="text-blue w-fit text-[36px] font-light">Dashboard del comprador</h1>
    
    @if (Auth::guard('buyers')->check())
        <h2>Bienvenido (a), {{ Auth::guard('buyers')->user()->name }}</h2> 
        <p>Cuenta: {{ Auth::guard('buyers')->user()->email }}</p>  
        <p>Usuario: {{ Auth::guard('buyers')->user()->username }}</p> 
        <p>Telefono: {{ Auth::guard('buyers')->user()->phone }}</p>    
    @endif

    <form action="{{ route('login.logout') }}" method="POST">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form>

</div>

@endsection