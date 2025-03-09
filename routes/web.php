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
    // Ruta para obtener los eventos en formato JSON (usada por FullCalendar)
    Route::get('/evento/mostrar', [EventoController::class, 'show'])->name('evento.mostrar');

    // Ruta para guardar un nuevo evento
    Route::post('/evento/agregar', [EventoController::class, 'store'])->name('evento.store');

    // Ruta para editar un evento
    Route::get('/evento/editar/{id}', [EventoController::class, 'edit'])->name('evento.edit');

    // Ruta para actualizar un evento
    Route::put('/evento/actualizar/{id}', [EventoController::class, 'update'])->name('evento.update');

    // Ruta para eliminar un evento
    Route::delete('/evento/eliminar/{id}', [EventoController::class, 'destroy'])->name('evento.destroy');

    Route::get('/admin', [_SiteController::class, 'admin'])->name('admin.index');
    Route::resource('/categories', CategoryController::class)->names('categories');
    Route::resource('/contacts', ContactController::class)->names('contacts');
    Route::resource('/evento', EventoController::class)->names('evento');


});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
