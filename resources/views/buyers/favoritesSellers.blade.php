@extends('buyers.layout')

@section('content')

    {{-- Hero --}}
    <div style="background-image: url(https://i.postimg.cc/FKf3877p/20201222135502-rana-cr.webp);" class=" bg-cover h-[600px] max-sm:h-[600px] bg-buttom flex items-center justify-center relative">
        <div class="absolute inset-0 bg-blue opacity-50"></div>
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class=" flex flex-col w-[90vw] gap-[20px] rad z-10 items-center justify-center">
        <h1 class="w-fit text-[72px] max-sm:text-[48px] font-light font-secondary text-white">Favoritos</h1>
        </div>
    </div>
    {{-- Hero end --}}

    {{-- Favorites --}}
    <div class=" w-[90vw] flex flex-col items-start justify-start m-auto py-[40px] gap-[20px] ">
        <h2 class="text-blue text-[32px] max-sm:text-[28px] font-medium">Mi lista de favoritos</h2>
        
        <div class="flex flex-row gap-[20px] border-b-[0.5px] border-blue border-opacity-50">
            <a href="{{  route('favorites.gigs', ['username' => $username])}}" class=" p-[5px]  text-blue text-[18px] max-sm:text-[14px] font-regular  transition-all duration-500 ease-out hover:text-green hover:translate-y-[-5px] ">Sercivios ({{ count($gigs) }})</a>
            <a href="{{  route('favorites.sellers', ['username' => $username])}}" class=" p-[5px]  text-green text-[18px] max-sm:text-[14px] font-regular  transition-all duration-500 ease-out hover:text-green hover:translate-y-[-5px] ">Freelancers ({{ count($favoritesSellers) }})</a>
        </div>
        
        <div class="grid grid-cols-6 gap-[30px] max-sm:grid-cols-2">
            @foreach ($favoritesSellers as $favoriteSeller)
            <div class="flex flex-col items-center justify-start gap-[10px] p-[20px] rounded-[16px] border-[0.5px] border-blue border-opacity-50 hover:border-green transition-all duration-500 ease-out ">
                <a href="{{ route('sellerGigsProfile', $favoriteSeller['buyers']['id'] ?? '') }}"><img class="rounded-full w-[80px] h-[80px] max-sm:w-[60px] max-sm:h-[60px] bg-center object-cover" src="{{ asset('images/buyers_profiles/'.$favoriteSeller['buyers']['picture']) }}" alt=""></a>
                <a href="{{ route('sellerGigsProfile', $favoriteSeller['buyers']['id'] ?? '') }}" class="text-blue text-[18px] max-sm:text-[14px] font-medium"> {{'@'.$favoriteSeller['buyers']['username'] }}</a>
                <p class="text-gray-600 text-[14px] max-sm:text-[14px] font-light text-center line-clamp-2">{{ $favoriteSeller['description'] }}</p>
                <a class="hover:text-green text-gray-500 underline text-[16px] font-light transition-all duration-500 ease-out" href="{{ route('sellerGigsProfile', $favoriteSeller['buyers']['id'] ?? '') }}">Ver perfil</a>
            </div>
            @endforeach
        </div>

    </div>
    {{-- Favorites end --}}

@endsection