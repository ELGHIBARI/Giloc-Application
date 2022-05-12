<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AnnonceController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/annonce/create', [AnnonceController::class, 'create'])->name('annonce.create');
Route::get('/annonces/{id}', [AnnonceController::class,'index'])->name('annonce.index');
Route::post("annonce/store", [AnnonceController::class, 'store']);


Route::get('/annonces/voiture_details/{id}', [AnnonceController::class,'voiture_details']);
Route::get('/annonces/moto_details/{id}', [AnnonceController::class,'moto_details']);
Route::get('/annonces/velo_details/{id}', [AnnonceController::class,'velo_details']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/users', [UserController::class, 'index']);
// or
//Route::get('/users', 'App\Http\Controllers\UserController@index');

