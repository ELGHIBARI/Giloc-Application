<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// landing page
Route::get('/', function () {
    return view('welcome');
});
// home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Annonces
Route::get('annonce/create', [AnnonceController::class, 'create'])->name('annonce.create');
Route::post("annonce/store", [AnnonceController::class, 'store']);

//Demandes
Route::get('demande/index', [TestController::class, 'index'])->name('demande.index');;

Auth::routes();

