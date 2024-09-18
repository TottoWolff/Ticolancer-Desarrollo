<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController as Homepage;
use App\Http\Controllers\SignupController as Signup;
use App\Http\Controllers\LoginController as Login;
use App\Http\Controllers\BuyerDashboardController as BuyerDashboard;
use App\Http\Controllers\SignUpAdminController as SignUpAdmin;
use App\Http\Controllers\LoginAdminController as LoginAdmin;

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

Route::get('/', [Homepage::class, 'index'])->name('inicio');
Route::get('/nosotros', [Homepage::class, 'nosotros'])->name('nosotros');

Route::get('/contacto', [Homepage::class, 'contacto'])->name('contacto');
Route::post('/contacto', [Homepage::class, 'store_contact_form'])->name('contacto.store');

Route::get('/signup', [Signup::class, 'index'])->name('signup');
Route::post('/signup', [Signup::class, 'store'])->name('signup.store');

Route::get('/login', [Login::class, 'index'])->name('login');
Route::post('/login', [Login::class, 'login'])->name('login.login');

Route::post('/logout', [Login::class, 'logout'])->name('login.logout');

Route::post('/recover', [Login::class, 'recover'])->name('login.recover');

Route::get('/dashboard', [BuyerDashboard::class, 'index'])->name('buyerDashboard');


//ADMIN
Route::get('/admin/signup', [SignUpAdmin::class, 'index'])->name('admin.signup');
Route::post('/admin/signup', [SignUpAdmin::class, 'store'])->name('admin.signup.store');


Route::get('/admin/login', [LoginAdmin::class, 'index'])->name('admin.login');
Route::post('/admin/login', [LoginAdmin::class, 'login'])->name('admin.login.login');



