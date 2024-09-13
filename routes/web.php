<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController as Homepage;
use App\Http\Controllers\SignupController as Signup;
use App\Http\Controllers\LoginController as Login;

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
Route::get('/signup', [Signup::class, 'index'])->name('signup');
Route::get('/login', [Login::class, 'index'])->name('login');
