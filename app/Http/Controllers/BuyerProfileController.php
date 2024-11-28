<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CitiesTicolancer as Cities;
use App\Models\BuyersLangTicolancer as BuyersLanguages;
use App\Models\LanguagesTicolancer as Languages;
use App\Models\LanguageLevelsTicolancer as LanguageLevels;
use App\Models\BuyersUsersTicolancer as BuyersUsers;
use App\Models\FavoritesGigsTicolancer as FavoritesGigs;
use App\Models\GigsTicolancer;
use Carbon\Carbon;
use App\Models\ProvincesTicolancer as Provinces;
use Illuminate\Support\Facades\Hash;

class BuyerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessionActive = Auth::guard('buyers')->check();

        if (!$sessionActive) {
            return redirect()->route('login');
        } else {

            // Obtenemos los IDs de los gigs favoritos del buyer autenticado
            $favoritesGigsIds = FavoritesGigs::where('buyers_users_ticolancers_id', Auth::guard('buyers')->user()->id)
                ->pluck('gigs_ticolancers_id');

            // Consultamos los gigs favoritos, obteniendo la relación con el seller (pero no el buyer aún)
            $favoritesGigs = GigsTicolancer::whereIn('id', $favoritesGigsIds)->get();

            $favoritesData = $favoritesGigs->map(function ($gig) {
                // Hacemos una consulta adicional para obtener al buyer relacionado con el seller
                $seller = $gig->seller;

                // Verificamos si el seller tiene un buyer asociado
                $buyer = $seller ? $seller->buyers : null;

                return [
                    'gig' => [
                        'id' => $gig->id,
                        'gigs_categories_ticolancers_id' => $gig->gigs_categories_ticolancers_id,
                        'sellers_users_ticolancers_id' => $gig->sellers_users_ticolancers_id,
                        'gig_name' => $gig->gig_name,
                        'gig_image' => $gig->gig_image,
                        'gig_description' => $gig->gig_description,
                        'gig_price' => $gig->gig_price,
                        'published_at' => $gig->published_at,
                        'created_at' => $gig->created_at,
                        'updated_at' => $gig->updated_at,
                        'buyer' => $buyer ? $buyer->toArray() : null,  // Aquí incluimos la información del buyer, si existe
                    ]
                ];
            });


            // Obtenemos los IDs de los vendedores favoritos del buyer autenticado
            $favoritesBuyers = BuyersUsers::whereIn(
                'id', 
                function($query) {
                    $query->select('buyers_users_ticolancers_id')
                          ->from('sellers_users_ticolancers')
                          ->whereIn('id', function($subQuery) {
                              $subQuery->select('sellers_users_ticolancers_id')
                                       ->from('fav_sellers_ticolancers')
                                       ->where('buyers_users_ticolancers_id', Auth::guard('buyers')->user()->id);
                          });
                }
            )->get();




            $buyer = Auth::guard('buyers')->user();
            $buyerId = $buyer->id;
    
            // Verificar si el usuario es también un vendedor
            $sellerInfo = \App\Models\SellersUsersTicolancer::where('buyers_users_ticolancers_id', $buyerId)->first();
    
            // Redirigir al perfil de vendedor si ya es un vendedor
            if ($sellerInfo) {
                return redirect()->route('sellerProfile', ['username' => $buyer->username]);
            }
    
            // Obtener la ciudad, provincia, y fecha de ingreso del comprador
            $city = $buyer->city;
            $province = $city ? $city->province : null;
            $joinDate = $city ? Carbon::parse($city->created_at)->format('j M, Y') : null;
    
            // Obtener los idiomas del comprador
            $languages = \DB::table('buyers_lang_ticolancers')
                ->where('buyers_users_ticolancers_id', $buyerId)
                ->join('languages_ticolancers', 'buyers_lang_ticolancers.languages_ticolancers_id', '=', 'languages_ticolancers.id')
                ->join('language_levels_ticolancers', 'buyers_lang_ticolancers.language_levels_ticolancers_id', '=', 'language_levels_ticolancers.id')
                ->select('languages_ticolancers.language as language_name', 'language_levels_ticolancers.level as level_name')
                ->get();
    
            // Devolver la vista de perfil del comprador si no es vendedor
            return view('buyers.profile', [
                'id' => $buyer->id,
                'name' => $buyer->name,
                'lastname' => $buyer->lastname,
                'username' => $buyer->username,
                'email' => $buyer->email,
                'phone' => $buyer->phone,
                'joinDate' => $joinDate,
                'picture' => $buyer->picture,
                'cityName' => $city ? $city->city : null,
                'provinceName' => $province ? $province->province : null,
                'languages' => $languages,
                'favoritesData' => $favoritesData,
                'favoritesBuyers' => $favoritesBuyers
            ]);
        }

    }


    public function settingsAccount()
    {
        $sessionActive = Auth::guard('buyers')->check();
        if (!$sessionActive) {
            return redirect()->route('login');
        }
        else{
            $user = Auth::guard('buyers')->user();
            $name = $user->name;
            $lastname = $user->lastname;
            $email = $user->email;
            $phone = $user->phone;
            $username = $user->username;
            $buyerId = $user->id;
            $userLanguages = \DB::table('buyers_lang_ticolancers')
            ->where('buyers_users_ticolancers_id', $buyerId)
            ->join('languages_ticolancers', 'buyers_lang_ticolancers.languages_ticolancers_id', '=', 'languages_ticolancers.id')
            ->join('language_levels_ticolancers', 'buyers_lang_ticolancers.language_levels_ticolancers_id', '=', 'language_levels_ticolancers.id')
            ->select('languages_ticolancers.language as language_name', 'language_levels_ticolancers.level as level_name', 'languages_ticolancers.id as language_id', 'language_levels_ticolancers.id as level_id')
            ->get();
            $userProvince=$user->city->province->province;
            $userCity=$user->city->city;
            


            $languages = Languages::all();
            $levels = LanguageLevels::all();
            $provinces = Provinces::all();
            $cities = Cities::all();

            return view('buyers.settingsAccount', ['username' => $user->username], compact('username', 'name', 'lastname', 'email', 'phone', 'userLanguages', 'languages', 'levels', 'provinces', 'cities',	 'userCity', 'userProvince'));
        }
    }

    public function settingsSecurity()
    {
        $sessionActive = Auth::guard('buyers')->check();
        if (!$sessionActive) {
            return redirect()->route('login');
        }
        else{
            $user = Auth::guard('buyers')->user();
            $username = $user->username;
            return view('buyers.settingsSecurity', ['username' => $user->username], compact('username'));
        }
    }

    public function updatePersonalInfo(Request $request){
        $user = Auth::guard('buyers')->user();
        
        $existingUser = BuyersUsers::where('email', $request->email)->first();
        $existingUsername = BuyersUsers::where('username', $request->username)->first();
        
        if ($existingUser && $user->email != $request->email || $existingUsername && $user->username != $request->username) {
            return redirect()->back()->with('error', 'Ya existe un usuario con este correo o nombre de usuario');
        }

        $name = $request->name;
        $lastname = $request->lastname;
        $username = $request->username;
        $email = $request->email;


        $user ->update([
            'name' => $name,
            'lastname' => $lastname,
            'username' => $username,
            'email' => $email
        ]);

        return redirect()->back()->with('success', 'Información actualizada exitosamente');
        
    }

    public function updateContactInfo(Request $request){
        $user = Auth::guard('buyers')->user();
        $phone = $request->phone;
        $user ->update([
            'phone' => $phone
        ]);
        return redirect()->back()->with('success', 'Información actualizada exitosamente');
    }

    public function updateLOcation(Request $request){
        $user = Auth::guard('buyers')->user();
        $user ->update([
            'provinces_ticolancers_id' => $request->province,
            'cities_ticolancers_id' => $request->city
        ]);
        return redirect()->back()->with('success', 'Información actualizada exitosamente');
    }

    public function desactivateAccount(){
        $user = Auth::guard('buyers')->user();
        $userFavoritesGigs = \App\Models\FavoritesGigsTicolancer::where('buyers_users_ticolancers_id', $user->id)->delete();
        $user->languages()->delete();
        $user ->delete();
        Auth::guard('buyers')->logout();
        
        return redirect()->route('login')->with('success', 'Cuenta desactivada exitosamente');
    }


    public function updateLanguages(Request $request)
    {
        $user = Auth::guard('buyers')->user();

        $languageIds = $request->input('language_ids');
        $levelIds = $request->input('level');

        // Verifica que el mismo idioma no se agregue dos veces
        if (count($languageIds) !== count(array_unique($languageIds))) {
            return redirect()->back()->withErrors(['message' => 'No puedes agregar el mismo idioma más de una vez.']);
        }

        // Verifies que solo haya un idioma nativo
        $nativeLanguages = array_filter($levelIds, function ($levelId) {
            return $levelId == 1;
        });
        if (count($nativeLanguages) > 1) {
            return redirect()->back()->withErrors(['message' => 'Solo puedes tener un idioma nativo.']);
        }

        // Borra idiomas existentes
        $user->languages()->delete();

        // Crea nuevos idiomas
        if (is_array($languageIds) && is_array($levelIds) && count($languageIds) === count($levelIds)) {
            foreach ($languageIds as $index => $languageId) {
                $levelId = $levelIds[$index];

                $user->languages()->create([
                    'languages_ticolancers_id' => $languageId,
                    'language_levels_ticolancers_id' => $levelId,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Idiomas actualizados exitosamente');
    }

    public function updatePassword(Request $request){

        $user = Auth::guard('buyers')->user();

        $password = $user->password;
        $currentPassword = $request->currentPassword;
        $newPassword = $request->newPassword;

        if (Hash::check($currentPassword, $password)) {
            $newPasswordHash = Hash::make($newPassword);
            $user ->update([
                'password' => $newPasswordHash
            ]);
            return redirect()->back()->with('success', 'Contraseña actualizada exitosamente');
        } else {
            return redirect()->back()->with('error', 'La contraseña actual es incorrecta');
        }
    }
        
    
    

        
        
    

    public function updatePicture(Request $request){
        
        $request->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $buyer = Auth::guard('buyers')->user(); 

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $fileType = $file->getClientOriginalExtension();
            $filename = $buyer->username. '.' .$fileType;
            $file->move(public_path('images/buyers_profiles'), $filename);
            $buyer = Auth::guard('buyers')->user();
            $buyer->picture = $filename;
            $buyer->save();

            return redirect()->back();  
        }

    }

    public function deletePicture(){
        
        $buyer = Auth::guard('buyers')->user(); 
        $currentPicturePath = public_path('images/buyers_profiles/'.$buyer->picture);

        if ($buyer->picture !== 'profile_placeholder.png' && file_exists($currentPicturePath)) {
            unlink($currentPicturePath);
        }

        $buyer->picture = "profile_placeholder.png";
        $buyer->save();
        return redirect()->back();
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
