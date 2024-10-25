@extends('sellers.layout')

@section('content') 
<div class="w-[90vw] flex items-center justify-center mt-[140px] mb-[140px] m-auto">
    <form id="createGigForm" action="{{ route('sellers.gigStore', ['username' => $username]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="w-full grid md:grid-cols-2 max-sm:grid-cols-1 gap-[20px]">
            <!-- Left Column -->
            <div class="w-full flex flex-col justify-start items-start gap-[20px]">
                <div class="flex flex-col justify-start items-start gap-[20px]">
                    <h3 class="text-[24px] font-medium text-blue">{{$user->name}}, aquí puedes crear tus servicios!</h3>
                    <div class="w-full rounded-[16px] border-blue border-[0.5px] border-opacity-50">
                        <div class="flex items-center justify-between p-[20px]">
                            <div class="flex flex-col gap-[10px] w-[40%]">
                                <h5 class="text-[16px] font-medium text-blue">Título del servicio</h5>
                                <p class="text-[12px] font-light">El título es el lugar más importante para incluir
                                    palabras clave que los compradores probablemente usarían para buscar un servicio
                                    como el suyo.</p>
                            </div>
                            <input type="text" name="gig_name" id="name" placeholder="Crearé un logo para ti"
                                class="outline-none bg-transparent border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] w-[60%]">
                        </div>

                        <div class="flex items-center justify-between p-[20px]">
                            <div class="flex flex-col gap-[10px] w-[40%]">
                                <h5 class="text-[16px] font-medium text-blue">Descripción</h5>
                                <p class="text-[12px] font-light">Describe tu servicio</p>
                            </div>
                            <textarea type="text" placeholder="Describe tu servicio" name="gig_description"
                                id="description"
                                class="outline-none bg-transparent border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] w-[60%]"></textarea>
                        </div>

                        <div class="flex items-center justify-between p-[20px]">
                            <div class="flex flex-col gap-[10px] w-[40%]">
                                <h5 class="text-[16px] font-medium text-blue">Categoría</h5>
                                <p class="text-[12px] font-light">Elija la categoría y más adecuada para su Servicio.
                                </p>
                            </div>
                            <select name="gig_category"
                                class="text-[14px] font-light outline-none bg-transparent border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] w-[60%]">
                                <option class="text-[14px] font-light" value="" disabled selected>Selecciona una
                                    categoria</option>
                                @foreach ($categories as $category)
                                    <option name="gig_category" class="text-[14px] font-light" value="{{ $category->id }}">
                                        {{ $category->category }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-between p-[20px]">
                            <div class="flex flex-col gap-[10px] w-[40%]">
                                <h5 class="text-[16px] font-medium text-blue">Precio</h5>
                                <p class="text-[12px] font-light">Establece el precio apróximado para tu servicio,
                                    este puede cambiar de acuerdo a las conversaciones con cliente.</p>
                            </div>
                            <input type="number" name="gig_price" id="price" placeholder="0.00" step="0.01" min="0"
                                class="outline-none bg-transparent border-[0.5px] border-solid border-blue border-opacity-50 rounded-[10px] p-[10px] w-[60%]">
                        </div>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                    <div class="bg-[#DCFCE7] border-[1px] border-[#4ADE80] text-[#15763D] px-4 py-3 rounded-[10px] text-center w-full"
                        role="alert">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                @if ($message = Session::get('warning'))
                    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded-[10px]  text-center w-full"
                        role="alert">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                @if ($message = Session::get('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-[10px]  text-center w-full"
                        role="alert">
                        <p>{{ $message }}</p>
                    </div>
                @endif
            </div>

            <!-- Right Column -->
            <div class="w-full flex flex-col justify-start items-start gap-[20px]">
                <div class="flex flex-col justify-start items-start gap-[20px] mt-[60px]">
                    <div class="w-full rounded-[16px] border-blue border-[0.5px] border-opacity-50">
                        <div class="flex items-start justify-between p-[20px]">
                            <div class="flex flex-col gap-[10px] w-[40%]">
                                <h5 class="text-[16px] font-medium text-blue">Imagen del servicio</h5>
                                <p class="text-[12px] font-light">Aquí podrás subir la imagen principal de tu servicio.
                                </p>
                                <!-- save changes -->
                                <div class="items-center justify-start flex w-full">
                                    <button onclick="showFileChooser()" type="button"
                                        class="w-fit bg-green rounded-[10px] p-[10px] text-white font-semibold text-[14px] hover:translate-y-[-5px] transition-all duration-500 ease-out">Subir
                                        imagen</button>
                                    <input class="hidden" name="gig_image" id="image-input" type="file"
                                        accept="image/*">
                                </div>
                            </div>
                            <div class="w-[60%]">
                                <img id="image" class="w-full rounded-[10px] h-[400px] object-cover"
                                    src="https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png"
                                    alt="">
                            </div>
                        </div>

                        <div class="flex items-start justify-between p-[20px]">
                            <div class="flex flex-col gap-[10px] w-[40%]">
                                <h5 class="text-[16px] font-medium text-blue">Galeria de imagenes</h5>
                                <p class="text-[12px] font-light">Aquí podrás subir una galería de imágenes para tu
                                    servicio. <br><br>Agrega un máximo de 4 imágenes. </p>
                            </div>
                            <div class="w-[60%]">
                                <div class="w-full grid grid-cols-2 grid-rows-2 gap-[20px]">

                                    <div class="items-center justify-start flex flex-col w-full gap-[5px]">
                                        <img id="image1" class=" w-full rounded-[10px] h-[200px] object-cover"
                                            src="https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png"
                                            alt="">
                                        <button type="button" onclick="showFileChooser1()"
                                            class="w-fullrounded-[10px] p-[10px] underline text-blue font-semibold text-[14px] hover:translate-y-[-5px] transition-all duration-500 ease-out">Subir
                                            imagen</button>
                                        <input class="hidden" name="gig_image1" id="image-input1" type="file"
                                            accept="image/*">
                                    </div>

                                    <div class="items-center justify-start flex flex-col w-full gap-[5px]">
                                        <img id="image2" class=" w-full rounded-[10px] h-[200px] object-cover"
                                            src="https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png"
                                            alt="">
                                        <button type="button" onclick="showFileChooser2()"
                                            class="w-fullrounded-[10px] p-[10px] underline text-blue font-semibold text-[14px] hover:translate-y-[-5px] transition-all duration-500 ease-out">Subir
                                            imagen</button>
                                        <input class="hidden" name="gig_image2" id="image-input2" type="file"
                                            accept="image/*">
                                    </div>

                                    <div class="items-center justify-start flex flex-col w-full gap-[5px]">
                                        <img id="image3" class=" w-full rounded-[10px] h-[200px] object-cover"
                                            src="https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png"
                                            alt="">
                                        <button type="button" onclick="showFileChooser3()"
                                            class="w-fullrounded-[10px] p-[10px] underline text-blue font-semibold text-[14px] hover:translate-y-[-5px] transition-all duration-500 ease-out">Subir
                                            imagen</button>
                                        <input class="hidden" name="gig_image3" id="image-input3" type="file"
                                            accept="image/*">
                                    </div>

                                    <div class="items-center justify-start flex flex-col w-full gap-[5px]">
                                        <img id="image4" class=" w-full rounded-[10px] h-[200px] object-cover"
                                            src="https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png"
                                            alt="">
                                        <button type="button" onclick="showFileChooser4()"
                                            class="w-fullrounded-[10px] p-[10px] underline text-blue font-semibold text-[14px] hover:translate-y-[-5px] transition-all duration-500 ease-out">Subir
                                            imagen</button>
                                        <input class="hidden" name="gig_image4" id="image-input4" type="file"
                                            accept="image/*">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Guardar servicio"
                    class="flex w-full items-center gap-[10px] justify-center border-[1px] border-blue border-opacity-50 rounded-[12px] p-[10px] text-blue hover:text-white hover:bg-blue hover:border-blue transition-all duration-500 hover:translate-y-[-5px] ">
            </div>
        </div>
    </form>

</div>

<script>

    imageInput = document.getElementById('image-input');
    image = document.getElementById('image');

    function showFileChooser() {
        imageInput.click();
    }

    imageInput.addEventListener('change', () => {
        const file = imageInput.files[0];
        if (file) {
            console.log("Archivo seleccionado: ", file.name);
            const reader = new FileReader();
            console.log(imageInput.files[0]);
            reader.onload = function (e) {
                image.src = e.target.result;
            }
            reader.readAsDataURL(file);
        } else {
            console.log("No hay archivo seleccionado");
        }
    })

    imageInput1 = document.getElementById('image-input1');
    image1 = document.getElementById('image1');

    function showFileChooser1() {
        imageInput1.click();
    }

    imageInput1.addEventListener('change', () => {
        const file = imageInput1.files[0];
        if (file) {
            const reader = new FileReader();
            console.log(imageInput1.files[0]);
            reader.onload = function (e) {
                image1.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    })

    imageInput2 = document.getElementById('image-input2');
    image2 = document.getElementById('image2');

    function showFileChooser2() {
        imageInput2.click();
    }

    imageInput2.addEventListener('change', () => {
        const file = imageInput2.files[0];
        if (file) {
            const reader = new FileReader();
            console.log(imageInput2.files[0]);
            reader.onload = function (e) {
                image2.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    })

    imageInput3 = document.getElementById('image-input3');
    image3 = document.getElementById('image3');

    function showFileChooser3() {
        imageInput3.click();
    }

    imageInput3.addEventListener('change', () => {
        const file = imageInput3.files[0];
        if (file) {
            const reader = new FileReader();
            console.log(imageInput3.files[0]);
            reader.onload = function (e) {
                image3.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    })

    imageInput4 = document.getElementById('image-input4');
    image4 = document.getElementById('image4');

    function showFileChooser4() {
        imageInput4.click();
    }

    imageInput4.addEventListener('change', () => {
        const file = imageInput4.files[0];
        if (file) {
            const reader = new FileReader();
            console.log(imageInput4.files[0]);
            reader.onload = function (e) {
                image4.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    })

    document.getElementById('createGigForm').addEventListener('submit', function (event) {
        event.preventDefault();

        let formData = new FormData(this);
        fetch(this.action, {
            method: this.method,
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = `{{ route('sellerProfile', ['username' => $username]) }}`;
                } else {
                    alert(data.message);
                }
            })
            .catch(error => console.error('Error:', error));
    });

</script>

@endsection