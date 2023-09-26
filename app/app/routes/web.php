<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Liste de tous les chats
Route::get('/cats', [CatController::class, 'index'])->name('cats.index');

// Détail d'un chat
Route::get('/cat/{id}', [CatController::class, 'show'])->name('cats.show');

// Formulaire de création d'un chat
Route::get('/cats/create', [CatController::class, 'create'])->name('cats.create');
Route::post('/cats/store', [CatController::class, 'store'])->name('cats.store');

// Formulaire de mise à jour d'un chat
Route::get('/cat/{id}/update', [CatController::class, 'edit'])->name('cats.edit');
Route::put('/cat/{id}/update', [CatController::class, 'update'])->name('cats.update');

// Suppression d'un chat
Route::delete('/cat/{id}/delete', [CatController::class, 'destroy'])->name('cats.destroy');
