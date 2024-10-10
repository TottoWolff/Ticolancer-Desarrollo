@extends('sellers.layout')
<div class="relative h-[825px] max-sm:h-[100px] flex items-center justify-center">
    
    <div class="absolute inset-0 bg-cover bg-bottom brightness-50" style="background-image: url(https://traveler.marriott.com/es/wp-content/uploads/sites/2/2017/11/Costa-Rica_Animal-encounters_toucan-GettyImages-503235008.jpg);">
    </div>
    
    <h1 class="relative z-10 w-fit text-[150px] max-sm:text-[48px] font-light font-secondary text-white">bienvenido</h1>
</div>
 
 </div>
 <div>
 {{-- Popular services --}}
        <div class="flex flex-col justify-center items-center bg-bg py-[40px] gap-[60px] m-auto max-sm:w-[90vw]">
            <h2 class="text-blue text-[36px] max-sm:text-[28px] font-light">Servicios <span class="text-green font-secondary">populares</span></h2>
            <div class="grid grid-cols-6 gap-[20px] max-sm:grid-cols-2">
                {{-- Desarrollo web --}}
                <a href="">
                        <div class="flex flex-col justify-center items-start bg-[#00732E] gap-[20px] max-sm:gap-[10px] p-[10px] rounded-[16px] hover:bg-opacity-85 transition-all duration-500 ease-out">
                            <h5 class="h-[60px] text-white font-semibold text-[20px] max-sm:text-[16px] p-[5px]">Desarrollo Web</h5>
                            <img class="rounded-[16px]" src="{{ asset('images/homepage/dev.jpg') }}" alt="">
                        </div>
                </a>
                {{-- Desarrollo web end --}}

                {{-- Diseño de logo--}}
                <a href="">
                        <div class="flex flex-col justify-center items-start bg-[#F97B4D] gap-[20px] max-sm:gap-[10px] p-[10px] rounded-[16px] hover:bg-opacity-85 transition-all duration-500 ease-out">
                            <h5 class="h-[60px] text-white font-semibold text-[20px] max-sm:text-[16px] p-[5px]">Diseño de logo</h5>
                            <img class="rounded-[16px]" src="{{ asset('images/homepage/diseno_logo.jpg') }}" alt="">
                        </div>
                </a>
                {{-- Diseño de logo end --}}

                {{-- Marketing --}}
                <a href="">
                        <div class="flex flex-col justify-center items-start bg-[#687200] gap-[20px] max-sm:gap-[10px] p-[10px] rounded-[16px] hover:bg-opacity-85 transition-all duration-500 ease-out">
                            <h5 class="h-[60px] text-white font-semibold text-[20px] max-sm:text-[16px] p-[5px]">Marketing</h5>
                            <img class="rounded-[16px]" src="{{ asset('images/homepage/marketing.jpg') }}" alt="">
                        </div>
                </a>
                {{-- Marketing end --}}

                {{-- arquitectura y diseño --}}
                <a href="">
                        <div class="flex flex-col justify-center items-start bg-[#4D1727] gap-[20px] max-sm:gap-[10px] p-[10px] rounded-[16px] hover:bg-opacity-85 transition-all duration-500 ease-out">
                            <h5 class="w-[180px] h-[60px]  text-white font-semibold text-[20px] max-sm:text-[16px] p-[5px]">Arquitectura y Diseño Interior</h5>
                            <img class="rounded-[16px]" src="{{ asset('images/homepage/arquitectura.jpg') }}" alt="">
                        </div>
                </a>
                {{-- arquitectura y diseño end --}}

                {{-- desarrollo de software --}}
                <a href="">
                        <div class="flex flex-col justify-center items-start bg-[#254200] gap-[20px] max-sm:gap-[10px] p-[10px] rounded-[16px] hover:bg-opacity-85 transition-all duration-500 ease-out">
                            <h5 class="w-[180px] h-[60px]  text-white font-semibold text-[20px] max-sm:text-[16px] p-[5px]">Desarrollo de Software</h5>
                            <img class="rounded-[16px]" src="{{ asset('images/homepage/dev.jpg') }}" alt="">
                        </div>
                </a>
                {{-- desarrollo de software end --}}

                {{-- video --}}
                <a href="">
                        <div class="flex flex-col justify-center items-start bg-[#C66783] gap-[20px] max-sm:gap-[10px] p-[10px] rounded-[16px] hover:bg-opacity-85 transition-all duration-500 ease-out">
                            <h5 class="w-[180px] h-[60px] text-white font-semibold text-[20px] max-sm:text-[16px] p-[5px]">Edición de Video</h5>
                            <img class="rounded-[16px]" src="{{ asset('images/homepage/video.jpg') }}" alt="">
                        </div>
                </a>
                {{-- video end --}}
            </div>
        </div>
    {{-- Popular services end --}}
 </div>
<div class="bg-blue pt-4">
    
    
    <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 p-4 md:p-2 xl:p-8 mt-20">
        

        
        @foreach ($gigs as $gig)
            <!-- card -->
            <div class="relative bg-white border rounded-md shadow-md dark:bg-gray-800 dark:border-gray-700 transform transition duration-500 hover:scale-105 h-[360px] w-[450px] ">
                
                <div class="p-4 flex justify-center pt-6">
                    <a href="{{ route('sellerGigsProfile', ['username' => $username]) }}">
                        
                    <img class="rounded-sm w-[600px] h-[200px] object-cover" src="{{ asset($gig->gig_image) }}" alt="{{ $gig->gig_name }}" loading="lazy">
                    </a>
                </div>

                <div class="px-4 pb-3">
                    <div>
                        <a href="#">
                            
                            <h5 class="text-2xl font-semibold tracking-tight hover:text-green transition-all duration-500 hover:translate-y-[-5px] ease-out text-gray-900 dark:text-white">
                                {{ $gig->gig_name }}
                            </h5>
                        </a>

                        
                        <p class="antialiased text-gray-600 dark:text-gray-400 text-lg break-all pb-2">
                            {{ $gig->gig_description }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>