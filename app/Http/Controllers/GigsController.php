<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GigsTicolancer;
use Illuminate\Support\Facades\Auth;
use App\Models\GigsCategoriesTicolancer as GigsCategories ;
use Carbon\Carbon;

class GigsController extends Controller
{
    public function index()
    {
        $sessionActive = Auth::guard('buyers')->check();

        if (!$sessionActive) {
            return redirect()->route('login');
        } else {
            $user = Auth::guard('buyers')->user();
            $username = $user->username;

            $categories = GigsCategories::all();


            if ($user) {
                $username = $user->username;
                return view('sellers.sellerGigs', ['username' => $username], compact('user', 'categories'));
            } else {
                return redirect()->route('login');
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
        }

        $user = Auth::guard('buyers')->user();
        $date = Carbon::now();

        $gig = new GigsTicolancer;
        $gig->gig_name = $request->gig_name;
        $gig->gig_description = $request->gig_description;
        $gig->gig_price = $request->gig_price;
        $gig->gigs_categories_ticolancers_id = $request->gig_category;
        $gig->sellers_users_ticolancers_id = $user->id;
        $gig->published_at = $date;

        if ($request->hasFile('gig_image')) {
            $file = $request->file('gig_image');
            $fileType = $file->getClientOriginalExtension();
            $filename = $gig->gig_name . '.' . $fileType;
            
            // Mover el archivo a la carpeta pública
            $file->move(public_path('images/gigs'), $filename);
            
            // Guardar el nombre del archivo en el modelo
            $gig->gig_image = $filename;
        } else {
            return redirect()->back()->with('error', 'No se subió ninguna imagen.');
        }

        // Guardar el gig en la base de datos
        $gig->save();

        return redirect()->back()->with('success', 'Gig creado exitosamente');
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

        return redirect()->back()->with('warning', 'Gig eliminado exitosamente');
    }
}
