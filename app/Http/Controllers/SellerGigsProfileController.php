<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GigsTicolancer;

use App\Models\SellersUsersTicolancer;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use App\Models\CitiesTicolancer as Cities;
use App\Models\BuyersLangTicolancer as BuyersLanguages;
use App\Models\LanguagesTicolancer as Languages;
use App\Models\LanguageLevelsTicolancer as LanguageLevels;
use App\Models\BuyersUsersTicolancer as BuyersUsers;
use App\Models\SellersUsersTicolancer as SellersUsers;
use Carbon\Carbon;
use App\Models\ProvincesTicolancer as Provinces;
use Illuminate\Support\Facades\Hash;
use App\Models\GigsReviewsTicolancer;

class SellerGigsProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        //
        
        $gigs = GigsTicolancer::with(['reviews' => function($query) {
            $query->select('gigs_ticolancers_id', \DB::raw('AVG(rating) as average_rating'))
                ->groupBy('gigs_ticolancers_id');
        }])->get();

        $selectedGig = $gigs->find($id);

        $reviews = GigsReviewsTicolancer::where('gigs_ticolancers_id', $id)->get();

        $ratings = $reviews->pluck('rating');
        $averageRating = number_format($ratings->avg(), 1); 

             

        $buyer = Auth::guard('buyers')->user();

        $buyerId = $buyer->id;

        $seller = SellersUsersTicolancer::where('buyers_users_ticolancers_id', $buyerId)->first();
        $description = $seller ? $seller->description : null;
        $created_at = Carbon::parse($seller->created_at)->translatedFormat('F Y');


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

        return view('sellers.sellerGigsProfile', 
        ['username' => $buyer->username, 'gigs' => $gigs], compact('gigs' ,'username', 'name', 'lastname', 'email', 'phone', 'username', 'buyerId', 'userLanguages', 'userProvince', 'userCity', 'profile', 'reviews', 'averageRating', 'selectedGig', 'seller', 'description', 'created_at'));

        
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
