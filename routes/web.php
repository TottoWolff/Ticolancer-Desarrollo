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
use App\Http\Controllers\DashboardGigsController as DashboardGigs;
use App\Http\Controllers\GigReviewController;
use App\Http\Controllers\SellerApplicationController as SellerApplication;
use App\Http\Controllers\CategorieController as Categorie;


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
Route::post('/', [Homepage::class, 'store_subscription'])->name('subscription.store');

//ROUTES TO SIGN UP, LOG IN AND LOG OUT
Route::get('/signup', [Signup::class, 'index'])->name('signup');
Route::post('/signup', [Signup::class, 'store'])->name('signup.store');
Route::get('/signup/get-cities/{provinceId}', [Signup::class, 'getCities']);



Route::get('/login', [Login::class, 'index'])->name('login');
Route::post('/login', [Login::class, 'login'])->name('login.login');
Route::post('/logout', [Login::class, 'logout'])->name('login.logout');
Route::post('/recover', [Login::class, 'recover'])->name('login.recover');

//ROUTES FOR BUYERS
Route::get('/buyers/{username}/dashboard', [DashboardGigs::class, 'index'])->name('buyers.dashboard');

Route::get('buyers/{username}', [BuyerProfile::class, 'index'])->name('buyerProfile');
Route::get('buyers/{username}/settings/account', [BuyerProfile::class, 'settingsAccount'])->name('buyerProfileSettingsAccount');
Route::get('buyers/{username}/settings/security', [BuyerProfile::class, 'settingsSecurity'])->name('buyerProfileSettingsSecurity');
Route::post('/buyers/update-picture', [BuyerProfile::class, 'updatePicture'])->name('buyers.updatePicture');
Route::post('/buyers/delete-picture', [BuyerProfile::class, 'deletePicture'])->name('buyers.deletePicture');
Route::post('/{username}/buyers/update/personal-info', [BuyerProfile::class, 'updatePersonalInfo'])->name('buyers.updatePersonalInfo');
Route::post('/{username}/buyers/update/contact-info', [BuyerProfile::class, 'updateContactInfo'])->name('buyers.updateContactInfo');
Route::post('/{username}/buyers/desactivate-account', [BuyerProfile::class, 'desactivateAccount'])->name('buyers.desactivateAccount');
Route::post('/{username}/buyers/update/location', [BuyerProfile::class, 'updateLocation'])->name('buyers.updateLocation');
Route::post('/{username}/buyers/update/languages', [BuyerProfile::class, 'updateLanguages'])->name('buyers.updateLanguages');
Route::post('/{username}/buyers/update/password', [BuyerProfile::class, 'updatePassword'])->name('buyers.updatePassword');

Route::get('/buyers/{username}/sellerApplication', [SellerApplication::class, 'index'])->name('sellerApplication');
Route::post('/buyers/{username}/sellerApplication', [SellerApplication::class, 'store'])->name('sellerApplication.store');


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


Route::get('/sellers/{username}/gigCreation', [Gigs::class, 'index'])->name('gigCreation');
Route::post('/sellers/{username}/gigstore', [Gigs::class, 'store'])->name('sellers.gigStore');
Route::delete('/gig/delete/{id}', [Gigs::class, 'destroy'])->name('deleteGig');
Route::get('/gig/edit/{id}', [Gigs::class, 'edit'])->name('editGig');
Route::post('/gig/update/{id}', [Gigs::class, 'update'])->name('updateGig');



Route::get('/sellers/{username}/gigs', [SellerGigsProfile::class, 'index'])->name('sellerGigsProfile');
Route::get('/sellers/gig/{id}', [SellerGig::class, 'index'])->name('sellerGig');

Route::get('/sellers/{username}/gigsAdmin', [SellerGigsProfileAdmin::class, 'index'])->name('sellerGigsProfileAdmin');


Route::get('/gigs/{gigId}/reviews', [GigReviewController::class, 'index'])->name('reviews.index');

Route::post('/gigs/{gig}/reviews', [GigReviewController::class, 'store'])->name('reviews.store');

Route::get('/categorie/{id}', [Categorie::class, 'index'])->name('categorie');







//ROUTES FOR ADMIN
Route::get('/admin/signup', [SignUpAdmin::class, 'index'])->name('admin.signup');
Route::post('/admin/signup', [SignUpAdmin::class, 'store'])->name('admin.signup.store');
Route::get('/admin', [LoginAdmin::class, 'index'])->name('admin.login');
Route::post('/admin', [LoginAdmin::class, 'login'])->name('admin.login.login');
Route::get('/admin/logout', [LoginAdmin::class, 'logout'])->name('admin.logout');
Route::get('/admin/dashboard', [DashboardAdmin::class, 'index'])->name('admin.dashboard');
Route::get('/admin/buyers', [DashboardAdmin::class, 'buyers'])->name('admin.buyers');
Route::get('/admin/sellers', [DashboardAdmin::class, 'sellers'])->name('admin.sellers');
Route::get('/admin/forms', [DashboardAdmin::class, 'forms'])->name('admin.forms');
Route::get('/admin/subscriptions', [DashboardAdmin::class, 'subscriptions'])->name('admin.subscriptions');
Route::get('/admin/applications', [DashboardAdmin::class, 'applications'])->name('admin.applications');
Route::get('/admin/applicationDetails/{id}', [DashboardAdmin::class, 'applicationDetails'])->name('admin.aplicationDetails');












