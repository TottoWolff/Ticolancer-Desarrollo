<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SellerApplication;
use Illuminate\Support\Facades\Auth;

class SellerApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('buyers.sellerApplication');
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
        //return response()->json($request->all());
        $request->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'birthdate' => 'required|date',
            'description' => 'required|string',
            'phone' => 'required|string|max:15',
            'residence_address' => 'required|string|max:255',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'website' => 'nullable|url',
        ]);

        // Guardar la imagen de perfil
        if ($request->hasFile('picture')) {
            $imageName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('images/sellerApplication'), $imageName);
        } else {
            $imageName = null; 
        }

        $buyer = Auth::guard('buyers')->user(); 
        $buyerId = $buyer->id;
        $username = $buyer->username;

        
        $sellerApplication = new SellerApplication();
        $sellerApplication->buyers_users_ticolancers_id = $buyerId;	
        $sellerApplication->picture = $imageName;
        $sellerApplication->birthdate = $request->birthdate;
        $sellerApplication->description = $request->description;
        $sellerApplication->phone = $request->phone;
        $sellerApplication->residence_address = $request->residence_address;
        $sellerApplication->facebook = $request->facebook;
        $sellerApplication->instagram = $request->instagram;
        $sellerApplication->twitter = $request->twitter;
        $sellerApplication->linkedin = $request->linkedin;
        $sellerApplication->website = $request->website;
        $sellerApplication->save(); 

        return redirect()->route('buyers.dashboard', ['username' => $username])->with('success', 'Solicitud enviada exitosamente.');
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
