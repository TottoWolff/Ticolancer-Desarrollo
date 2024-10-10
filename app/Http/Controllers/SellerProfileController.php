<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\CitiesTicolancer as Cities;
use App\Models\BuyersLangTicolancer as BuyersLanguages;
use App\Models\LanguagesTicolancer as Languages;
use App\Models\LanguageLevelsTicolancer as LanguageLevels;
use App\Models\BuyersUsersTicolancer as BuyersUsers;
use App\Models\SellersUsersTicolancer as SellersUsers;
use Carbon\Carbon;
use App\Models\ProvincesTicolancer as Provinces;
use Illuminate\Support\Facades\Hash;
use App\Models\GigsTicolancer;

use function Laravel\Prompts\select;

class SellerProfileController extends Controller
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

            $buyer = Auth::guard('buyers')->user();
            $city = $buyer->city;
            $province = $city->province;
            $joinDate =  $city->created_at = Carbon::parse($city->created_at)->format('j M, Y');
            $buyerId = $buyer->id;
            $username = $buyer->username;
            $languages = \DB::table('buyers_lang_ticolancers')
                ->where('buyers_users_ticolancers_id', $buyerId)
                ->join('languages_ticolancers', 'buyers_lang_ticolancers.languages_ticolancers_id', '=', 'languages_ticolancers.id')
                ->join('language_levels_ticolancers', 'buyers_lang_ticolancers.language_levels_ticolancers_id', '=', 'language_levels_ticolancers.id')
                ->select('languages_ticolancers.language as language_name', 'language_levels_ticolancers.level as level_name')
                ->get();

            $sellerInfo = \App\Models\SellersUsersTicolancer::where('buyers_users_ticolancers_id', $buyerId)->first();

            $sellerDescription = $sellerInfo ? $sellerInfo->description : 'Agrega una descripción';
            $sellerBirthdate = $sellerInfo ? $sellerInfo->birthdate : 'Agrega tu fecha de nacimiento';
            $sellerAddress = $sellerInfo ? $sellerInfo->residence_address : 'Agrega tu dirección de residencia';
            $sellerFacebook = $sellerInfo ? $sellerInfo->facebook : 'https://es-la.facebook.com/#:~:text=Inicia%20sesi%C3%B3n%20en%20Facebook%20para%20empezar%20a%20compartir%20y';
            $sellerInstagram = $sellerInfo ? $sellerInfo->instagram : 'https://www.instagram.com/';
            $sellerTwitter = $sellerInfo ? $sellerInfo->twitter : 'https://x.com/';
            $sellerLinkedin = $sellerInfo ? $sellerInfo->linkedin : 'https://es.linkedin.com/#:~:text=1%20mil%20millones%20de%20miembros%20|%20Gestiona%20tu%20identidad';
            $sellerWebsite = $sellerInfo ? $sellerInfo->website : '#';

            $profile = $buyer->picture;

            $gigs = GigsTicolancer::all();


            return 
            view('sellers.sellerProfile', [
                'name' => $buyer->name,
                'lastname' => $buyer->lastname,
                'username' => $buyer->username,
                'email' => $buyer->email,
                'phone' => $buyer->phone,
                'joinDate' => $joinDate,
                'picture' => $profile,
                'cityName' => $city ? $city->city : null,
                'provinceName' => $province ? $province->province : null,
                'languages' => $languages,
                'sellerDescription' => $sellerDescription,
                'sellerBirthdate' => $sellerBirthdate,
                'sellerAddress' => $sellerAddress,
                'sellerFacebook' => $sellerFacebook,
                'sellerInstagram' => $sellerInstagram,
                'sellerTwitter' => $sellerTwitter,
                'sellerLinkedin' => $sellerLinkedin,
                'sellerWebsite' => $sellerWebsite,
                'gigs' => $gigs,
            ]);
        }
    }


    public function settingsAccount()
    {
        $sessionActive = Auth::guard('buyers')->check();
        if (!$sessionActive) {
            return redirect()->route('login');
        } else {
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
            $userProvince = $user->city->province->province;
            $userCity = $user->city->city;

            $sellerInfo = \App\Models\SellersUsersTicolancer::where('buyers_users_ticolancers_id', $buyerId)->first();

            $sellerDescription = $sellerInfo ? $sellerInfo->description : 'No Description';
            $sellerBirthdate = $sellerInfo ? $sellerInfo->birthdate : 'N/A';
            $sellerAddress = $sellerInfo ? $sellerInfo->residence_address : 'N/A';
            $sellerFacebook = $sellerInfo ? $sellerInfo->facebook : null;
            $sellerInstagram = $sellerInfo ? $sellerInfo->instagram : null;
            $sellerTwitter = $sellerInfo ? $sellerInfo->twitter : null;
            $sellerLinkedin = $sellerInfo ? $sellerInfo->linkedin : null;
            $sellerWebsite = $sellerInfo ? $sellerInfo->website : null;



            $languages = Languages::all();
            $levels = LanguageLevels::all();
            $provinces = Provinces::all();
            $cities = Cities::all();

            return view('sellers.sellerProfileSettingsAccount', ['username' => $user->username], compact('username', 'name', 'lastname', 'email', 'phone', 'userLanguages', 'languages', 'levels', 'provinces', 'cities', 'userCity', 'userProvince', 'sellerDescription', 'sellerBirthdate', 'sellerAddress', 'sellerFacebook', 'sellerInstagram', 'sellerTwitter', 'sellerLinkedin', 'sellerWebsite'));
        }
    }

    public function settingsSecurity()
    {
        $sessionActive = Auth::guard('buyers')->check();
        if (!$sessionActive) {
            return redirect()->route('login');
        } else {
            $user = Auth::guard('buyers')->user();
            $username = $user->username;
            return view('sellers.sellerProfileSettingsSecurity', ['username' => $user->username], compact('username'));
        }
    }

    public function updatePersonalInfo(Request $request)
    {
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
        $userBirthdate = $request->userBirthdate;


        $user->update([
            'name' => $name,
            'lastname' => $lastname,
            'username' => $username,
            'email' => $email
        ]);

        $seller = \App\Models\SellersUsersTicolancer::where('buyers_users_ticolancers_id', $user->id)->first();

        $seller->update([
            'birthdate' => $request->userBirthdate,
        ]);

        return redirect()->back()->with('success', 'Información actualizada exitosamente');
    }

    public function updateContactInfo(Request $request)
    {
        $user = Auth::guard('buyers')->user();
        $phone = $request->phone;
        $user->update([
            'phone' => $phone
        ]);
        return redirect()->back()->with('success', 'Información actualizada exitosamente');
    }

    public function updateLOcation(Request $request)
    {
        $user = Auth::guard('buyers')->user();
        $user->update([
            'provinces_ticolancers_id' => $request->province,
            'cities_ticolancers_id' => $request->city
        ]);
        return redirect()->back()->with('success', 'Información actualizada exitosamente');
    }

    public function desactivateAccount()
    {
        $user = Auth::guard('buyers')->user();
        $user->languages()->delete();
        $user->delete();
        Auth::guard('buyers')->logout();

        return redirect()->route('login')->with('success', 'Cuenta desactivada exitosamente');
    }


    public function updateLanguages(Request $request)
    {
        $user = Auth::guard('buyers')->user();

        $languageIds = $request->input('language_ids');
        $levelIds = $request->input('level');


        $user->languages()->delete();


        if (is_array($languageIds) && is_array($levelIds) && count($languageIds) === count($levelIds)) {
            foreach ($languageIds as $index => $languageId) {
                $levelId = $levelIds[$index];

                // Crear la nueva relación de lenguaje y nivel
                $user->languages()->create([
                    'languages_ticolancers_id' => $languageId,
                    'language_levels_ticolancers_id' => $levelId,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Idiomas actualizados exitosamente');
    }

    public function updatePassword(Request $request)
    {

        $user = Auth::guard('buyers')->user();

        $password = $user->password;
        $currentPassword = $request->currentPassword;
        $newPassword = $request->newPassword;

        if (Hash::check($currentPassword, $password)) {
            $newPasswordHash = Hash::make($newPassword);
            $user->update([
                'password' => $newPasswordHash
            ]);
            return redirect()->back()->with('success', 'Contraseña actualizada exitosamente');
        } else {
            return redirect()->back()->with('error', 'La contraseña actual es incorrecta');
        }
    }


    public function updatePicture(Request $request)
    {

        $request->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $buyer = Auth::guard('buyers')->user();

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $fileType = $file->getClientOriginalExtension();
            $filename = $buyer->username . '.' . $fileType;
            $file->move(public_path('images/buyers_profiles'), $filename);
            $buyer = Auth::guard('buyers')->user();
            $buyer->picture = $filename;
            $buyer->save();

            return redirect()->back();
        }
    }

    public function deletePicture()
    {

        $buyer = Auth::guard('buyers')->user();
        $currentPicturePath = public_path('images/buyers_profiles/' . $buyer->picture);

        if ($buyer->picture !== 'profile_placeholder.png' && file_exists($currentPicturePath)) {
            unlink($currentPicturePath);
        }

        $buyer->picture = "profile_placeholder.png";
        $buyer->save();
        return redirect()->back();
    }

    public function updateAddress(Request $request)
    {
        $user = Auth::guard('buyers')->user();
        
        $seller = \App\Models\SellersUsersTicolancer::where('buyers_users_ticolancers_id', $user->id)->first();

        $seller->update([
            'residence_address' => $request->sellerAddress,
        ]);

        return redirect()->back()->with('success', 'Información actualizada exitosamente');
    }

    public function updateSocialMedia(Request $request)
    {
        $user = Auth::guard('buyers')->user();
        $facebook = $request->facebook;
        $twitter = $request->twitter;
        $instagram = $request->instagram;
        $linkedin = $request->linkedin;
        $website = $request->website;

        $seller = \App\Models\SellersUsersTicolancer::where('buyers_users_ticolancers_id', $user->id)->first();

        $seller->update([
            'facebook' => $facebook,
            'twitter' => $twitter,
            'instagram' => $instagram,
            'linkedin' => $linkedin,
            'website' => $website
        ]);
        return redirect()->back()->with('success', 'Información actualizada exitosamente');
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
