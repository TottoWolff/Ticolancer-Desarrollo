<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GigsReviewsTicolancer; 
use App\Models\GigsTicolancer;       
use App\Models\Buyers\BuyersUsersTicolancer;
use App\Models\Sellers\SellersUsersTicolancer;  
use Illuminate\Support\Facades\Auth;    

class GigReviewController extends Controller
{
    
    public function index($gigId)
    {
        $gig = GigsTicolancer::findOrFail($gigId);
        $reviews = GigsReviewsTicolancer::where('gigs_ticolancers_id', $gigId)->get();

        return view('sellers.sellerGig', compact('gig', 'reviews'));
    }


    public function store(Request $request, $gigId)
    {
        // Obtener el comprador autenticado
        $buyer = Auth::guard('buyers')->user();
        $buyerId = $buyer->id;
    
        // Validar los campos del request
        $request->validate([
            'comment' => 'required|string|max:500',
            'rating' => 'required|numeric|min:1|max:5',
            // Aquí omitimos la validación del 'buyers_users_ticolancers_id' 
            // porque ya lo obtenemos del usuario autenticado
        ]);
    
        // Crear la nueva review
        GigsReviewsTicolancer::create([
            'gigs_ticolancers_id' => $gigId, // Usamos el gigId que recibimos
            'buyers_users_ticolancers_id' => $buyerId, // Usamos el id del comprador autenticado
            'comment' => $request->comment,
            'rating' => $request->rating,
            'published_at' => now(),
        ]);
    
        // Mensaje de éxito o redirección
        return redirect()->back()->with('success', '¡Review creada con éxito!');
    }
    
}
