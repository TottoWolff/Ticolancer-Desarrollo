<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GigsTicolancer;
use Illuminate\Support\Facades\Auth;
use App\Models\GigsCategoriesTicolancer as GigsCategories;
use App\Models\GigsImagesTicolancer as GigsImages;
use App\Models\SellersUsersTicolancer as SellersUsers;
use Carbon\Carbon;

class GigsController extends Controller
{
    /*************  ✨ Codeium Command ⭐  *************/
    /**
     * Show the gigs page.
     *
     * @return \Illuminate\Http\Response
     */
    /******  7ac877d0-2106-48c0-b5c0-efcb80a337ae  *******/
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

        $userId = $user->id;
        $date = Carbon::now();

        // Verificar si el buyer logueado tambien es seller
        $sellers = SellersUsers::where('buyers_users_ticolancers_id', $userId)->first();
        $sellerId = $sellers->id;

        $gig = new GigsTicolancer;
        $gig->gig_name = $request->gig_name;
        $gig->gig_description = $request->gig_description;
        $gig->gig_price = $request->gig_price;
        $gig->gigs_categories_ticolancers_id = $request->gig_category;
        $gig->sellers_users_ticolancers_id = $sellerId;
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

        // Manejar las imágenes
        $images = [
            $request->file('gig_image1'),
            $request->file('gig_image2'),
            $request->file('gig_image3'),
            $request->file('gig_image4'),
        ];


        foreach ($images as $image) {
            if ($image) {
                $fileType = $image->getClientOriginalExtension();
                $filename = $gig->gig_name . '_' . uniqid() . '.' . $fileType; // Agrega un identificador único para evitar conflictos

                // Mover el archivo a la carpeta pública
                $image->move(public_path('images/gigs'), $filename);

                // Crear una nueva entrada en GigsImages
                GigsImages::create([
                    'gigs_ticolancers_id' => $gig->id, // Usar el ID del gig recién creado
                    'image' => $filename
                ]);
            }
        }

        return redirect()->back()->with('success', 'Gig creado exitosamente');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $gig = GigsTicolancer::find($id);
        $user = Auth::guard('buyers')->user();
        $username = $user->username;
        $categories = GigsCategories::all();
        $gig_category_id = $gig->gigs_categories_ticolancers_id;
        //return response()->json($gig_category_id);
        $gig_category_name = GigsCategories::find($gig_category_id)->category;
        $gig_price = $gig->gig_price;
        $gig_image = $gig->gig_image;
        $images = GigsImages::where('gigs_ticolancers_id', $id)->get();
        $imagesNames = $images->pluck('image');
        //return response()->json($imagesNames);

        return view('sellers.sellerGigsEdit', compact('gig', 'user', 'categories', 'imagesNames', 'username', 'gig_category_id', 'gig_category_name', 'gig_price', 'gig_image'));
    }

    public function update(Request $request, $id)
    {

        $gig = GigsTicolancer::find($id);



        $gig->update([
            'gig_name' => $request->gig_name,
            'gig_description' => $request->gig_description,
            'gig_price' => $request->gig_price,
            'gigs_categories_ticolancers_id' => $request->gig_category,
        ]);

        if ($request->hasFile('gig_image')) {
            $gigImage = $gig->gig_image;
            $currentPicturePath = public_path('images/gigs/' . $gigImage);
            unlink($currentPicturePath);
            try {
                $file = $request->file('gig_image');
                $fileType = $file->getClientOriginalExtension();
                $filename = $gig->gig_name . '.' . $fileType;

                // Mover el archivo a la carpeta pública
                $file->move(public_path('images/gigs'), $filename);

                // Guardar el nombre del archivo en el modelo
                $gig->gig_image = $filename;
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Error al mover la imagen: ' . $e->getMessage());
            }
        } else {
            return redirect()->back()->with('error', 'No se subió ninguna imagen.');
        }

        // Manejar otras imágenes
        $images = [
            $request->file('gig_image1'),
            $request->file('gig_image2'),
            $request->file('gig_image3'),
            $request->file('gig_image4'),
        ];

        foreach ($images as $image) {
            if ($image) {
                $fileType = $image->getClientOriginalExtension();
                $filename = $gig->gig_name . '_' . uniqid() . '.' . $fileType;

                try {
                    $image->move(public_path('images/gigs'), $filename);
                    GigsImages::create([
                        'gigs_ticolancers_id' => $gig->id,
                        'image' => $filename
                    ]);
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', 'Error al mover la galería de imágenes: ' . $e->getMessage());
                }
            }
        }

        return redirect()->back()->with('success', 'Gig actualizado correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     $gig = GigsTicolancer::findOrFail($id);
    //     $gig->delete();

    //     return redirect()->back()->with('warning', 'Gig eliminado exitosamente');
    // }

    public function destroy(string $id)
    {
        // Encuentra el gig con el ID proporcionado
        $gig = GigsTicolancer::findOrFail($id);

        // Si el gig tiene imágenes, puedes eliminarlas manualmente (opcional si ya usas cascade en la migración)
        if ($gig->images) {
            foreach ($gig->images as $image) {
                // Eliminar la imagen físicamente del servidor (opcional)
                $imagePath = public_path('images/gigs/' . $image->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);  // Elimina el archivo de imagen
                }
            }
        }

        // Elimina el gig (si tienes cascade en las imágenes, las imágenes se eliminarán automáticamente)
        $gig->delete();

        // Redirige con un mensaje de éxito
        return redirect()->back()->with('warning', 'Gig eliminado exitosamente');
    }
}
