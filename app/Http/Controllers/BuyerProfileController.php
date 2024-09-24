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
        $buyerId = $buyer->id;
        
        $languages = \DB::table('buyers_lang_ticolancers')
        ->where('buyers_users_ticolancers_id', $buyerId)
        ->join('languages_ticolancers', 'buyers_lang_ticolancers.languages_ticolancers_id', '=', 'languages_ticolancers.id')
        ->join('language_levels_ticolancers', 'buyers_lang_ticolancers.language_levels_ticolancers_id', '=', 'language_levels_ticolancers.id')
        ->select('languages_ticolancers.language as language_name', 'language_levels_ticolancers.level as level_name')
        ->get();

        // return response()->json([
        //     'buyerId' => $buyerId,
        //     'languages' => $languages
        // ]);

        $profile = $buyer->picture;

        
        

        return view('buyers.buyerProfile', [
            'name' => $buyer->name, 
            'lastname' => $buyer->lastname, 
            'username' => $buyer->username,
            'email' => $buyer->email,
            'phone' => $buyer->phone,
            'joinDate' => $joinDate,
            'picture' => $profile,
            'cityName' => $city ? $city->city : null,
            'provinceName' => $province ? $province->province : null, 
            'languages' => $languages
        ]);
    }


    public function settings()
    {
        return view('buyers.buyerProfileSettings');
    }

    public function updatePicture(Request $request){
        //$request->validate([
            //'picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        //]);
        $buyer = Auth::guard('buyers')->user(); 

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = $buyer->name . '-' . $file->getClientOriginalName();
            $file->move(public_path('images/buyers_profiles'), $filename);
            $buyer = Auth::guard('buyers')->user();
            $buyer->picture = $filename;
            $buyer->save();

            return redirect()->back();  
        }

        

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
