<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApprenantController;
use App\Http\Controllers\EcoleController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\NiveauController;


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

Route::get('test', function () {
    return view('test');
});

Route::prefix('scolaire/{idEcol}')->group(function () {

    Route::prefix('ecole')->group(function () {

        Route::match(['get', 'post'], 'accueilecole', [EcoleController::class, 'index'])->name('accueil.ecole');
    });

    Route::prefix('enseignant')->group(function () {

        Route::match(['get', 'post', 'delete'], 'ajout', [EnseignantController::class, 'ajouterEnseignant'])->name('ajouter.enseignant');
    });

    Route::prefix('niveau')->group(function () {

        Route::match(['get', 'post', 'delete'], 'ajout', [NiveauController::class, 'ajouterNiveau'])->name('ajouter.niveau');
        Route::match(['get'], 'all', [NiveauController::class, 'lireNiveaux'])->name('lire.niveau');

    });

    Route::prefix('classe')->group(function () {

        Route::match(['get', 'post', 'delete'], 'ajout', [ClasseController::class, 'ajouterClasse'])->name('ajouter.classe');
        Route::match(['get'], 'allniv/{idNiv}', [ClasseController::class, 'lireClassesniv'])->name('lire.classeniv');
    });

    Route::prefix('apprenant')->group(function () {

        Route::match(['get', 'post', 'delete'], 'ajout/{idClas}', [ApprenantController::class, 'ajouterApprenant'])->name('ajouter.apprenant');

        Route::match(['get'], 'allclas/{idClas}', [ApprenantController::class, 'lireApprenantsclas'])->name('lire.appreclas');
    
    });


    Route::prefix('cours')->group(function () {

        Route::match(['get', 'post', 'delete'], 'ajout/{idNiv}', [CoursController::class, 'ajouterCours'])->name('ajouter.cours');

    });

});


/*Route::prefix('scolaire/apprenant')->group(function () {

    Route::match(['get', 'post', 'delete'], 'ajout', [ApprenantController::class, 'ajouterApprenant'])->name('ajouter.apprenant');

});*/

/*Route::prefix('ecole')->group(function () {

    Route::match(['get', 'post', 'delete'], 'ajout', [EcoleController::class, 'ajouterEcole'])->name('ajouter.ecole');

    Route::match(['get', 'post'], 'accueilecole/{idEcol}', [EcoleController::class, 'index'])->name('accueil.ecole');
});

Route::prefix('niveau/{idEcol}')->group(function () {

    Route::match(['get', 'post', 'delete'], 'ajout', [NiveauController::class, 'ajouterNiveau'])->name('ajouter.niveau');

});

Route::prefix('classe/{idEcol}')->group(function () {

    Route::match(['get', 'post', 'delete'], 'ajout', [ClasseController::class, 'ajouterClasse'])->name('ajouter.classe');

});*/



/*Route::prefix('scolaire/enseignant')->group(function () {

    Route::match(['get', 'post', 'delete'], 'ajout', [EnseignantController::class, 'ajouterEnseignant'])->name('ajouter.enseignant');

});*/

Route::prefix('scolaire/evaluation')->group(function () {

    Route::match(['get', 'post', 'delete'], 'ajout', [EvaluationController::class, 'ajouterEvaluation'])->name('ajouter.evaluation');

});



//import fichier excel

Route::get('importation-fichiers', [FileController::class, 'importExportView']);
Route::get('export', [FileController::class, 'export'])->name('export');
Route::post('import', [MyController::class, 'import'])->name('import');


