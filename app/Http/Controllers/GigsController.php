<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GigsTicolancer;
use App\Models\ProvincesTicolancer;
use App\Models\CitiesTicolancer;
use Illuminate\Support\Facades\Auth;

class GigsController extends Controller
{
    public function index()
    {
        $sessionActive = Auth::guard('buyers')->check();
    
        if (!$sessionActive) {
            return redirect()->route('login');
        } else {
            $user = Auth::guard('buyers')->user();
    
            if ($user) {
                $username = $user->username;
                return view('sellers.sellerGigs', ['username' => $username], compact('username'));
            } else {
                return redirect()->route('login'); // En caso de que no haya usuario autenticado
            }
        }
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function show()
    {
        $gigs = GigsTicolancer::all();
        $gigs->makeHidden(['created_at', 'updated_at']);
        return response()->json($gigs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::guard('buyers')->check()) {
            return redirect()->route('login');
        }else{
            
            $user = Auth::guard('buyers')->user();

            
            $request->validate([
                'gig_name' => 'required',
                'gig_image' => 'required|url',
                'gig_description' => 'required',
                'gig_email' => 'required|email',
                'gig_phone_number' => 'required',
                'province_id' => 'required|exists:provinces_ticolancers,id',
                'city_id' => 'required|exists:cities_ticolancers,id',
            ]);
            
            $gig = new GigsTicolancer;
            $gig->gig_name = $request->gig_name;
            $gig->gig_image = $request->gig_image;
            $gig->gig_description = $request->gig_description;
            $gig->gig_email = $request->gig_email;
            $gig->gig_phone_number = $request->gig_phone_number;
            $gig->provinces_ticolancers_id = $request->province_id;
            $gig->cities_ticolancers_id = $request->city_id;
            $gig->sellers_users_ticolancers_id = $user->id;
            $gig->save();
            
            return redirect()->back()->with('warning', 'Gig creado exitosamente');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gig = GigsTicolancer::findOrFail($id);
        return view('edit', ['gig' => $gig]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'gig_name' => 'required',
            'gig_image' => 'url',
            'gig_description' => 'required',
            'gig_email' => 'required|email',
            'gig_phone_number' => 'required',
            'province_id' => 'required|exists:provinces_ticolancers,id',
            'city_id' => 'required|exists:cities_ticolancers,id',
        ]);

        $gig = GigsTicolancer::findOrFail($id);
        $gig->gig_name = $request->gig_name;
        $gig->gig_image = $request->gig_image;
        $gig->gig_description = $request->gig_description;
        $gig->gig_email = $request->gig_email;
        $gig->gig_phone_number = $request->gig_phone_number;
        $gig->province_id = $request->province_id;
        $gig->city_id = $request->city_id;
        $gig->save();

        return redirect('/gigs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gig = GigsTicolancer::findOrFail($id);
        $gig->delete();
        return redirect('/gigs');
    }
}
