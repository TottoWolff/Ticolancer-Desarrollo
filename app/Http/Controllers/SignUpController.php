<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersTicolancer as Users;

class SignUpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('ticolancer.signup');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('ticolancer.signup');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    
        try {
            Users::create([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            return redirect()->route('login')->with('success', 'Registro exitoso');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()->route('signup')->with('error', 'Ya existe un usuario con este correo');
            }

            return redirect()->route('signup')->with('error', 'Error al registrar');
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
