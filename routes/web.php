<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CollecteController;
use App\Http\Controllers\EnqueteurController;
use App\Http\Controllers\ObjectifController;
use App\Http\Controllers\RealisationController;
use App\Http\Controllers\TypeOuvrageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/login', function () {
    return view('pages.login');
})->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('connexion');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('pages.welcome');
    });


    Route::middleware('admin')->group(function () {
        Route::resource('ouvrages', TypeOuvrageController::class);
        Route::resource('utilisateur', UserController::class);
        Route::post('updatePassword/{id_user}', [UserController::class, 'updatePassword'])->name('updatePassword');
    });

    Route::middleware('superviseur')->group(function () {
        Route::post('validation-n2', [RealisationController::class, 'validation_n2'])->name('validation-n2');
    });

    Route::get('collecte', [CollecteController::class, 'index'])->name('collecte');
    Route::get('collecte/validation-n1', [CollecteController::class, 'validation_n1'])->name('vueValidationN1');
    Route::get('collecte/validation-n2', [CollecteController::class, 'validation_n2'])->name('vueValidationN2');

    Route::post('save-collecte', [RealisationController::class, 'saveObjectifByEnqueteur'])->name('save-collecte');
    Route::post('validation-n1', [RealisationController::class, 'validation_n1'])->name('validation-n1');


    Route::resource('enqueteur', EnqueteurController::class);
    Route::resource('objectifs', ObjectifController::class);
});
