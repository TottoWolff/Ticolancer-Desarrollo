<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminUsersTicolancer as AdminUsers;


class LoginAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $user = AdminUsers::where('username', $request->username)->first();

        if (Auth::guard('admin')->attempt($credentials)) {
            // Autenticación exitosa
            return redirect()->route('admin.dashboard', ['username' => $user->username]); 
        } 
        else if ($request->password == "" || $request->username == "")
        {
            return view('admin.login')->with('warning', 'Debes rellenar todos los campos'); 
        } 
        else  
        {
            // Autenticación fallida
            return redirect()->route('admin.login')->with('error', 'El correo o la contraseña son incorrectos');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout(); // Cierra la sesión

        return redirect()->route('admin.login')->with('success', 'Has cerrado sesión exitosamente.');
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
