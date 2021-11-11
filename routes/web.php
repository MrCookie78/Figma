<?php

use App\Http\Controllers\DemandeController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\UserController;
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

Route::get('/', [FormationController::class, 'index'])->name('formation-list');
Route::get('/formations/ajout', [FormationController::class, 'add'])->name('formation-add');
Route::post('/formation/ajout', [FormationController::class, 'store'])->name('formation-store');
Route::get('/formations/{id}', [FormationController::class, 'detail'])->name('formation-detail');
Route::put('/formation/{id}', [FormationController::class, 'update'])->name('formation-update');
Route::put('/formations/{id}/image', [FormationController::class, 'updateImage'])->name('formation-update-image');
Route::delete('/formations/{id}/supression', [FormationController::class, 'delete'])->name('formation-delete');

Route::get('/demande', [DemandeController::class, 'index'])->middleware(['isAdmin'])->name('demande-list');
Route::post('/demande/ajout', [DemandeController::class, 'addUser'])->middleware(['isAdmin'])->name('demande-add');

Route::post('/register', [DemandeController::class, 'storeAndSend'])->middleware('guest')->name('demande-store');

Route::get('/profil', [UserController::class, 'indexProfil'])->middleware(['auth'])->name('profil');
Route::put('/profil/{id}', [UserController::class, 'store'])->middleware(['auth'])->name('profil-store');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
