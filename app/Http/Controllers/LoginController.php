<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UsersTicolancer as Users;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\RecoverPasswordMail; 

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('ticolancer.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
            return redirect()->intended('dashboard'); 
        } 
        else if ($request->email == "" || $request->password == "")
        {
            return redirect()->route('login')->with('warning', 'Debes rellenar todos los campos'); 
        } 
        else  
        {
            // Autenticación fallida
            return redirect()->route('login')->with('error', 'El correo o la contraseña son incorrectos');
        }
    }
    

    public function logout()
    {
        Auth::logout(); // Cierra la sesión

        return redirect()->route('login')->with('success', 'Has cerrado sesión exitosamente.');
    }

    public function recover(Request $request)
    {
        $user = Users::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'No pudimos encontrar un usuario con ese correo.');
        }

        // Genera una nueva contraseña
        $newPassword = Str::random(10); // Usa Str::random()

        $user->password = bcrypt($newPassword); 
        $user->save();

        mail ($to = $user->email, $subject = 'Tu nueva contraseña', $message = 'Tu nueva contraseña es: ' . $newPassword);

        //Mail::send('emails.password_reset', ['password' => $newPassword], function ($message) use ($user) {
            //$message->to($user->email)
                    //->subject('Tu nueva contraseña');
        //});

        return redirect()->back()->with('success', 'Te hemos enviado una nueva contraseña a tu correo');
    }

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
