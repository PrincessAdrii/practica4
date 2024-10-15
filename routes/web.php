<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/catalogos', function(){
    return view ('catalogos');
})->middleware("auth") ->name("catalogos");

Route::get('/horarios', function(){
    return view ('horarios');
})->middleware("auth") ->name("horarios");

Route::get('/proyectos', function(){
    return view ('proyectos');
})->middleware("auth") ->name("proyectos");



Route::get('/', function () {
    return view('inicio');
});

Route::get('/dashboard', function () {
    return view('inicio');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
