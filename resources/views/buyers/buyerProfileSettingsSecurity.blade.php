@extends('buyers.buyerLayout')

@section('content')
<div class="w-[90vw] bg-bg flex justify-center mt-[100px] m-auto">
    <div class="bg-bg rounded-lg w-full grid grid-cols-2 gap-[20px] max-sm:grid-cols-1">

        <!-- column left-->
        <div class="flex flex-col justify-start items-start gap-[20px] py-[20px]">
            <a class="flex w-full items-center gap-[10px] justify-center border-[1px] border-blue border-opacity-50 rounded-[12px] p-[10px] text-blue hover:text-white hover:bg-blue hover:border-blue transition-all duration-500 hover:translate-y-[-5px] " href="{{ route('buyerProfileSettingsAccount', ['username' => $username]) }}">Cuenta</a>
            <a class="flex w-full items-center gap-[10px] justify-center border-[1px] border-blue border-opacity-50 rounded-[12px] p-[10px] text-white bg-blue transition-all duration-500 hover:translate-y-[-5px] " href="#">Seguridad</a>
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
                <form id="password-form" action="{{ route('buyers.updatePassword', ['username' => $username]) }}" method="POST" class="w-full flex flex-col p-[20px] gap-[20px] border-[0.5px] border-solid border-blue border-opacity-50 rounded-[16px]">
                    @csrf
                    <h4 class="text-[22px] text-blue font-semibold">Cambio de contraseña</h4>
                    <!--current Password    -->
                    <div class="flex items-center justify-between">
                        <label for="currentPassword" class="text-[14px] font-light">CONTRASEÑA ACTUAL</label>
                        <input type="password" name="currentPassword" id="currentPassword" placeholder="Contraseña Actual" class="outline-none bg-transparent border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] w-[70%]">
                    </div>
                    <!-- new password -->
                    <div class="flex items-center justify-between">
                        <label for="newPassword" class="text-[14px] font-light">NUEVA CONTRASEÑA</label>
                        <input oninput="checkPasswordMatch(), checkPasswordCharacters()" type="password" name="newPassword" id="newPassword" placeholder="Nueva Contraseña" class="outline-none bg-transparent border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] w-[70%]">
                    </div>
                    <!-- comfirm new password -->
                    <div class="flex items-center justify-between">
                        <label for="confirmNewPassword" class="text-[14px] font-light">CONFIRMAR CONTRASEÑA</label>
                        <input oninput="checkPasswordMatch()" type="password" name="confirmNewPassword" id="confirmNewPassword" placeholder="Confirmar Contraseña" class="outline-none bg-transparent border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] w-[70%]">
                    </div>
                    <!-- alert -->
                    <div id="alert" class="hidden w-full p-[10px] justify-between bg-red-100 border-[1px] border-red-300 rounded-[10px]">
                        <p id="alert-text" class="text-red-600">Las contraseñas no coinciden</p>
                    </div>
                    <!-- password check -->
                    <div id="check-password" class="text-red-600 text-[12px] flex flex-col p-[10px] justify-between">
                            <p id="password-length">- La contraseña debe ser de al menos 8 caracteres</p>
                            <p id="password-uppercase">- Una mayuscula</p>
                            <p id="password-lowercase">- Una minuscula</p>
                            <p id="password-number">- Un numero</p>
                            <p id="password-special">- Un caracter especial</p>
                        </div>
                    <!-- save changes -->
                    <div class="items-center justify-end flex w-full">
                        <button id="save-changes" onclick="saveChanges()" type="button" class="w-fit bg-green rounded-[10px] p-[10px] text-white font-semibold text-[14px] hover:translate-y-[-5px] transition-all duration-500 ease-out">Guardar cambios</button>
                    </div>
                </form>
            <!-- Personal information end -->
        </div>
    </div>
</div>

<script>
    passwordLength = document.getElementById('password-length');
    passwordUppercase = document.getElementById('password-uppercase');
    passwordLowercase = document.getElementById('password-lowercase');
    passwordNumber = document.getElementById('password-number');
    passwordSpecial = document.getElementById('password-special');

    password = document.getElementById('newPassword');
    password_confirmation = document.getElementById('confirmNewPassword');
    alert = document.getElementById('alert');
    alertText = document.getElementById('alert-text');

    saveChangesButton = document.getElementById('save-changes');
    form = document.getElementById('password-form');

    function saveChanges() {
       const isValid = checkPasswordCharacters();
       
       if (isValid) {
        form.submit();
       } else {
        console.log('contraseñas no correctas');
       }
    }

    function checkPasswordMatch() {
            if (password.value != password_confirmation.value) {
                alertText.innerHTML = 'Las contraseñas no coinciden';
                alert.classList.remove('hidden');
                alert.classList.add('flex');
            } else {
                alert.classList.remove('flex');
                alert.classList.add('hidden');
            }
    }

    function checkPasswordCharacters() {
            console.log(password.value);
            
            let isValid = true; // Asumimos que es válido hasta que se demuestre lo contrario
            console.log(isValid);


            if (password.value.length >= 8) {
                passwordLength.classList.remove('text-red-600');
                passwordLength.classList.add('text-[#4ADE80]');
            } else {
                passwordLength.classList.remove('text-[#4ADE80]');
                passwordLength.classList.add('text-red-600');
                isValid = false; // No cumple con la longitud
            }

            if (/[A-Z]/.test(password.value)) {
                passwordUppercase.classList.remove('text-red-600');
                passwordUppercase.classList.add('text-[#4ADE80]');
            } else {
                passwordUppercase.classList.remove('text-[#4ADE80]');
                passwordUppercase.classList.add('text-red-600');
                isValid = false; // No tiene mayúscula
            }

            if (/[a-z]/.test(password.value)) {
                passwordLowercase.classList.add('text-[#4ADE80]');
                passwordLowercase.classList.remove('text-red-600');
            } else {
                passwordLowercase.classList.remove('text-[#4ADE80]');
                passwordLowercase.classList.add('text-red-600');
                isValid = false; // No tiene minúscula
            }

            if (/[0-9]/.test(password.value)) {
                passwordNumber.classList.add('text-[#4ADE80]');
                passwordNumber.classList.remove('text-red-600');
            } else {
                passwordNumber.classList.remove('text-[#4ADE80]');
                passwordNumber.classList.add('text-red-600');
                isValid = false; // No tiene número
            }

            if (/[^A-Za-z0-9]/.test(password.value)) {
                passwordSpecial.classList.add('text-[#4ADE80]');
                passwordSpecial.classList.remove('text-red-600');
            } else {
                passwordSpecial.classList.remove('text-[#4ADE80]');
                passwordSpecial.classList.add('text-red-600');
                isValid = false; // No tiene carácter especial
            }

            return isValid; // Devuelve true si todas las condiciones se cumplen
    }



</script>