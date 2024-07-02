<?php

use App\Http\Controllers\Clases;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteNotas;
use App\Http\Controllers\ProfesoreController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\NivelesUsuario;
use Barryvdh\DomPDF\Facade\PDF;

Route::get('/', function () {
    return view('/auth/login');
});
/*
Route::get('/imprimir-pdf', function(){
    $pdf = PDF::loadView('estudCalificaciones');
    return $pdf->download('dashboard.pdf');
});*/

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //mandar a la vista de las clases (formulario)
    //Route::view('clases', 'clases')->name('clases');
});
Route::get('/imprimir-notas', [EstudianteNotas::class, 'imprimirNotas']);
Route::get('/imprimir-historial', [EstudianteNotas::class, 'imprimirHistorial']);
Route::get('/imprimir-profesores', [ProfesoreController::class, 'imprimirProfesores']);
Route::get('/imprimir-estudiantes', [EstudianteController::class, 'imprimirEstudiantes']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('obtenerEstudiante', [EstudianteNotas::class, 'obtenerEstudiante'])->name('obtenerEstudiante');
    //Route::get('layouts/app', [NivelesUsuario::class, 'index'])->name('layouts/app');
    Route::get('obtenerEstudiante2', [EstudianteNotas::class, 'obtenerEstudiante2'])->name('obtenerEstudiante2');
    Route::get('estudcalificaciones/{id}', [EstudianteNotas::class, 'notas'])->name('estudcalificaciones.id');
    Route::get('historial/{id}', [EstudianteNotas::class, 'notas_periodo'])->name('historial.id');
    Route::get('clases', [EstudianteNotas::class, 'profesores'])->name('clases');
    Route::get('/profesor/profesorView', [ProfesoreController::class, 'index'])->name('profesorView');
    Route::get('/profesor/create', [ProfesoreController::class, 'create'])->name('profesorCreate');
    Route::get('/profesor/edit/{id}', [ProfesoreController::class, 'edit'])->name('profesorEdit');
    Route::resource('profesoresC', ProfesoreController::class);
    Route::get('/estudiante/estudianteView', [EstudianteController::class, 'index'])->name('estudianteView');
    Route::get('/estudiante/create', [EstudianteController::class, 'create'])->name('estudianteCreate');
    Route::get('/estudiante/edit/{id}', [EstudianteController::class, 'edit'])->name('estudianteEdit');
    Route::resource('estudiantesC', EstudianteController::class);
    //Route::view('clases', 'clases')->name('clases');
    Route::get('horarios', [EstudianteNotas::class, 'clases'])->name('horarios');
    Route::get('matricula', [EstudianteNotas::class, 'index'])->name('matricula');
    Route::get('asignacionClasedocente', [EstudianteNotas::class, 'clases_profesores'])->name('asignacionClasedocente');
    Route::get('registrarCalificaciones', [EstudianteNotas::class, 'calificaciones'])->name('registrarCalificaciones');
    //Route::get('asignacionClasedocente', [EstudianteNotas::class, 'clases'])->name('asignacionClasedocente');
    //Route::get('estudcalificaciones/{id}', [EstudianteNotas::class, 'notas'])->name('estudcalificaciones.id');
    Route::get('historial/{id}', [EstudianteNotas::class, 'notas_periodo'])->name('historial.id');
    // Route::view('matricula', 'matricula')->name('matricula');
    Route::view('historial', 'historial')->name('historial');
    //Route::view('estudcalificaciones', 'estudcalificaciones')->name('estudcalificaciones');
    Route::view('profesores', 'profesores')->name('profesores');
    Route::view('estudiantes', 'estudiantes')->name('estudiantes');
    // Route::view('asignacionClasedocente', 'asignacionClasedocente')->name('asignacionClasedocente');
    //Route::view('horarios', 'horarios')->name('horarios');
    //Route::view('registrarCalificaciones', 'registrarCalificaciones')->name('registrarCalificaciones');

    //Route::put('/clases', [ClasesController::class, 'store'])->name('clases.registrar');
});

require __DIR__ . '/auth.php';
