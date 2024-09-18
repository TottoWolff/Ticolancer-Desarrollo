<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminUsersTicolancer as AdminUsers;


class SignUpAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.signup');
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

        //Verificar si existe un usuario con el username ingresado
        $existingUsername = AdminUsers::where('username', $request->username)->first();
        if ($existingUsername) {
            return redirect()->route('admin.signup')->with('error', 'Ya existe un usuario con este nombre de usuario');
        }

        // Validar los datos del formulario
        if ($request->username == "" || $request->email == "" || $request->password == "") {
            return redirect()->route('admin.signup')->with('warning', 'Todos los campos son obligatorios');
        }

        //Validar formato de correo
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->route('admin.signup')->with('warning', 'Formato de correo incorrecto');
        }

        try {
            // Crear el nuevo usuario administrador
            AdminUsers::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            return redirect()->route('admin.login')->with('success', 'Usuario administrador creado exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('admin.signup')->with('error', $e->getMessage());
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
