<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ChapitreController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\TypeController;
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

Route::get('/formation/{id}/chapitre/ajout', [ChapitreController::class, 'index'])->name('chapitre-form');
Route::post('/formation/{id}/chapitre/ajout', [ChapitreController::class, 'store'])->name('chapitre-add');
Route::put('/formation/{id}/chapitre/{chapitreId}/update', [ChapitreController::class, 'update'])->name('chapitre-update');
Route::delete('/formation/{id}/chapitre/{chapitreId}/suppression', [ChapitreController::class, 'delete'])->name('chapitre-delete');

Route::get('/demande', [DemandeController::class, 'index'])->middleware(['isAdmin'])->name('demande-list');
Route::post('/demande/ajout', [DemandeController::class, 'addUser'])->middleware(['isAdmin'])->name('demande-add');
Route::delete('/demande/{id}/suppression', [DemandeController::class, 'delete'])->middleware(['isAdmin'])->name('demande-delete');

Route::post('/register', [DemandeController::class, 'storeAndSend'])->middleware('guest')->name('demande-store');

Route::get('/user/formations', [UserController::class, 'index'])->middleware(['auth'])->name('user-formation-list');

Route::get('/users', [AdminController::class, 'index'])->middleware(['auth'])->name('users-list');

Route::get('/profil/{id}', [UserController::class, 'indexProfil'])->middleware(['auth'])->name('profil');
Route::put('/profil/{id}', [UserController::class, 'update'])->middleware(['auth'])->name('profil-update');
Route::put('/profil/{id}/password', [UserController::class, 'updatePassword'])->middleware(['auth'])->name('profil-update-password');
Route::put('/profil/{id}/image', [UserController::class, 'updateImage'])->middleware(['auth'])->name('profil-update-image');
Route::delete('/profil/{id}/suppression', [UserController::class, 'delete'])->middleware(['auth'])->name('profil-delete');

Route::get('/categories', [CategorieController::class, 'index'])->name('categories-list');
Route::get('/categories/add', [CategorieController::class, 'add'])->name('categories-add')->middleware('auth');
Route::post('/categories/add', [CategorieController::class, 'store'])->name('categories-store')->middleware('auth');
Route::put('/categories/{id}/update', [CategorieController::class, 'update'])->name('categories-update')->middleware('auth');
Route::delete('/categories/{id}/delete', [CategorieController::class, 'delete'])->name('categories-delete')->middleware('auth');

Route::get('/types', [TypeController::class, 'index'])->name('types-list');
Route::get('/types/add', [TypeController::class, 'add'])->name('types-add')->middleware('auth');
Route::post('/types/add', [TypeController::class, 'store'])->name('types-store')->middleware('auth');
Route::put('/types/{id}/update', [TypeController::class, 'update'])->name('types-update')->middleware('auth');
Route::delete('/types/{id}/delete', [TypeController::class, 'delete'])->name('types-delete')->middleware('auth');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
