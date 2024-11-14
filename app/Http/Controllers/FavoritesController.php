<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FavoritesGigsTicolancer as FavoritesGigs;
use App\Models\GigsTicolancer as Gigs;
use App\Models\FavSellersTicolancer as FavoritesSellers;
use App\Models\SellersUsersTicolancer as Sellers;
use App\Models\BuyersUsersTicolancer as Buyers;

class FavoritesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::guard('buyers')->user();
        $username = $user->username;
        $gigId = FavoritesGigs::where('buyers_users_ticolancers_id', $user->id)->get('gigs_ticolancers_id');
        $gigs = Gigs::whereIn('id', $gigId)->get();
        $sellerIds = FavoritesSellers::where('buyers_users_ticolancers_id', $user->id)
                    ->pluck('sellers_users_ticolancers_id');
        
        $favoritesSellers = Sellers::with('buyers')
                                        ->whereIn('id', $sellerIds)
                                        ->get();
        return view('buyers.favoritesGigs', compact('gigs', 'user', 'username', 'favoritesSellers'));
    }

    public function favoritesSellers(){
        $user = Auth::guard('buyers')->user();
        $username = $user->username;
        $sellerIds = FavoritesSellers::where('buyers_users_ticolancers_id', $user->id)
                    ->pluck('sellers_users_ticolancers_id');
        
        $favoritesSellers = Sellers::with('buyers')
                                        ->whereIn('id', $sellerIds)
                                        ->get();

        //return response()->json($favoritesSellers);

        $gigId = FavoritesGigs::where('buyers_users_ticolancers_id', $user->id)->get('gigs_ticolancers_id');
        $gigs = Gigs::whereIn('id', $gigId)->get();
        return view('buyers.favoritesSellers', compact('gigs', 'user', 'username', 'favoritesSellers'));
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
    public function likeGig(Request $request)
    {
        //
        $usernameId = request('usernameId');
        $gigId = request('gigId');

        $favorites = FavoritesGigs::create([
            'buyers_users_ticolancers_id' => $usernameId,
            'gigs_ticolancers_id' => $gigId,
        ]);

        return redirect()->back()->with('success', 'Gig agregado a favoritos exitosamente');

    }

   

    public function unlikeGig(Request $request)
    {
        $usernameId = $request->input('usernameId');
        $gigId = $request->input('gigId');

        FavoritesGigs::where('buyers_users_ticolancers_id', $usernameId)->where('gigs_ticolancers_id', $gigId)->delete();

        return redirect()->back()->with('success', 'Gig eliminado de favoritos exitosamente');
    }


    public function likeSeller(Request $request)
    {
        //
        $usernameId = request('usernameId');
        $sellerId = request('sellerId');

        $favorites = FavoritesSellers::create([
            'buyers_users_ticolancers_id' => $usernameId,
            'sellers_users_ticolancers_id' => $sellerId,
        ]);

        return redirect()->back()->with('success', 'Freelancer agregado a favoritos exitosamente');

    }

    public function unlikeSeller(Request $request)
    {
        $usernameId = $request->input('usernameId');
        $sellerId = $request->input('sellerId');

        FavoritesSellers::where('buyers_users_ticolancers_id', $usernameId)->where('sellers_users_ticolancers_id', $sellerId)->delete();

        return redirect()->back()->with('success', 'Freelancer eliminado de favoritos exitosamente');
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
