@extends('buyers.layout')

@section('content')
<div class=" mx-auto ">

    @if (session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
        {{ session('success') }}
    </div>
    @endif
    <div class="flex items-center justify-center flex-col w-[90vw] m-auto mt-[140px]">
        <form class="w-[60vw] max-sm:w-[90vw]" action="{{ route('sellerApplication.store', auth()->guard('buyers')->user()->username) }}" method="POST" enctype="multipart/form-data" class="space-y-4 bg-white rounded-lg  mt-32 border border-gray-300 p-8 w-[60%] mx-auto">
            @csrf
            <h1 class="text-[22px] text-blue font-semibold">Formulario de Aplicación para Convertirse en Vendedor</h1>
            <div>
                <label for="birthdate" class="text-[14px] font-light text-blue">Fecha de Nacimiento *</label>
                <input type="date" name="birthdate" id="birthdate" class="mt-1 block w-[30%] border border-gray-300 rounded-lg p-2 text-[14px] font-light text-blue" required>
                @error('birthdate') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="description" class="text-[14px] font-light text-blue">Descripción *</label>
                <textarea name="description" id="description" rows="4" class="mt-1 block w-full border border-gray-300 rounded-lg p-2 text-[14px] font-light text-blue" required></textarea>
                @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="phone" class="text-[14px] font-light text-blue">Teléfono *</label>
                <input type="text" name="phone" id="phone" class="mt-1 block w-full border border-gray-300 rounded-lg p-2 text-[14px] font-light text-blue" required>
                @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="residence_address" class="text-[14px] font-light text-blue">Dirección de Residencia *</label>
                <input type="text" name="residence_address" id="residence_address" class="mt-1 block w-full border border-gray-300 rounded-lg p-2 text-[14px] font-light text-blue" required>
                @error('residence_address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="picture" class="text-[14px] font-light text-blue">Documento de Identidad *</label>
                <div class="flex items-center gap-4">
                    <label class="cursor-pointer bg-green rounded-[10px] p-[10px] text-white font-semibold text-[14px] hover:translate-y-[-5px] transition-all duration-500 ease-out my-3">
                        Agrega una identificación gubernamental
                        <input type="file" name="picture" id="picture" class="hidden" accept="image/*" onchange="previewImage(event)">
                    </label>
                    <span id="pictureError" class="flex text-red-500 text-sm ">Es obligatorio subir una imagen.</span>
                </div>
            </div>

            <!-- Previsualización de la imagen -->
            <div id="image-preview" class="mt-4 hidden mb-3">
                <p class="text-[14px] font-light text-blue">Previsualización:</p>
                <img id="preview" class="w-50 h-32 rounded-lg mt-2 object-cover">
            </div>

            <!-- Redes sociales -->
            <div>
                <label for="facebook" class="block text-[14px] font-light text-blue">Facebook (Opcional)</label>
                <input type="url" name="facebook" id="facebook" class="mt-1 block w-full border border-gray-300 rounded-lg p-2 text-[14px] font-light text-blue">
                @error('facebook') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="instagram" class="text-[14px] font-light text-blue">Instagram (Opcional)</label>
                <input type="url" name="instagram" id="instagram" class="mt-1 block w-full border border-gray-300 rounded-lg p-2 text-[14px] font-light text-blue">
                @error('instagram') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="twitter" class="block text-[14px] font-light text-blue">Twitter (Opcional)</label>
                <input type="url" name="twitter" id="twitter" class="mt-1 block w-full border border-gray-300 rounded-lg p-2 text-[14px] font-light text-blue">
                @error('twitter') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="linkedin" class="text-[14px] font-light text-blue">LinkedIn (Opcional)</label>
                <input type="url" name="linkedin" id="linkedin" class="mt-1 block w-full border border-gray-300 rounded-lg p-2 text-[14px] font-light text-blue">
                @error('linkedin') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="website" class="block text-[14px] font-light text-blue">Sitio Web (Opcional)</label>
                <input type="url" name="website" id="website" class="mt-1 block w-full border border-gray-300 rounded-lg p-2 text-[14px] font-light text-blue">
                @error('website') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="items-center justify-center flex w-full flex-col">
                <button id="submit-button" type="submit" disabled  class=" w-[30%] bg-green rounded-[10px] p-[10px] text-white font-semibold text-[14px] hover:translate-y-[-5px] transition-all duration-500 ease-out mt-6">
                    Enviar Solicitud
                </button>
                <span id="pictureError2" class="flex text-red-500 text-sm mt-2">Es obligatorio llenar los campos *.</span>

            </div>
        </form>
    </div>
</div>


<script>
    // Previsualización de la imagen seleccionada
    function previewImage(event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        const preview = document.getElementById('preview');
        const previewContainer = document.getElementById('image-preview');
        const pictureError = document.getElementById('pictureError');
        const pictureError2 = document.getElementById('pictureError2');
        const submitButton = document.getElementById('submit-button');

        if (file) {
            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.classList.remove('hidden');
                pictureError.classList.add('hidden');
                pictureError2.classList.add('hidden');
                submitButton.disabled = false;
            };
            reader.readAsDataURL(file);
        }
    }

    
</script>
@endsection