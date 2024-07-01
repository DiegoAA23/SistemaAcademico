<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EstudianteNotas extends Controller
{
    function index()
    {
        $data = array(
            'list' => DB::table('clases_horarios')->get(),
        );
        return view('matricula', $data);
    }

    public function autenticar()
    {
        /* if(Auth::id()){
            $usertype = Auth()->user()->id_rol;

            if($usertype==2){

            }
        }*/
    }

    public function obtenerEstudiante()
    {
        $estudiante = DB::table('estudiantes')->where('id_estudiante', 2)->first();

        if (!$estudiante) {
            return redirect()->back()->with('error', 'No se encontró ningún estudiante.');
        }

        $id = $estudiante->id_estudiante;

        return redirect()->route('estudcalificaciones.id', ['id' => $id]);
    }

    public function notas($id)
    {
        $item = DB::table('notas')->where('id_estudiante', $id)->get();

        return view('estudcalificaciones', ['item' => $item]);
    }

    public function notas_periodo($id)
    {
        $item = DB::table('notas_periodo')->where('id_estudiante', $id)->get();

        return view('historial', ['item' => $item]);
    }

    public function obtenerEstudiante2()
    {
        $estudiante = DB::table('estudiantes')->where('id_estudiante', 2)->first();

        if (!$estudiante) {
            return redirect()->back()->with('error', 'No se encontró ningún estudiante.');
        }

        $id = $estudiante->id_estudiante;

        return redirect()->route('historial.id', ['id' => $id]);
    }
    public function clases_profesores()
    {
        $data = array(
            'lista' => DB::table('cursos')->get(),
        );
        $data1 = array(
            'list' => DB::table('profesores')->get(),
        );
        return view('asignacionClasedocente', $data, $data1);
    }

    public function clases()
    {
        $data = array(
            'lista' => DB::table('cursos')->get(),
        );
        return view('horarios', $data);
    }

    public function profesores()
    {
        $data = array(
            'lista' => DB::table('profesores')->get(),
        );
        return view('clases', $data);
    }

    public function calificaciones()
    {
        $data = array(
            'lista' => DB::table('cursos')->get(),
        );
        $data1 = array(
            'list' => DB::table('estudiantes')->get(),
        );
        return view('registrarCalificaciones', $data, $data1);
    }
}
