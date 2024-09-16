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
        
        // Verificar si ya existe un usuario con el correo ingresado
        $existingUser = Users::where('email', $request->email)->first();

        if ($existingUser) {
            return redirect()->route('signup')->with('error', 'Ya existe un usuario con este correo');
        }

        // Validar los datos del formulario
        if ($request->name == "" || $request->lastname == "" || $request->email == "" || $request->password == "") {
            return redirect()->route('signup')->with('warning', 'Todos los campos son obligatorios');
        }

        //Validar formato de correo
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->route('signup')->with('warning', 'Formato de correo incorrecto');
        }

        try {
            // Crear el nuevo usuario
            Users::create([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            //Enviar un correo de bienvenida
            mail ($to = $request->email, $subject = 'Bienvenido a Ticolancer', $request->name . ', ' . 'gracias por registrarte en Ticolancer. Te damos la bienvenida');

            return redirect()->route('login')->with('success', 'Registro exitoso, inicia sesión');
        } catch (\Exception $e) {
            return redirect()->route('signup')->with('error', 'Error al registrar: ' . $e->getMessage());
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
