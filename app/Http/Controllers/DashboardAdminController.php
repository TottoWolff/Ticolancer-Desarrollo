<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuyersUsersTicolancer as Buyers;
use App\Models\ContactFormsTicolancer as ContactForms;
use App\Models\SubscriptionsTicolancer as Subscriptions;
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
        $contactForms = ContactForms::all();
        $subscriptions = Subscriptions::all();
        return view('admin.dashboard', compact('buyers', 'contactForms', 'user', 'subscriptions'));
    }
    

    public function buyers()
    {
        $buyers = Buyers::all();
        return view('admin.buyers', compact('buyers'));
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
