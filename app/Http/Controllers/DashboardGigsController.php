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
        // $gigs = GigsTicolancer::all();

        // return view ('sellers.dashboardGigs', compact('gigs'));

        $gigs = GigsTicolancer::all();

        $buyer = Auth::guard('buyers')->user();
        $username = $buyer->username;


        return view('sellers.dashboardGigs', ['username' => $buyer->username, 'gigs' => $gigs], compact('gigs' ,'username'));

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