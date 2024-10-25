<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GigsTicolancer;

use App\Models\SellersUsersTicolancer;
use App\Models\BuyersUsersTicolancer;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
;
use Carbon\Carbon;
use App\Models\GigsReviewsTicolancer;

class SellerGigsProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        //
        $gigs = GigsTicolancer::with(['reviews' => function ($query) {
            $query->select('gigs_ticolancers_id', \DB::raw('AVG(rating) as average_rating'))
                ->groupBy('gigs_ticolancers_id');
        }])
        ->join('sellers_users_ticolancers', 'gigs_ticolancers.sellers_users_ticolancers_id', '=', 'sellers_users_ticolancers.id') // Join con la tabla sellers_users_ticolancers
        ->where('sellers_users_ticolancers.buyers_users_ticolancers_id', '=', $id) // Filtra por el seller relacionado al buyer autenticado
        ->select('gigs_ticolancers.*') // Selecciona solo las columnas de gigs
        ->get();
        
          
        $reviews = GigsReviewsTicolancer::where('gigs_ticolancers_id', $id)->get();
        
        $ratings = $reviews->pluck('rating');
        $averageRating = number_format($ratings->avg(), 1); 
        
        
        $buyer = BuyersUsersTicolancer::where('id', $id)->first();
        $buyerId = $buyer->id;
        
        $sellerInfo = \App\Models\SellersUsersTicolancer::where('buyers_users_ticolancers_id', $buyerId)->first();
        
        $seller = SellersUsersTicolancer::where('buyers_users_ticolancers_id', $id)->first();
        $description = $seller ? $seller->description : null;
        $created_at = Carbon::parse($seller->created_at)->translatedFormat('F Y');
        $sellerFacebook = $sellerInfo ? $sellerInfo->facebook : 'https://es-la.facebook.com/#:~:text=Inicia%20sesi%C3%B3n%20en%20Facebook%20para%20empezar%20a%20compartir%20y';
        $sellerInstagram = $sellerInfo ? $sellerInfo->instagram : 'https://www.instagram.com/';
        $sellerTwitter = $sellerInfo ? $sellerInfo->twitter : 'https://x.com/';
        $sellerLinkedin = $sellerInfo ? $sellerInfo->linkedin : 'https://es.linkedin.com/#:~:text=1%20mil%20millones%20de%20miembros%20|%20Gestiona%20tu%20identidad';
        $sellerWebsite = $sellerInfo ? $sellerInfo->website : '#';
        
        $whatsappMessage = "Hola, me gustaría obtener más información sobre el servicio de";
        $emailSubject = "Consulta sobre servicio";
        $emailBody = "Hola,\n\nMe gustaría obtener más información sobre el servicio de";


        $username = $buyer->username;
        $name = $buyer->name;
        $lastname = $buyer->lastname;
        $email = $buyer->email;
        $phone = $buyer->phone;
        $username = $buyer->username;
        $profile = $buyer->picture;
        $buyerId = $buyer->id;
        $userLanguages = \DB::table('buyers_lang_ticolancers')
            ->where('buyers_users_ticolancers_id', $buyerId)
            ->join('languages_ticolancers', 'buyers_lang_ticolancers.languages_ticolancers_id', '=', 'languages_ticolancers.id')
            ->join('language_levels_ticolancers', 'buyers_lang_ticolancers.language_levels_ticolancers_id', '=', 'language_levels_ticolancers.id')
            ->select('languages_ticolancers.language as language_name', 'language_levels_ticolancers.level as level_name', 'languages_ticolancers.id as language_id', 'language_levels_ticolancers.id as level_id')
            ->get();
        $userProvince = $buyer->city->province->province;
        $userCity = $buyer->city->city;


        $languages = \DB::table('buyers_lang_ticolancers')
                ->where('buyers_users_ticolancers_id', $id)
                ->join('languages_ticolancers', 'buyers_lang_ticolancers.languages_ticolancers_id', '=', 'languages_ticolancers.id')
                ->join('language_levels_ticolancers', 'buyers_lang_ticolancers.language_levels_ticolancers_id', '=', 'language_levels_ticolancers.id')
                ->select('languages_ticolancers.language as language_name', 'language_levels_ticolancers.level as level_name')
                ->get();



        return view('sellers.sellerGigsProfile', 
        ['username' => $buyer->username, 'gigs' => $gigs], 
        compact('gigs','username', 'name', 'lastname', 'email', 'phone', 'username', 'buyerId', 'userLanguages','userProvince',
        'userCity', 'profile', 'reviews','averageRating', 'seller', 'description', 'created_at', 'languages', 'sellerFacebook',
        'sellerInstagram', 'sellerTwitter', 'sellerLinkedin','sellerWebsite', 'whatsappMessage', 'emailSubject', 'emailBody'));

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
