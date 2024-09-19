<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BuyersUsersTicolancer as BuyersUsers;
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

        if (Auth::guard('buyers')->attempt($credentials)) {
            // Autenticación exitosa
            return redirect()->route('buyerDashboard'); 
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
        Auth::guard('buyers')->logout(); // Cierra la sesión

        return redirect()->route('login')->with('success', 'Has cerrado sesión exitosamente.');
    }

    public function recover(Request $request)
    {
        $user = BuyersUsers::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'No pudimos encontrar un usuario con ese correo.');
        }

        // Generar una nueva contraseña
        $newPassword = Str::random(10); // Usa Str::random()

        $user->password = bcrypt($newPassword); 
        $user->save();

        $to = $request->email;
        $subject = 'Tu nueva contraseña';
        $message = '
           <html>
                <head>
                    <style>
                        
                        h2 {
                            color: #ffffff;
                            padding: 10px;
                            background-color: #132D46;
                            border-bottom: 4px solid #00C48E;
                        }
                        
                        .container {
                            padding: 10px;
                            background-color: #F5F5F5;
                        }
                        
                    </style>

                </head>
                <body>
                    <h2> Hola ' . $user->name . ', tu nueva contraseña es: <strong>' . $newPassword . '</strong> </h2>
                    <div class="container">
                        <p>Te recomendamos que cambies esta contraseña en tu perfil.</p>
                        <p>Saludos, el equipo de Ticolancer!</p>
                    </div>
                </body>
            </html> 
        ';
        
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
        

        // Envia un correo con la nueva contraseña
        mail ($to, $subject, $message, $headers);

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
