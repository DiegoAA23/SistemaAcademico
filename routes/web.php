<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/auth/login');
});

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //mandar a la vista de las clases (formulario)
    //Route::view('clases', 'clases')->name('clases');
    
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::view('clases', 'clases')->name('clases');
    Route::view('matricula', 'matricula')->name('matricula');
    Route::view('historial', 'historial')->name('historial');
    Route::view('estudcalificaciones', 'estudcalificaciones')->name('estudcalificaciones');
    Route::view('profesores', 'profesores')->name('profesores');
    Route::view('estudiantes', 'estudiantes')->name('estudiantes');
    Route::view('asignacionClasedocente', 'asignacionClasedocente')->name('asignacionClasedocente');
    Route::view('horarios', 'horarios')->name('horarios');
    Route::view('registrarCalificaciones', 'registrarCalificaciones')->name('registrarCalificaciones');

    //Route::put('/clases', [ClasesController::class, 'store'])->name('clases.registrar');
});

require __DIR__.'/auth.php';
