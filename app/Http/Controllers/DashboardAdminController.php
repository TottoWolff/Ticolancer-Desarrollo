<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuyersUsersTicolancer as Buyers;
use App\Models\ContactFormsTicolancer as ContactForms;
use App\Models\SubscriptionsTicolancer as Subscriptions;
use App\Models\SellersUsersTicolancer as Sellers;
use App\Models\SellerApplication as Applications;
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
       
    
        // Pasamos la información del buyer y la solicitud a la vista
        return view('admin.applicationDetails', compact('buyer'));
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
