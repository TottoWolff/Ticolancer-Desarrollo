<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GigsTicolancer;
use App\Models\SellersUsersTicolancer;
use App\Models\GigsReviewsTicolancer;
use App\Models\GigsImagesTicolancer;


use Illuminate\Support\Facades\Auth;

class SellerGigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $gig = GigsTicolancer::findOrFail($id); 

        $buyer = Auth::guard('buyers')->user();

        $seller = $buyer->seller;

       

        $reviews = GigsReviewsTicolancer::
        where('gigs_ticolancers_id', $id)
        ->join('gigs_ticolancers', 'gigs_reviews_ticolancers.gigs_ticolancers_id', '=', 'gigs_ticolancers.id')
        ->select('gigs_reviews_ticolancers.*')
        ->get();

        $ratings = $reviews->pluck('rating');
        $averageRating = $ratings->avg();

        $images = GigsImagesTicolancer::where('gigs_ticolancers_id', $id)->get();

        $imagesNames = $images->pluck('image');

        // return response ()->json($imagesNames);


        $username = $buyer->username;
        $name = $buyer->name;
        $lastname = $buyer->lastname;
        $email = $buyer->email;
        $phone = $buyer->phone;
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

        return view('sellers.sellerGig', compact(
            'gig', 'username', 'name', 'lastname', 'email', 'phone', 'buyerId', 'userLanguages', 'userProvince', 'userCity', 'profile', 'reviews', 'ratings', 'averageRating', 'imagesNames'
        ));
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
