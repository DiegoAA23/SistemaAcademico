<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use App\Models\Calificaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeriodoController extends Controller
{
    public function store(Request $request)
    {
        try {
            foreach ($request->id_curso as $key => $curso) {
                Periodo::create([
                    'id_estudiante' => $request->id_estudiante[$key],
                    'id_curso' => $curso,
                    'año' => 2024,
                    'estado_id' => 1,
                ]);
            }
            $this->storeN();
            return redirect()->route('matricula')->with('success', 'Inscripciones creadas exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al crear las inscripciones.')->withInput();
        }
    }

    public function storeN()
    {
        try {

            $inscripciones = DB::table('nueva_insc')->get();

            foreach ($inscripciones as $inscripcion) {
                Calificaciones::create([
                    'id_inscripcion' => $inscripcion->id_inscripcion,
                    'nota' => 0.0,
                ]);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al crear las inscripciones.')->withInput();
        }
    }
}
