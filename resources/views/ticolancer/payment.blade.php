@extends('buyers.layout')
@section ('content')
<div class="w-full max-w-3xl mx-auto border-[1px] border-blue border-opacity-50 rounded-[16px] bg-white shadow-lg p-8 m-[140px]">
    <div class="flex items-center gap-2 mb-4">
        <h1 class="text-3xl text-blue font-semibold">Suscríbete a Ticolancer Plus Subscription</h1>
    </div>

    <div class="flex items-center gap-2 mb-4">
        <h1 class="text-2xl text-blue font-medium">Seleccione su método de pago</h1>
    </div>

    <div class="flex flex-col md:flex-row gap-4 md:gap-20 items-center justify-center">
        <div id="paypal-option" class="w-[50%] md:w-[20%] text-center grid gap-3 cursor-pointer">
            <div class="border-[1px] border-blue border-opacity-50 rounded-[16px] flex items-center justify-center hover:border-blue hover:border-2">
                <img src="{{ asset('images/payment/paypal.png') }}" alt="" class="w-full h-auto p-2">
            </div>
            <span>Paypal</span>
        </div>
        

        <div id="credit-card-option"  class="w-[50%] md:w-[20%] text-center grid gap-3 cursor-pointer">
            <div class="border-[1px] border-blue border-opacity-50 rounded-[16px] flex items-center justify-center hover:border-blue hover:border-2">
                <img src="{{ asset('images/payment/creditCard.jpg') }}" alt="" class="w-full h-auto p-2">
            </div>
            <span>Tarjeta de crédito</span>
        </div>
    </div>

    <!-- Modal de confirmación para PayPal -->
    <div id="paypal-modal" class="fixed inset-0 hidden flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white w-full max-w-md p-6 rounded-lg shadow-lg mx-4 sm:mx-0 text-center">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Confirmación de Pago con PayPal</h2>
            <p class="text-gray-600 mb-6">Serás redirigido a PayPal para completar el pago. ¿Deseas continuar?</p>
            
            <div class="flex justify-center gap-4">
                <button id="cancel-paypal" class="px-6 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 cursor-pointer">
                    Cancelar
                </button>
                <a class="px-6 py-2 bg-green text-gray-700 hover:text-white rounded hover:bg-blue focus:outline-none focus:ring-2 focus:ring-gray-400 cursor-pointer">
                    Continuar a PayPal
                </a>
            </div>
        </div>
    </div>


    <form id="payment-form" class="space-y-8 hidden">
        <!-- Información de contacto -->
        <div class="space-y-4">
            <h3 class="text-lg font-medium text-gray-800">Información de contacto</h3>
            <div class="space-y-2">
                <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                <input id="email" type="email" class="mt-1 block w-full border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="  ticolancer@email.com">
            </div>
        </div>

        <!-- Método de pago -->
        <div class="space-y-4">
            <h3 class="text-lg font-medium text-gray-800">Método de pago</h3>
            <div class="space-y-4">
                <div class="space-y-2">
                    <label for="card" class="block text-sm font-medium text-gray-700">Información de la tarjeta</label>
                    <input id="card" type="text" class="mt-1 block w-full border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="1234 1234 1234 1234">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label for="expiry" class="block text-sm font-medium text-gray-700">MM/AA</label>
                        <input id="expiry" type="text" class="mt-1 block w-full border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="MM/AA">
                    </div>
                    <div class="space-y-2">
                        <label for="cvc" class="block text-sm font-medium text-gray-700">CVC</label>
                        <input id="cvc" type="text" class="mt-1 block w-full border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="CVC">
                    </div>
                </div>
                <div class="space-y-2">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre del titular de tarjeta</label>
                    <input id="name" type="text" class="mt-1 block w-full border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Nombre completo">
                </div>
            </div>
        </div>

        <!-- Dirección de facturación -->
        <div class="space-y-4">
            <h3 class="text-lg font-medium text-gray-800">Dirección de facturación</h3>
            <div class="space-y-4">
                <div class="space-y-2">
                    <label for="country" class="block text-sm font-medium text-gray-700">País</label>
                    <select id="country" class="mt-1 block w-full border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        <option>Seleccionar país</option>
                        <option value="cr">Costa Rica</option>
                        <option value="other">Otro país</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label for="address1" class="block text-sm font-medium text-gray-700">Línea 1 de dirección</label>
                    <input id="address1" type="text" class="mt-1 block w-full border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
                <div class="space-y-2">
                    <label for="address2" class="block text-sm font-medium text-gray-700">Línea 2 de dirección</label>
                    <input id="address2" type="text" class="mt-1 block w-full border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label for="city" class="block text-sm font-medium text-gray-700">Ciudad</label>
                        <input id="city" type="text" class="mt-1 block w-full border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                    <div class="space-y-2">
                        <label for="postal" class="block text-sm font-medium text-gray-700">Código postal</label>
                        <input id="postal" type="text" class="mt-1 block w-full border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>
            </div>
        </div>

        <!-- Opciones -->
        <div class="space-y-4">
            <div class="flex items-center space-x-2">
                <input id="save-info" type="checkbox" class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                <label for="save-info" class="text-sm text-gray-700">Acepto lo términos y condiciones de Ticolancer</label>
            </div>
            <!-- <div class="flex items-center space-x-2">
                <input id="company" type="checkbox" class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                <label for="company" class="text-sm text-gray-700">Estoy comprando en calidad de empresa</label>
            </div> -->
        </div>

        <!-- Botón de pago -->
        <div class="space-y-4">
            <p class="text-sm text-gray-500">Se cobrará el monto mencionado, con la frecuencia establecida anteriormente, hasta que canceles la suscripción.</p>
            <button type="submit" class="w-full bg-indigo-600 text-white font-medium py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Pagar USD 20.00</button>
        </div>
    </form>
</div>

<script>
    // Seleccionar los elementos del DOM
    const paypalOption = document.getElementById("paypal-option");
    const creditCardOption = document.getElementById("credit-card-option");
    const paymentForm = document.getElementById("payment-form");
    const paypalModal = document.getElementById("paypal-modal");
    const cancelPaypal = document.getElementById("cancel-paypal");

    // Mostrar formulario de tarjeta de crédito
    creditCardOption.addEventListener("click", () => {
        paymentForm.classList.toggle("hidden");
        paypalModal.classList.add("hidden");  // Asegurarse de que el modal esté oculto
    });

    // Mostrar modal de confirmación para PayPal
    paypalOption.addEventListener("click", () => {
        paypalModal.classList.remove("hidden");
        paymentForm.classList.add("hidden");  // Ocultar el formulario de tarjeta si está visible
    });

    // Cerrar modal de PayPal si se cancela
    cancelPaypal.addEventListener("click", (e) => {
        e.preventDefault();
        paypalModal.classList.add("hidden");
    });
</script>

@endsection