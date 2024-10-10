@extends('ticolancer.layout')

@section('content') 
<div class="grid grid-cols-1 bg-blue h-auto py-[40px] w-full max-sm:grid-cols-1">
    <div
        class="flex flex-col justify-center items-center px-[120px] gap-[20px] max-sm:w-[90vw] max-sm:px-0 max-sm:m-auto mt-[6rem]">
        <form class="w-[50vw]" action="{{ route('sellers.gigStore', ['username' => $username]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="mt-4">
                <input
                    class="placeholder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-white text-[16px] font-regular  outline-none"
                    id="gig_name" name="gig_name" type="text" placeholder="Nombre del servicio" required>
            </div>
            <div class="mt-4">
                <textarea
                    class="placeholder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-white text-[16px] font-regular  outline-none"
                    id="gig_description" name="gig_description" placeholder="Descripcion del servicio" required
                    style="vertical-align: top;"></textarea>
            </div>

            <div class="mt-4">
                <input
                    class="placeholder:text-slate-400 flex w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px] text-white text-[16px] font-regular  outline-none"
                    id="gig_price" name="gig_price" type="number" step="0.01" min="0" placeholder="Precio" required>
            </div>
            <div class="mt-4">
            <select id="gig_category" class="text-slate-400 w-full border-b-[1px] border-solid border-white bg-transparent border-opacity-50 px-[20px] py-[10px]  text-[16px] font-regular  outline-none">
                @foreach ($categories as $category)
                    <option class="text-blue bg-white" name="gig_category" value="{{ $category->id }}">{{ $category->category }}</option>
                @endforeach
            </select>
            </div>

            <div class="flex gap-[20px] w-full mt-4">
    <input class="form-control hidden" name="gig_image" id="gig_image" type="file" accept="image/*">
    <label for="gig_image" id="upload_label"
        class="bg-white text-blue font-bold py-2 px-4 rounded cursor-pointer">Subir imagen</label>
</div>

<div class="mt-4">
    <img id="selected_image" class="hidden w-full h-auto rounded-[10px]" />
</div>

            <div class="flex items-center justify-between gap-4">
                <button
                    class="rounded-[10px] cursor-pointer transition-all duration-500 ease-out hover:translate-y-[-5px] hover:bg-white hover:text-green w-full bg-green px-[20px] py-[10px] text-white text-[16px] font-semibold outline-none mt-6"
                    type="submit">Crear</button>
            </div>

            <div class="flex items-center justify-between gap-4">
                <a class="text-center rounded-[10px] cursor-pointer transition-all duration-500 ease-out hover:translate-y-[-5px] hover:bg-white hover:text-red-600 w-full bg-red-600 px-[20px] py-[10px] text-white text-[16px] font-semibold outline-none mt-6"
                    type="button" href="{{ route('sellerGigsProfileAdmin', ['username' => $username]) }}">Cancelar</a>
            </div>

        </form>
        @if ($message = Session::get('success'))
            <div class="bg-[#DCFCE7] border-[1px] border-[#4ADE80] text-[#15763D] px-4 py-3 rounded-[10px] text-center w-full"
                role="alert">
                <p>{{ $message }}</p>
            </div>
        @endif

    </div>
</div>

<script>
    const imageInput = document.getElementById('gig_image');
    const uploadLabel = document.getElementById('upload_label');
    const selectedImage = document.getElementById('selected_image');

    imageInput.addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                selectedImage.src = e.target.result;
                selectedImage.classList.add('hidden');
                uploadLabel.style.backgroundImage = `url(${e.target.result})`;
                uploadLabel.style.backgroundSize = 'cover';
                uploadLabel.style.backgroundPosition = 'center';
                uploadLabel.style.width = '200px';
                uploadLabel.style.height = '200px';
                uploadLabel.textContent = '';
            };
            reader.readAsDataURL(file);
        }
    });

    function formatPhoneNumber(input) {
        let value = input.value.replace(/\D/g, '');
        if (value.length > 4) {
            value = value.slice(0, 4) + '-' + value.slice(4, 8);
        }
        input.value = value;
    }

    function showFileChooser() {
        imageInput.click();
        modalContent.classList.add('hidden');
        modalChanges.classList.remove('hidden');
        modalChanges.classList.add('flex');
    }
</script>
@endsection