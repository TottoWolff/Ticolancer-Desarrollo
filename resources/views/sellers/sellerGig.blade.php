@extends('buyers.buyerLayout')<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <nav class="bg-[#F8FBFF] py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">

            <div class="flex items-center">
                <img src="{{ asset('icons/logo.svg') }}" alt="TicoLancer logo" class="h-10">
            </div>
            <div class="w-full max-w-xl mx-auto">
                <div class="relative">
                    <input type="text" placeholder="¿Cuál servicio buscas hoy?" class="w-full border border-gray-300 rounded-full px-5 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button class="absolute right-3 top-1/2 transform -translate-y-1/2 bg-transparent focus:outline-none">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1010.5 3a7.5 7.5 0 106.15 13.65z"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="flex items-center">
                <img src="{{ asset('images/profile/photo.png') }}" alt="Profile picture" class="w-10 h-10 rounded-full">
            </div>
        </div>
    </nav>

    <section class="px-[15rem] p-20">
        <section>
            <div class="grid gap-2">
                <h1 class="text-3xl font-semibold">Modelado 3D</h1>
                <h2 class="text-xl">Modelado 3D en Blender</h2>
            </div>

            <div class="flex max-sm:grid gap-6 mt-3 ">
                <div>
                    <img class="w-[70px] max-sm:w-[70px]" src="{{ asset('images/profile/photo.png') }}" alt="">
                </div>
                        
                <div class="grid">
                    <div class="grid grid-cols-2 max-sm:grid-cols-1 max-md:grid-cols-1 max-lg:grid-cols-1 gap-30 max-sm:gap-1">
                        <div class="w-40">
                            <span class="text-primary font-semibold text-[18px] max-sm:text-[14px]">Emanuel Jiménez</span>
                        </div>
                        <span class="text-[16px] max-sm:text-[12px] font-light text-gray-400" >@jimenezemanuel</span>
                    </div>
                    <div class="flex">
                        <img class="w-[14px] h-[15px] mr-2 mb-2" src="{{ asset('images/profile/star.png') }}" alt="">
                        <span class="text-[16px] font-light text-black">4.8</span>
                    </div>
                    <div class="flex">
                        <img class="w-[14px] h-[19px] mr-2" src="{{ asset('icons/location.svg') }}" alt="">
                        <span class="text-[16px] font-light text-black max-sm:text-[12px]" >San Ramón, Aljuela, CR</span>
                    </div>
                </div>
            </div>


            <div class="mt-3">
                <img class="rounded-md" id="mainImage" src=" {{ asset('images/profile/serviceImage1.png') }}" alt="">
            </div>

            <div class="flex  space-x-4 mt-6">
                <img onclick="changeImage(this)" class="w-[156px] h-24 object-cover rounded-md shadow cursor-pointer" src="{{ asset('images/profile/serviceImage1.png') }}" alt="Imagen 1">
                <img onclick="changeImage(this)" class="w-[156px] h-24 object-cover rounded-md shadow cursor-pointer" src="{{ asset('images/profile/serviceImage2.png') }}" alt="Imagen 2">
                <img onclick="changeImage(this)" class="w-[156px] h-24 object-cover rounded-md shadow cursor-pointer" src="{{ asset('images/profile/serviceImage3.png') }}" alt="Imagen 3">
                <img onclick="changeImage(this)" class="w-[156px] h-24 object-cover rounded-md shadow cursor-pointer" src="{{ asset('images/profile/serviceImage4.png') }}" alt="Imagen 4">
            </div>


            <div class="flex flex-col md:flex-row">
 

 
  <div class="md:w-80 md:ml-8 p-4 md:fixed right-[26rem] top-36 h-auto md:h-screen">
    <div class="bg-white shadow-md border border-gray-300 rounded-lg p-4">
      <h2 class="text-lg font-bold">Detalles del servicio</h2>
      <p class="mt-2 text-xl font-semibold">Desde ₡100,000</p>

      <div class="flex items-center mt-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
          <path d="M9.049 2.927a1 1 0 011.902 0l1.716 4.937a1 1 0 00.95.69h5.18a1 1 0 01.593 1.805l-4.192 3.052a1 1 0 00-.364 1.118l1.716 4.937a1 1 0 01-1.54 1.118L10 15.812l-4.192 3.052a1 1 0 01-1.54-1.118l1.716-4.937a1 1 0 00-.364-1.118L1.428 9.36a1 1 0 01.593-1.805h5.18a1 1 0 00.95-.69l1.716-4.937z"/>
        </svg>
        <span class="ml-1 text-gray-700">4.0</span>
        <span class="ml-1 text-gray-500">(140)</span>
      </div>

      <div class="mt-4">
        <h3 class="text-md font-semibold">Contáctame</h3>
        <div class="mt-2">
          <button class="w-full flex items-center justify-center bg-green-500 text-white py-2 px-4 rounded-lg mb-2 hover:bg-green-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
              <path d="M1 4a2 2 0 012-2h14a2 2 0 012 2v12a2 2 0 01-2 2H3a2 2 0 01-2-2V4zm5.707 1.707a1 1 0 00-1.414 1.414l6 6a1 1 0 001.414-1.414l-6-6zM6 8.75a.75.75 0 111.5 0 .75.75 0 01-1.5 0z"/>
            </svg>
            Whatsapp
          </button>
          <button class="w-full flex items-center justify-center bg-blue-500 text-white py-2 px-4 rounded-lg mb-2 hover:bg-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M22 2.01L11 13 7 9l-5 5 9 9 12-12V2.01z"/>
            </svg>
            Correo electrónico
          </button>
        </div>
      </div>

      <div class="mt-4">
        <p class="text-md text-gray-700">Teléfono: <strong>6207-6022</strong></p>
      </div>
    </div>
  </div>
