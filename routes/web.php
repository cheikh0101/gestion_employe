<?php

use App\Http\Controllers\MembreController;
use App\Http\Controllers\StructureController;
use Illuminate\Support\Facades\Route;

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
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard', 'as' =>
'dashboard.'], function () {
    Route::resource('structure', App\Http\Controllers\StructureController::class);

    Route::resource('membre', App\Http\Controllers\MembreController::class);

    Route::resource('conjoint', App\Http\Controllers\ConjointController::class);

    Route::resource('enfant', App\Http\Controllers\EnfantController::class);

    Route::resource('user', App\Http\Controllers\UserController::class);

    Route::resource('gestionnaire', App\Http\Controllers\GestionnaireController::class);
});

Route::post('structure/search', [StructureController::class, 'search'])->name('structure.search');

Route::post('membre/search', [MembreController::class, 'search'])->name('membre.search');

Route::fallback(function () {
    return view('auth.login');
});
