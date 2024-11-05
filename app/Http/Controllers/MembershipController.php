<?php

namespace App\Http\Controllers;

use App\Models\MembershipsTicolancer;
use App\Models\SellersUsersTicolancer as SellersUsers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return view('ticolancer.membership');
    }



    public function paymentIndex($category)
    {
        //
        return view('ticolancer.payment', ['category' => $category]);
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
        // Validar los datos de entrada
        $request->validate([
            'category' => 'required|integer',
        ]);

        // Obtener el usuario autenticado
        $user = Auth::guard('buyers')->user();
        $idUser = $user->id;

        // Obtener el ID del vendedor asociado al usuario
        $seller = SellersUsers::where('buyers_users_ticolancers_id', $idUser)->first();

        // Verificar que el vendedor existe
        if (!$seller) {
            return response()->json(['error' => 'Vendedor no encontrado.'], 404);
        }

        // Eliminar la membresía del vendedor si ya tiene una
        MembershipsTicolancer::where('sellers_users_ticolancers_id', $seller->id)->delete();

        // Definir la fecha de expiración de acuerdo a la categoría
        $category = $request->category;
        switch ($category) {
            case 1:
                $expiryDate = now()->addDays(30);
                break;
            case 2:
                $expiryDate = now()->addMonths(6);
                break;
            case 3:
                $expiryDate = now()->addYear();
                break;
            default:
                return response()->json(['error' => 'Categoría no válida.'], 400);
        }

        // Crear una nueva membresía
        $membership = new MembershipsTicolancer();
        $membership->sellers_users_ticolancers_id = $seller->id;
        $membership->membership_categories_ticolancers_id = $category;
        $membership->status = '1';
        $membership->paymentDate = now();
        $membership->trialExpirationDate = $expiryDate;
        $membership->created_at = now();

        if ($membership->save()) {
            return redirect()->route('sellerProfile', ['username' => $user->username])->with('success', 'Tu membresía ha sido renovada.');
        } else {
            return response()->json(['error' => 'Error al guardar la membresía.'], 500);
        }
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
