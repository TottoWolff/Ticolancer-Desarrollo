<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GigsReviewsTicolancer; 
use App\Models\GigsTicolancer;       
use App\Models\Buyers\BuyersUsersTicolancer;
use App\Models\Sellers\SellersUsersTicolancer;      

class GigReviewController extends Controller
{
    
    public function index($gigId)
    {
        $gig = GigsTicolancer::findOrFail($gigId);
        $reviews = GigsReviewsTicolancer::where('gigs_ticolancers_id', $gigId)->get();

        return view('sellers.sellerGig', compact('gig', 'reviews'));
    }

    public function store(Request $request)
    {
        $request->validate([
            
            'gigs_ticolancers_id' => 'required|exists:gigs_ticolancers,id',
            'buyers_users_ticolancers_id' => 'required|exists:users,id',
            'comment' => 'required|string|max:500',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        return response()->json($request->all());

        // Crear nueva reseña
        GigsReviewsTicolancer::create([
            'gigs_ticolancers_id' => $request->gigs_ticolancers_id,
            'buyers_users_ticolancers_id' => $request->buyers_users_ticolancers_id,
            'comment' => $request->comment,
            'rating' => $request->rating,
            'published_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Reseña enviada con éxito');
    }
}
