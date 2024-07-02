<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;
use App\Models\Estado;
use App\Models\Clase;
use App\Models\Aula;
use PDF;


class HorarioController extends Controller
{
    private $idest;
    public function index()
    {
        $horarios = Horario::all();
        $this->idest = $horarios;
        return view('horario.horarioView', compact('horarios'));
    }

    public function create()
    {
        $aulas = Aula::all();
        $clases = Clase::all();
        return view('horario.create', compact('aulas', 'clases'));
    }

    public function imprimirHorarios()
    {
        $this->index();
        $horarios = $this->idest;

        $pdf = PDF::loadView('horario.horarioView', compact('horarios'))->setPaper('a3', 'landscape');

        return $pdf->download('horarios.pdf');
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_curso' => 'required',
            'aula_id' => 'required',
            'dias' => ['required', 'string', 'min:1', 'max:6', 'regex:/^[LMMJVS]+$/'],
            'fecha_inicio' => 'required|date|after_or_equal:today',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'hora_inicio' => 'required',
            'hora_fin' => 'required|after:hora_inicio',
        ]);

        try {
            Horario::create([
                'id_curso' => $request->id_curso,
                'aula_id' => $request->aula_id,
                'dias' => $request->dias,
                'fecha_inicio' => $request->fecha_inicio,
                'fecha_fin' => $request->fecha_fin,
                'hora_inicio' => $request->hora_inicio,
                'hora_fin' => $request->hora_fin,
                'estado_id' => 1
            ]);

            return redirect()->route('horarioView');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $horario = Horario::findOrFail($id);
        $aulas = Aula::all();
        $clases = Clase::all();
        return view('horario.edit', compact('horario', 'aulas', 'clases'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_curso' => 'required',
            'aula_id' => 'required',
            'dias' => ['required', 'string', 'min:1', 'max:6', 'regex:/^[LMMJVS]+$/'],
            'fecha_inicio' => 'required|date|after_or_equal:today',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'hora_inicio' => 'required',
            'hora_fin' => 'required|after:hora_inicio',
            'estado_id' => 'required|min:1|max:1'
        ]);

        try {
            $horario = Horario::findOrFail($id);
            $horario->update($request->all());

            return redirect()->route('horarioView');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $horario = Horario::findOrFail($id);

            if ($horario->estado_id == 1) {
                $horario->update(['estado_id' => 2]);
                return redirect()->route('horarioView');
            } else {
                return redirect()->route('horarioView');
            }
        } catch (\Exception $e) {
            return redirect()->route('horarioView');
        }
    }
}
