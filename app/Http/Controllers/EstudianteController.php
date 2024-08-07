<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use App\Models\Estado;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Barryvdh\DomPDF\Facade\PDF;

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
            'id_estudiante' => [
                'required',
                'unique:estudiantes,id_estudiante',
                'regex:/^[0-1][0-8](0[1-9]|1[0-9]|2[0-8])(19\d{2}|200\d|2010)\d{5}$/'
            ],
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

            $user = User::where('id_profesor', $request->id_estudiante)->first();

            if ($user) {
                // Verificar si el correo electrónico coincide
                if ($user->email !== $request->correo_electronico) {
                    throw new \Exception('El correo electrónico no coincide con el del usuario existente.');
                }

                // Actualizar el usuario existente
                $user->update([
                    'id_estudiante' => $request->id_estudiante
                ]);
            } else {
                // Crear nuevo usuario
                $user = User::create([
                    'name' => $request->nombre . ' ' . $request->apellido,
                    'email' => $request->correo_electronico,
                    'password' => bcrypt(strtolower($request->correo_electronico)),
                    'id_estudiante' => $request->id_estudiante
                ]);
            }
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
