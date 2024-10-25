<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GigsTicolancer;
use App\Models\GigsCategoriesTicolancer as GigsCategories;
use Illuminate\Support\Facades\Auth;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        //

        // Si el usuario está autenticado, obtener su username, si no, dejarlo en null
        $user = Auth::guard('buyers')->user();
        $username = $user ? $user->username : null;
        // Obtener todos los gigs
        $gigs = GigsTicolancer::where('gigs_categories_ticolancers_id', $id)->get();
        $nameCategory = GigsCategories::where('id', $id)->value('category');
        $imageCategory = GigsCategories::where('id', $id)->value('image');
        return view('ticolancer.categorie', compact('gigs', 'nameCategory', 'imageCategory', 'username'));
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
