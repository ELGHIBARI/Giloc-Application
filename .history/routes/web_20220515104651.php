<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\DemandeController;

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
Route::get('/annonces/{id}', [AnnonceController::class,'index'])->name('annonce.index');
Route::get('/annonces/voiture_details/{id}', [AnnonceController::class,'voiture_details']);
Route::get('/annonces/moto_details/{id}', [AnnonceController::class,'moto_details']);
Route::get('/annonces/velo_details/{id}', [AnnonceController::class,'velo_details']);


//Demandes
Route::get('demande/index', [DemandeController::class, 'index']);
Route::get('demande/details/{id_annonce}/{id_client}/{id_demande}', [DemandeController::class, 'show']);
Route::get('demande/accept/{id_demande}/{id_annonce}', [DemandeController::class, 'accept']);
Route::get('demande/refuse/{id}', [DemandeController::class, 'refuse']);


//Message
Route::get('message/{id_conversation}/{id_receiver}', [MessageController::class, 'store']);

Auth::routes();

