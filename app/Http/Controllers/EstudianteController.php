<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use App\Models\Estado;
use Illuminate\Support\Facades\Validator;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = Estudiante::all();
        //nombre de la pantalla vista    la otra variable de arriba
        return view('estudiante.estudianteView', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
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
            'id_estudiante' => 'required|min:13|max:15',
            'nombre' => 'required|string|min:3|max:50',
            'apellido' => 'required|string|min:3|max:50',
            'fecha_de_nacimiento' => 'required|date',
            'genero' => 'required',
            'direccion' => 'required|string|min:3|max:100',
            'telefono' => 'required|min:8|max:8',
            'correo_electronico' => 'required|string|min:4|max:50',
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
            'nombre' => 'required|string|min:3|max:50',
            'apellido' => 'required|string|min:3|max:50',
            'fecha_de_nacimiento' => 'required|date',
            'genero' => 'required',
            'direccion' => 'required|string|min:3|max:100',
            'telefono' => 'required|min:8|max:8',
            'correo_electronico' => 'required|string|min:4|max:50',
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
}
