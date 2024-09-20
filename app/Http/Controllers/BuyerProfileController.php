<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CitiesTicolancer as Cities;
use App\Models\BuyersLangTicolancer as BuyersLanguages;
use Carbon\Carbon;

class BuyerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buyer = Auth::guard('buyers')->user(); 
        $city = $buyer->city;
        $province = $city->province;
        $joinDate =  $city->created_at = Carbon::parse($city->created_at)->format('j M, Y');
        //$languages = $buyer->languages;
        

        return view('buyers.buyerProfile', [
            'name' => $buyer->name, 
            'lastname' => $buyer->lastname, 
            'username' => $buyer->username,
            'email' => $buyer->email,
            'phone' => $buyer->phone,
            'joinDate' => $joinDate,
            'cityName' => $city ? $city->city : null,
            'provinceName' => $province ? $province->province : null, 
           // 'languages' => $languages
        ]);
    }


    public function settings()
    {
    
     return view('buyers.buyerProfileSettings');
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
