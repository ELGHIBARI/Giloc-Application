<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Evaluation_objetController;
use App\Http\Controllers\Evaluation_clientController;
use App\Http\Controllers\Evaluation_PartenaireController;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\SendEmailController;


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
Route::get('/', [HomeController::class, 'landingPage']);
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
Route::get('demande/details/{id_client}/{id_demande}', [DemandeController::class, 'show']);
Route::get('demande/accept/{id_demande}/{id_annonce}', [DemandeController::class, 'accept']);
Route::get('demande/refuse/{id_demande}/{id_annonce}', [DemandeController::class, 'refuse']);
Route::get('demande/reserver/{id}', [DemandeController::class, 'reserver']);


//Message
Route::post('message', [MessageController::class, 'getAjax'])->name('message');

/// routes espace client
Route::get('/acceuil', [HomeController::class, 'acceuil'])->name('acceuil');
Route::get('/annonce/{id}', [AnnonceController::class, 'showDeltails'])->name('annonces.show');
Route::get('/reservation/{id}/{id_client}/{vehicule}/{modele}/{date_debut}/{date_fin}/{prix}', [App\Http\Controllers\AnnonceController::class, 'reserver'])->name('annonces.reserver');
Route::post('/reservation/confirmation', [App\Http\Controllers\DemandeController::class, 'store'])->name('reservation.store');
Route::get('/mesReservations',[App\Http\Controllers\DemandeController::class, 'mesReservation'])->name('client.demande');
Route::get('/Recherche',[App\Http\Controllers\HomeController::class, 'rechercherCategorie'])->name('client.recherche');
Route::get('/Message',[App\Http\Controllers\MessageController::class, 'index'])->name('client.message');
Route::get('/voiture', [HomeController::class, 'showVoiture'])->name('annonces.voiture');
Route::get('/moto', [HomeController::class, 'showMoto'])->name('annonces.moto');
Route::get('/velo', [HomeController::class, 'showVelo'])->name('annonces.velo');


//page des evaluation 
Route::get('/annonce/evaluation/voiture/{id}', [AnnonceController::class,'evaluation_voiture']);
Route::get('/annonce/evaluation/moto/{id}', [AnnonceController::class,'evaluation_moto']);
Route::get('/annonce/evaluation/velo/{id}', [AnnonceController::class,'evaluation_velo']);
Route::get('/evaluations/{id}', [Evaluation_objetController::class,'index']);
Route::group(['middleware' => 'auth'], function () {
    Route::get('/evaluations/{id}', [Evaluation_objetController::class,'index']);
    Route::get('/evaluations', [Evaluation_partenaireController::class,'index'])->name('evaluation.partenaire');

});
// evaluer le client
Route::post("evaluer/{id}", [Evaluation_clientController::class, 'update']);
// evaluer le objet/partenaire
Route::post("evaluer_objet_partenaire/{id}", [Evaluation_objetController::class, 'update']);
//Email
//Route::get('send-email', [SendEmailController::class, 'index']);
// evaluer le objet/partenaire
Route::post("evaluer_objet_partenaire/{id}", [Evaluation_partenaireController::class, 'update']);

Route::get('/archiver/{id}', [AnnonceController::class,'AnnonceArchiver'])->name('annonces.archiver');

Auth::routes();

