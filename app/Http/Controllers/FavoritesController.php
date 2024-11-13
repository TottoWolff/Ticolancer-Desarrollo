<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FavoritesGigsTicolancer as FavoritesGigs;
use App\Models\GigsTicolancer as Gigs;

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
        //$gigs = Gigs::all(); 
        $gigId = FavoritesGigs::where('buyers_users_ticolancers_id', $user->id)->get('gigs_ticolancers_id');
        $gigs = Gigs::whereIn('id', $gigId)->get();
        //return response()->json($gigs);
        return view('buyers.favoritesGigs', compact('gigs', 'user', 'username'));
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
