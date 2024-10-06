@extends('ticolancer.layout')

@section('content') 
<div class="grid grid-cols-1 bg-blue h-screen w-full max-sm:grid-cols-1">
    <div
        class="flex flex-col justify-center items-center px-[120px] gap-[20px] max-sm:w-[90vw] max-sm:px-0 max-sm:m-auto mt-[6rem]">
        <form action="{{ route('sellers.gigStore',['username'=>$username]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-4">
                <input
                    class="appearance-none border rounded-[10px] py-2 px-3 text-gray-700 leading-tight focus:outline-none w-[42rem]"
                    id="gig_name" name="gig_name" type="text" placeholder="Nombre del emprendimiento" required>
            </div>
            <div class="mt-4">
                <textarea
                    class="appearance-none border rounded-[10px] w-full pb-28 py-2 px-3 text-gray-700 leading-tight focus:outline-none"
                    id="gig_description" name="gig_description" placeholder="Descripcion" required
                    style="vertical-align: top;"></textarea>
            </div>
            <div class="mt-4">
                <input
                    class="appearance-none border rounded-[10px] w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"
                    id="gig_image" name="gig_image" type="text" placeholder="URL de la imagen" required>
            </div>
            <div class="mt-4">
                <input
                    class="appearance-none border rounded-[10px] w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"
                    id="gig_email" name="gig_email" type="email" placeholder="Correo electrónico" required>
            </div>
            <div class="mt-4">
                <input
                    class="appearance-none border rounded-[10px] w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"
                    id="gig_phone_number" name="gig_phone_number" type="tel" placeholder="Número de teléfono" required
                    oninput="formatPhoneNumber(this)">
            </div>
            <div class="mt-4">
                <div class="relative">
                    <select id="province_id" name="province_id"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Provincia">
                        <option value="" disabled selected>Provincia</option>
                        @foreach(\App\Models\ProvincesTicolancer::all() as $province)
                            <option value="{{ $province->id }}">{{ $province->province }}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M7 10l5 5 5-5H7z"/></svg>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <div class="relative">
                    <select id="city_id" name="city_id"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Ciudad">
                        <option value="" disabled selected>Ciudad</option>
                        @foreach(\App\Models\CitiesTicolancer::all() as $city)
                            <option value="{{ $city->id }}">{{ $city->city }}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M7 10l5 5 5-5H7z"/></svg>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between gap-4">
                <button
                    class="rounded-[10px] cursor-pointer transition-all duration-500 ease-out hover:translate-y-[-5px] hover:bg-white hover:text-green w-full bg-green px-[20px] py-[10px] text-white text-[16px] font-semibold outline-none mt-6"
                    type="submit">Crear</button>
            </div>
        </form>
        @if ($message = Session::get('success'))
                    <div class="bg-[#DCFCE7] border-[1px] border-[#4ADE80] text-[#15763D] px-4 py-3 rounded-[10px] text-center w-full" role="alert">
                        <p>{{ $message }}</p>
                    </div>
            @endif
        
    </div>
</div>

<script>
function formatPhoneNumber(input) {
    let value = input.value.replace(/\D/g, '');
    if (value.length > 4) {
        value = value.slice(0, 4) + '-' + value.slice(4, 8);
    }
    input.value = value;
}
</script>
@endsection