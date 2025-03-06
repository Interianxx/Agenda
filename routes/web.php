<?php

use App\Http\Controllers\_SiteController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', _SiteController::class)->name('index');

/* Rutas del sistema de Agenda*/
Route::middleware('auth')->group(function () {
    Route::get('/admin', [_SiteController::class, 'admin'])->name('admin.index');
    Route::resource('/categories', CategoryController::class)->names('categories');
    Route::resource('/contacts', ContactController::class)->names('contacts');
    Route::resource(name: '/evento', controller: EventoController::class)->names('evento'); 
});



Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