</div>



            <section class="max-sm:text-2xl mt-10">
                <h1 class="text-primary font-bold text-[20px] max-sm:text-[14px]">Descripción del servicio</h1>
                <p class="text-[16px] max-sm:text-[14px] font-light text-black mt-3">
                ¡Hola! Soy Emanuel Jiménez, un experto en modelado 3D con más de 5 </br> 
                años de experiencia, especializado en la creación de modelos 3D para</br>
                diferentes industrias, incluyendo arquitectura, videojuegos y productos</br>
                comerciales.</br>
                </br>
                Mi objetivo es que todos mis clientes queden completamente satisfechos,</br>
                por lo que ofrezco revisiones ilimitadas para asegurar que cada detalle</br>
                cumpla con tus expectativas.</br>
                </br>
                Me enfoco en ofrecerte un modelado preciso y detallado, adaptado a tus</br>
                necesidades específicas, ya sea para renderizados fotorrealistas,</br>
                animación o impresión 3D.</br>
                </br>
                Todos mis paquetes incluyen:</br>

                -Modelos en alta calidad, listos para renderizar o animar</br>
                -Revisión ilimitada para ajustes y mejoras</br>
                -Entrega en múltiples formatos 3D compatibles con tus herramientas</br>
                -Asesoramiento personalizado para optimizar el uso de tus modelos</br>
            </section>


            <div >
                <div class="flex max-sm:grid gap-9 mt-20 border border-gray-300 rounded-md p-5 shadow-md w-[667px]">
                    <div>
                        <img class="w-[130px] max-sm:w-[120px]" src="{{ asset('images/profile/photo.png') }}" alt="">
                    </div>
                    
                    <div class="grid">
                        <div class="grid grid-cols-2 max-sm:grid-cols-1 max-md:grid-cols-1 max-lg:grid-cols-1 gap-30 max-sm:gap-1">
                            <div class="w-40">
                                <span class="text-primary font-semibold text-[18px] max-sm:text-[14px]">Emanuel Jiménez</span>
                            </div>
                            <span class="text-[16px] max-sm:text-[12px] font-light text-gray-400" >@jimenezemanuel</span>
                        </div>
                        <div class="flex">
                            <img class="w-[14px] h-[15px] mr-2 mb-2" src="{{ asset('images/profile/star.png') }}" alt="">
                            <span class="text-[16px] font-light text-black">4.8</span>
                        </div>
                        <div class="flex">
                            <img class="w-[14px] h-[19px] mr-2" src="{{ asset('icons/location.svg') }}" alt="">
                            <span class="text-[16px] font-light text-black max-sm:text-[12px]" >San Ramón, Aljuela, CR</span>
                        </div>
                        <div class="flex">
                            <img class="w-[14px] h-[19px] mr-2" src="{{ asset('images/profile/user.png') }}" alt="">
                            <span class="text-[16px] max-sm:text-[14px] font-light text-black">Se unió en enero, 2023</span>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>
    </section>

    <script>
        function changeImage(element) 
        {
            const mainImage = document.getElementById('mainImage');
            mainImage.src = element.src;
        }
    </script>
    
</body>
</html>
