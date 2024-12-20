<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GigsTicolancer; 
use App\Models\SellersUsersTicolancer;
use Illuminate\Support\Facades\Auth;

class DashboardGigsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::guard('buyers')->user(); // Obtenemos al usuario autenticado
        $username = $user->username;

        // Obtenemos todos los gigs con sus calificaciones promedio utilizando el accesor en el modelo
        $gigs = GigsTicolancer::with('reviews')->get();

        return view('buyers.dashboard', compact('gigs', 'user', 'username'));
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