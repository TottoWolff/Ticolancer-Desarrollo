<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactFormsTicolancer as ContactForms;
use App\Models\SubscriptionsTicolancer as Subscriptions;
use App\Models\GigsTicolancer; 
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Si el usuario está autenticado, obtener su username, si no, dejarlo en null
        $user = Auth::guard('buyers')->user();
        $username = $user ? $user->username : null;
    
        // Obtener todos los gigs
        $gigs = GigsTicolancer::all();
    
        // Retornar la vista con los gigs y el nombre de usuario
        return view('ticolancer.index', compact('gigs', 'username'));
    }

    public function nosotros()
    {
        //
        return view('ticolancer.nosotros');
    }

    public function contacto()
    {
        //
        return view('ticolancer.contacto');
    }

    public function store_contact_form (Request $request) {
        
        //Validar formato de correo
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->route('signup')->with('warning', 'Formato de correo incorrecto');
        }

        try {
            ContactForms::create([
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message
            ]);

            $to = $request->email;
            $subject = 'Gracias por contactarnos';
            $message = 'Gracias por contactarnos, nos pondremos en contacto contigo';
            $headers = 'From: Ticolancer' . "\r\n";

            mail ($to, $subject, $message, $headers);

            return redirect()->route('contacto')->with('success', 'Gracias por contactarnos, nos pondremos en contacto contigo');

        } catch (\Throwable $th) {
            return redirect()->route('contacto')->with('warning', 'Error al enviar el formulario');
        }

       
    }

    public function store_subscription(Request $request) 
    {
        try {
            Subscriptions::create([
                'email' => $request->email
            ]);

            $to = $request->email;
            $subject = 'Gracias por suscribirte';
            $message = 'Gracias por suscribirte, es un gusto que seas parte de nuestra comunidad';
            $headers = 'From: Ticolancer' . "\r\n";

            mail ($to, $subject, $message, $headers);

            return redirect()->back()->with('success', 'Gracias por suscribirte, es un gusto que seas parte de nuestra comunidad');
        } catch (\Throwable $th) {
            return redirect()->back()->with('warning', 'Error al enviar el formulario');
        }

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
