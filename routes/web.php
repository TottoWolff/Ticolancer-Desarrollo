<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController as Homepage;
use App\Http\Controllers\SignupController as Signup;
use App\Http\Controllers\LoginController as Login;
use App\Http\Controllers\BuyerDashboardController as BuyerDashboard;
use App\Http\Controllers\SignUpAdminController as SignUpAdmin;
use App\Http\Controllers\LoginAdminController as LoginAdmin;
use App\Http\Controllers\DashboardAdminController as DashboardAdmin;
use App\Http\Controllers\BuyerProfileController as BuyerProfile;
use App\Http\Controllers\SellerProfileController as SellerProfile;
use App\Http\Controllers\GigsController as Gigs;
use App\Http\Controllers\SellerGigController as SellerGig;
use App\Http\Controllers\SellerGigsProfileController as SellerGigsProfile;
use App\Http\Controllers\SellerGigsProfileAdminController as SellerGigsProfileAdmin;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//ROUTES FOR VISITORS
Route::get('/', [Homepage::class, 'index'])->name('inicio');
Route::get('/nosotros', [Homepage::class, 'nosotros'])->name('nosotros');
Route::get('/contacto', [Homepage::class, 'contacto'])->name('contacto');
Route::post('/contacto', [Homepage::class, 'store_contact_form'])->name('contacto.store');

//ROUTES TO SIGN UP, LOG IN AND LOG OUT
Route::get('/signup', [Signup::class, 'index'])->name('signup');
Route::post('/signup', [Signup::class, 'store'])->name('signup.store');
Route::get('/signup/get-cities/{provinceId}', [Signup::class, 'signup.getCities']);
Route::get('/login', [Login::class, 'index'])->name('login');
Route::post('/login', [Login::class, 'login'])->name('login.login');
Route::post('/logout', [Login::class, 'logout'])->name('login.logout');
Route::post('/recover', [Login::class, 'recover'])->name('login.recover');

//ROUTES FOR BUYERS
Route::get('buyers/{username}', [BuyerProfile::class, 'index'])->name('buyerProfile');
Route::get('buyers/{username}/settings/account', [BuyerProfile::class, 'settingsAccount'])->name('buyerProfileSettingsAccount');
Route::get('buyers/{username}/settings/security', [BuyerProfile::class, 'settingsSecurity'])->name('buyerProfileSettingsSecurity');
Route::post('/buyers/update-picture', [BuyerProfile::class, 'updatePicture'])->name('buyers.updatePicture');
Route::post('/buyers/delete-picture', [BuyerProfile::class, 'deletePicture'])->name('buyers.deletePicture');
Route::post('/{username}/update/personal-info', [BuyerProfile::class, 'updatePersonalInfo'])->name('buyers.updatePersonalInfo');
Route::post('/{username}/update/contact-info', [BuyerProfile::class, 'updateContactInfo'])->name('buyers.updateContactInfo');
Route::post('/{username}/desactivate-account', [BuyerProfile::class, 'desactivateAccount'])->name('buyers.desactivateAccount');
Route::post('/{username}/update/location', [BuyerProfile::class, 'updateLocation'])->name('buyers.updateLocation');
Route::post('/{username}/update/languages', [BuyerProfile::class, 'updateLanguages'])->name('buyers.updateLanguages');
Route::post('/{username}/update/password', [BuyerProfile::class, 'updatePassword'])->name('buyers.updatePassword');


//ROUTES FOR SELLERS
Route::get('sellers/{username}', [SellerProfile::class, 'index'])->name('sellerProfile');
Route::get('sellers/{username}/settings/account', [SellerProfile::class, 'settingsAccount'])->name('sellerProfileSettingsAccount');
Route::get('sellers/{username}/settings/security', [SellerProfile::class, 'settingsSecurity'])->name('sellerProfileSettingsSecurity');
Route::post('/sellers/update-picture', [SellerProfile::class, 'updatePicture'])->name('sellers.updatePicture');
Route::post('/sellers/delete-picture', [SellerProfile::class, 'deletePicture'])->name('sellers.deletePicture');
Route::post('/{username}/update/personal-info', [SellerProfile::class, 'updatePersonalInfo'])->name('sellers.updatePersonalInfo');
Route::post('/{username}/update/contact-info', [SellerProfile::class, 'updateContactInfo'])->name('sellers.updateContactInfo');
Route::post('/{username}/desactivate-account', [SellerProfile::class, 'desactivateAccount'])->name('sellers.desactivateAccount');
Route::post('/{username}/update/location', [SellerProfile::class, 'updateLocation'])->name('sellers.updateLocation');
Route::post('/{username}/update/languages', [SellerProfile::class, 'updateLanguages'])->name('sellers.updateLanguages');
Route::post('/{username}/update/password', [SellerProfile::class, 'updatePassword'])->name('sellers.updatePassword');
Route::post('/{username}/update/address', [SellerProfile::class, 'updateAddress'])->name('sellers.updateAddress');
Route::post('/{username}/update/socialMedia', [SellerProfile::class, 'updateSocialMedia'])->name('sellers.updateSocialMedia');



//Route::get('/gigs', Gigs::class, 'index')->name('gigs');
Route::get('/sellers/{username}/gigCreation', [Gigs::class, 'index'])->name('gigCreation');
Route::post('/sellers/gigstore', [Gigs::class, 'store'])->name('gigStore');

Route::get('/sellers/{username}/gigs', [SellerGigsProfile::class, 'index'])->name('sellerGigsProfile');
Route::get('/sellers/{username}/gig', [SellerGig::class, 'index'])->name('sellerGig');

Route::get('/sellers/{username}/gigsAdmin', [SellerGigsProfileAdmin::class, 'index'])->name('sellerGigsProfileAdmin');




//ROUTES FOR ADMIN
Route::get('/admin/signup', [SignUpAdmin::class, 'index'])->name('admin.signup');
Route::post('/admin/signup', [SignUpAdmin::class, 'store'])->name('admin.signup.store');
Route::get('/admin', [LoginAdmin::class, 'index'])->name('admin.login');
Route::post('/admin', [LoginAdmin::class, 'login'])->name('admin.login.login');
Route::post('/admin/logout', [LoginAdmin::class, 'logout'])->name('admin.login.logout');
Route::get('/admin/{username}/dashboard', [DashboardAdmin::class, 'index'])->name('admin.dashboard');








