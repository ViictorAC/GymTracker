<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RutinaController;
use App\Http\Controllers\EntrenoController;
use App\Http\Controllers\EjercicioController;
use App\Http\Controllers\ProgresController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('rutinas', RutinaController::class);
    Route::resource('entrenos', EntrenoController::class);

    Route::get('/ejercicios', [EjercicioController::class, 'index'])->name('ejercicios.index');
    Route::get('/ejercicios/{ejercicio}', [EjercicioController::class, 'show'])->name('ejercicios.show');

    Route::get('/progres', [ProgresController::class, 'index'])->name('progres.index');
    Route::get('/progres/{ejercicio_id}', [ProgresController::class, 'show'])->name('progres.show');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
