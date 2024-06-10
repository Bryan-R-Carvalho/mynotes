<?php

use App\Http\Controllers\NotaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home')->name('home');
});

Route::middleware('auth')->group(function () {
    Route::get('/search', [NotaController::class, 'search'])->name('notas.search');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/notas', [NotaController::class, 'store'])->name('notas.store');
    Route::put('/notas/{nota}', [NotaController::class, 'update'])->name('notas.update');
    Route::delete('/notas/{nota}', [NotaController::class, 'destroy'])->name('notas.destroy');

});
Route::get('/', [NotaController::class, 'index'])->name('notas.index');

require __DIR__.'/auth.php';
