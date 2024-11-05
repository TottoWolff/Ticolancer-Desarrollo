<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuyersUsersTicolancer as Buyers;
use App\Models\ContactFormsTicolancer as ContactForms;
use App\Models\SubscriptionsTicolancer as Subscriptions;
use App\Models\SellersUsersTicolancer as Sellers;
use App\Models\SellerApplication as Applications;
use App\Models\MembershipsTicolancer as Memberships;
use Illuminate\Support\Facades\Auth;

class DashboardAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::guard('admin')->user();
        $buyers = Buyers::all();
        $sellers = Sellers::all();
        $contactForms = ContactForms::all();
        $subscriptions = Subscriptions::all();
        return view('admin.dashboard', compact('buyers', 'contactForms', 'user', 'subscriptions', 'sellers'));
    }
    

    public function buyers()
    {
        $buyers = Buyers::all();
        return view('admin.buyers', compact('buyers'));
    }

    public function sellers()
    {
        // Obtener todos los sellers junto con su información del buyer
        $sellers = Sellers::with('buyers')->get();
        
        
        // Pasar los datos a la vista
        return view('admin.sellers', compact('sellers'));
    }
    public function forms()
    {
        $contactForms = ContactForms::all();
        return view('admin.forms', compact('contactForms'));
    }

    public function subscriptions()
    {
        $subscriptions = Subscriptions::all();
        return view('admin.subscriptions', compact('subscriptions'));

    }


    public function applications()
    {
        // Traemos todas las aplicaciones con la información del buyer asociada
        $applications = Applications::with('buyer')->get();
        // Pasamos las aplicaciones con los buyers a la vista
        return view('admin.application', compact('applications'));
    }

    public function applicationDetails($id)
    {
        // Traemos el buyer por su ID junto con su solicitud como seller
        $buyer = Buyers::with('sellerApplication')->findOrFail($id);
       
        $application = Applications::where('buyers_users_ticolancers_id', $id)->first();
        
    
        // Pasamos la información del buyer y la solicitud a la vista
        return view('admin.applicationDetails', compact('buyer', 'application'));
    }

    public function applicationAccept($id)
    {
        $buyer = Buyers::with('sellerApplication')->findOrFail($id);
       
        $application = Applications::where('buyers_users_ticolancers_id', $id)->first();

        $newSeller= new Sellers;
        $newSeller->birthdate = $application->birthdate;
        $newSeller->description = $application->description;
        $newSeller->residence_address = $application->residence_address;
        $newSeller->buyers_users_ticolancers_id = $buyer->id;
        $newSeller->facebook = $application->facebook;
        $newSeller->twitter = $application->twitter;
        $newSeller->instagram = $application->instagram;
        $newSeller->linkedin = $application->linkedin;
        $newSeller->website = $application->website;
        $newSeller->save();
 
        $seller = Sellers::where('buyers_users_ticolancers_id', $id)->first();
        $idSeller = $seller->id;
        $membership = new Memberships;
        $membership->sellers_users_ticolancers_id = $idSeller;
        $membership->membership_categories_ticolancers_id = 1;
        $membership->status = 1;
        $membership->paymentDate = now();
        $membership->trialExpirationDate = now()->addDays(30); 
        $membership->save();
        
        $to = $buyer->email;
        $subject = 'Tu solicitud ha sido aceptado';
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
                 <h2> Hola ' . $buyer->name . ', tu solicitud ha sido aceptada!</h2>
                 <div class="container">
                     <p>Ahora podrás publicar tus servicios.</p>
                 </div>
             </body>
         </html> 
     ';

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        mail ($to, $subject, $message, $headers);

        $application->delete();

        return redirect()->route('admin.dashboard')->with('success', 'formulario aceptado exitosamente.');


        
    }

    public function applicationReject($id)
    {
        $application = Applications::where('buyers_users_ticolancers_id', $id)->first();
        $application->delete();
        return redirect()->back()->with('success', 'Formulario eliminado exitosamente');
        
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
