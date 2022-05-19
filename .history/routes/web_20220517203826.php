<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\MessageController;

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

//Annonces détails
Route::get('/annonces/voiture_details/{id}', [AnnonceController::class,'voiture_details']);
Route::get('/annonces/moto_details/{id}', [AnnonceController::class,'moto_details']);
Route::get('/annonces/velo_details/{id}', [AnnonceController::class,'velo_details']);
Route::get('/annonce/active/voiture/{id}', [AnnonceController::class,'activer_voiture']);
Route::get('/annonce/archive/voiture/{id}', [AnnonceController::class,'archiver_voiture']);
Route::get('/annonce/active/moto/{id}', [AnnonceController::class,'activer_moto']);
Route::get('/annonce/archive/moto/{id}', [AnnonceController::class,'archiver_moto']);
Route::get('/annonce/active/velo/{id}', [AnnonceController::class,'activer_velo']);
Route::get('/annonce/archive/velo/{id}', [AnnonceController::class,'archiver_velo']);

//Demandes
Route::get('demande/index', [DemandeController::class, 'index']);
Route::get('demande/details/{id_annonce}/{id_client}/{id_demande}', [DemandeController::class, 'show']);
Route::get('demande/accept/{id_demande}/{id_annonce}', [DemandeController::class, 'accept']);
Route::get('demande/refuse/{id_demande}/{id_annonce}', [DemandeController::class, 'refuse']);
Route::get('demande/reserver/{id}', [DemandeController::class, 'refuse']);


//Message
Route::post('message', [MessageController::class, 'getAjax'])->name('message');

Auth::routes();

