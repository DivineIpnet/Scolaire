<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApprenantController;
use App\Http\Controllers\EcoleController;



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
    return view('layout');
});


Route::prefix('scolaire/apprenant')->group(function () {

    Route::match(['get', 'post', 'delete'], 'ajout', [ApprenantController::class, 'ajouterApprenant'])->name('ajouter.apprenant');

});

Route::prefix('scolaire/ecole')->group(function () {

    Route::match(['get', 'post', 'delete'], 'ajout', [EcoleController::class, 'ajouterEcole'])->name('ajouter.ecole');

});
