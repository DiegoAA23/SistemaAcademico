<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Compartir la variable 'usuario' con todas las vistas
        View::composer('*', function ($view) {
            $usuario = Auth::user();
            $tipo = 0;

            if($usuario) {
                if($usuario->id_estudiante !== null && $usuario->id_profesor !== null){
                    $tipo = 3;
                } else if($usuario->id_profesor !== null){
                    $tipo = 2;
                } else if($usuario->id_estudiante !== null){
                    $tipo = 1;
                }
            }

            $view->with('usuario', $tipo);
        });
    }
}
