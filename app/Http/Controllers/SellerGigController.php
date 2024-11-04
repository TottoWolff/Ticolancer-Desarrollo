<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\GigsTicolancer;
use App\Models\SellersUsersTicolancer;
use App\Models\GigsReviewsTicolancer;
use App\Models\GigsImagesTicolancer;
use Carbon\Carbon;


use Illuminate\Support\Facades\Auth;

class SellerGigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        // Buscar el gig con el id dado
        $gig = GigsTicolancer::findOrFail($id);


        // Obtener el idSeller (FK de la tabla sellers_users_ticolancers)
        $idSeller = $gig->sellers_users_ticolancers_id;

        // Buscar el registro en la tabla sellers_users_ticolancers usando el idSeller
        $seller = DB::table('sellers_users_ticolancers')->where('id', $idSeller)->first();

        if ($seller) {

            // Obtener el idBuyer (FK de la tabla buyers_users_ticolancer)
            $buyerId = $seller->buyers_users_ticolancers_id;

            // Buscar el registro en la tabla buyers_users_ticolancer usando el FK buyer_id
            $buyer = DB::table('buyers_users_ticolancers')->where('id', $buyerId)->first();
            //return response()->json($buyer);



            $published_at = Carbon::parse($gig->published_at)->translatedFormat('F Y');



            $reviews = GigsReviewsTicolancer::where('gigs_ticolancers_id', $id)
                ->join('gigs_ticolancers', 'gigs_reviews_ticolancers.gigs_ticolancers_id', '=', 'gigs_ticolancers.id')
                ->select('gigs_reviews_ticolancers.*')
                ->get();

            $ratings = $reviews->pluck('rating');
            $averageRating = $ratings->avg();




            $images = GigsImagesTicolancer::where('gigs_ticolancers_id', $id)->get();
            $imagesNames = $images->pluck('image');

            $gigId = $id;
            $username = $buyer->username;
            $name = $buyer->name;
            $lastname = $buyer->lastname;
            $email = $buyer->email;
            $phone = $buyer->phone;
            $profile = $buyer->picture;
            $buyerId = $buyer->id;

            $whatsappMessage = "Hola, me gustaría obtener más información sobre el servicio de";
            $emailSubject = "Consulta sobre servicio";
            $emailBody = "Hola,\n\nMe gustaría obtener más información sobre el servicio de";

            

            $userLanguages = \DB::table('buyers_lang_ticolancers')
                ->where('buyers_users_ticolancers_id', $buyerId)
                ->join('languages_ticolancers', 'buyers_lang_ticolancers.languages_ticolancers_id', '=', 'languages_ticolancers.id')
                ->join('language_levels_ticolancers', 'buyers_lang_ticolancers.language_levels_ticolancers_id', '=', 'language_levels_ticolancers.id')
                ->select('languages_ticolancers.language as language_name', 'language_levels_ticolancers.level as level_name', 'languages_ticolancers.id as language_id', 'language_levels_ticolancers.id as level_id')
                ->get();


            $userProvince = $buyer->provinces_ticolancers_id;
            $userCity = $buyer->cities_ticolancers_id;

            // Obtener la provincia
            $sellerProvince = \DB::table('provinces_ticolancers')
                ->where('id', $userProvince)
                ->pluck('province')->first(); // Esto obtendrá directamente el nombre de la provincia

            // Obtener la ciudad
            $sellerCity = \DB::table('cities_ticolancers')
                ->where('id', $userCity)
                ->pluck('city')->first(); // Esto obtendrá directamente el nombre de la ciudad

            // Verificar si los resultados no son null
            if ($sellerProvince && $sellerCity) {
                // Pasar los valores a htmlspecialchars
                echo htmlspecialchars($sellerProvince); // Ahora es un string
                echo htmlspecialchars($sellerCity);     // Ahora es un string
            } else {
                echo "Datos no encontrados.";
            }



            return view('sellers.sellerGig', compact(
                'gig',
                'username',
                'name',
                'lastname',
                'email',
                'phone',
                'buyerId',
                'userLanguages',
                'sellerProvince',
                'sellerCity',
                'profile',
                'reviews',
                'ratings',
                'averageRating',
                'imagesNames',
                'gigId',
                'published_at',
                'whatsappMessage',
                'emailSubject',
                'emailBody'  
            ));
        } else {
            // Manejar el caso en que no se encuentre el seller
            return redirect()->back()->withErrors('Seller no encontrado.');
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
