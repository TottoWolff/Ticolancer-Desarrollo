@extends('buyers.buyerLayout')

@section('content')
<div class="w-[90vw] bg-bg flex justify-center mt-[100px] m-auto">
    <div class="bg-bg rounded-lg w-full grid grid-cols-2 gap-[20px] max-sm:grid-cols-1">

        <!-- column left-->
        <div class="flex flex-col justify-start items-start gap-[20px] py-[20px]">
            <a class="flex w-full items-center gap-[10px] justify-center border-[1px] border-blue border-opacity-50 rounded-[12px] p-[10px] text-blue hover:text-white hover:bg-blue hover:border-blue transition-all duration-500 hover:translate-y-[-5px] " href="{{ route('buyerProfileSettingsAccount', ['username' => $username]) }}">Cuenta</a>
            <a class="flex w-full items-center gap-[10px] justify-center border-[1px] border-blue border-opacity-50 rounded-[12px] p-[10px] text-white bg-blue transition-all duration-500 hover:translate-y-[-5px] " href="#">Seguridad</a>
            <a class="text-[16px] text-blue underline hover:text-green transition-all duration-500 ease-out" href="{{ route('buyerProfile', ['username' => $username]) }}">🡠 Ir a mi perfil</a>
        </div>

        <!--column right -->
        <div class="w-full flex-col flex py-[20px] gap-[20px]">
            <!-- Personal information -->
                <form action="" class="w-full flex flex-col p-[20px] gap-[20px] border-[0.5px] border-solid border-blue border-opacity-50 rounded-[16px]">
                    <h4 class="text-[22px] text-blue font-semibold">Cambio de contraseña</h4>
                    <!--current Password    -->
                    <div class="flex items-center justify-between">
                        <label for="name" class="text-[14px] font-light">CONTRASEÑA ACTUAL</label>
                        <input type="text" name="name" id="name" placeholder="Contraseña" class="outline-none bg-transparent border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] w-[70%]">
                    </div>
                    <!-- new password -->
                    <div class="flex items-center justify-between">
                        <label for="lastname" class="text-[14px] font-light">NUEVA CONTRASEÑA</label>
                        <input type="text" name="lastname" id="lastname" placeholder="Nueva Contraseña" class="outline-none bg-transparent border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] w-[70%]">
                    </div>
                    <!-- comfirm new password -->
                    <div class="flex items-center justify-between">
                        <label for="username" class="text-[14px] font-light">CONFIRMAR CONTRASEÑA</label>
                        <input type="text" name="username" id="username" placeholder="Confirmar Contraseña" class="outline-none bg-transparent border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] w-[70%]">
                    </div>
                    
                </form>
            <!-- Personal information end -->
        </div>



    </div>
</div>