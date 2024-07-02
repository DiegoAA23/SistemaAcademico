<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use App\Models\Estado;
use Illuminate\Support\Facades\Validator;
use PDF;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $idest;
    public function index()
    {
        $estudiantes = Estudiante::all();
        $this->idest = $estudiantes;
        //nombre de la pantalla vista    la otra variable de arriba
        return view('estudiante.estudianteView', compact('estudiantes'));
    }
    public function imprimirEstudiantes()
    {
        $this->index();
        $estudiantes = $this->idest;

        $pdf = PDF::loadView('estudiante.estudianteView', compact('estudiantes'))->setPaper('a3', 'landscape');

        return $pdf->download('estudiantes.pdf');
    }


    public function create()
    {
        return view('estudiante.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_estudiante' => 'required|min:13|max:15|unique:estudiantes,id_estudiante',
            'nombre' => ['required', 'string', 'min:3', 'max:50', 'regex:/^[\pL\s]+$/u'],
            'apellido' => ['required', 'string', 'min:3', 'max:50', 'regex:/^[\pL\s]+$/u'],
            'fecha_de_nacimiento' => 'required|date|before:today',
            'genero' => 'required',
            'direccion' => 'required|string|min:3|max:100',
            'telefono' => 'required|min:8|max:8|unique:estudiantes,telefono',
            'correo_electronico' => 'required|string|min:4|max:50|unique:estudiantes,correo_electronico',
        ]);

        // Crear registro en la base de datos
        try {
            Estudiante::create([
                'id_estudiante' => $request->id_estudiante,
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'fecha_de_nacimiento' => $request->fecha_de_nacimiento,
                'genero' => $request->genero,
                'direccion' => $request->direccion,
                'telefono' => $request->telefono,
                'correo_electronico' => $request->correo_electronico,
                'estado_id' => 1,
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        return redirect()->route('estudianteView');
    }

    /**
     * Display the specified resource.
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_estudiante)
    {
        $estudiante = Estudiante::findOrFail($id_estudiante);
        return view('estudiante.edit', compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_estudiante)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'min:3', 'max:50', 'regex:/^[\pL\s]+$/u'],
            'apellido' => ['required', 'string', 'min:3', 'max:50', 'regex:/^[\pL\s]+$/u'],
            'fecha_de_nacimiento' => 'required|date|before:today',
            'genero' => 'required',
            'direccion' => 'required|string|min:3|max:100',
            'telefono' => 'required|min:8|max:8|unique:estudiantes,telefono,' . $id_estudiante . ',id_estudiante',
            'correo_electronico' => 'required|string|min:4|max:50|unique:estudiantes,correo_electronico,' . $id_estudiante . ',id_estudiante',
        ]);

        try {
            $estudiante = Estudiante::findOrFail($id_estudiante);
            $estudiante->update($request->all());
            return redirect()->route('estudianteView');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_estudiante)
    {
        /*$estudiante = Estudiante::findOrFail($id_estudiante);

        $estudiante->delete();

        return redirect()->route('estudianteView');*/

        try {
            $estudiante = Estudiante::findOrFail($id_estudiante);

            if ($estudiante->estado_id == 1) {
                $estudiante->update(['estado_id' => 2]);
                return redirect()->route('estudianteView');
            } else {
                return redirect()->route('estudianteView');
            }
        } catch (\Exception $e) {
            return redirect()->route('estudianteView')->with('error', 'Error al desactivar el estudiante: ' . $e->getMessage());
        }
    }
    public function matricularClases(Request $request)
    {
        $periodo = $request->query('periodo', 0);

        return view('matricularClases', compact('periodo'));
    }

    public function guardarMatricula($id)
    {
    }
}
