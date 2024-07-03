<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesore;
use App\Models\Estado;
use App\Models\Especialidad;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use PDF;

class ProfesoreController extends Controller
{

    private $idest;
    public function index()
    {
        $profesores = Profesore::all();
        $this->idest=$profesores;
        //nombre de la pantalla vista    la otra variable de arriba
        return view('profesor.profesorView', compact('profesores'));
    }

    public function create()
    {
        $especialidades = Especialidad::all();
        return view('profesor.create', compact('especialidades'));
    }
    public function imprimirProfesores()
    {
        $this->index();
        $profesores = $this->idest;

        $pdf = PDF::loadView('profesor.profesorView', compact('profesores'))->setPaper('a3', 'landscape');

        return $pdf->download('profesores.pdf');
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_profesor' => 'required|min:13|max:15|unique:profesores,id_profesor',
            'nombre' => ['required', 'string', 'min:3', 'max:50', 'regex:/^[\pL\s]+$/u'],
            'apellido' => ['required', 'string', 'min:3', 'max:50', 'regex:/^[\pL\s]+$/u'],
            'id_especialidad' => 'required',
            'correo_electronico' => 'required|string|min:4|max:50|unique:profesores,correo_electronico',
            'telefono' => 'required|min:8|max:8|unique:profesores,telefono',
        ]);

        // Crear registro en la base de datos
        try {
            //Profesore::create($request->all());

            Profesore::create([
                'id_profesor' => $request->id_profesor,
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'id_especialidad' => $request->id_especialidad,
                'correo_electronico' => $request->correo_electronico,
                'telefono' => $request->telefono,
                'estado_id' => 1,
            ]);

            $user = User::where('id_estudiante', $request->id_profesor)->first();

            if ($user) {
                // Actualizar el usuario existente
                $user->update([
                    'id_profesor' => $request->id_profesor,
                ]);
            } else {
                // Crear nuevo usuario
                $user = User::create([
                    'name' => $request->nombre . ' ' . $request->apellido,
                    'email' => $request->correo_electronico,
                    'password' => bcrypt(strtolower($request->correo_electronico)), 
                    'id_profesor' => $request->id_profesor,
                ]);
            }
        } catch (\Exception $e) {
            dd($e->getMessage()); // Muestra el mensaje de error para diagnóstico
        }

        return redirect()->route('profesorView');
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $profesore = Profesore::findOrFail($id);
        $especialidades = Especialidad::all();
        return view('profesor.edit', compact('profesore', 'especialidades'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'min:3', 'max:50', 'regex:/^[\pL\s]+$/u'],
            'apellido' => ['required', 'string', 'min:3', 'max:50', 'regex:/^[\pL\s]+$/u'],
            'id_especialidad' => 'required',
            'correo_electronico' => 'required|string|min:4|max:50|unique:profesores,correo_electronico,' . $id . ',id_profesor',
            'telefono' => 'required|min:8|max:8|unique:profesores,telefono,' . $id . ',id_profesor',
            'estado_id' => 'required|min:1|max:1'
        ]);

        try {
            // Buscar y actualizar el profesor
            $profesore = Profesore::findOrFail($id);
            $profesore->update($request->all());

            // Redireccionar a la vista de listado de profesores
            return redirect()->route('profesorView');
        } catch (\Exception $e) {
            // Capturar la excepción y manejarla
            dd($e->getMessage()); // Puedes cambiar dd() por otro manejo de errores según necesites
        }
    }

    public function destroy(string $id)
    {
        /*$profesore = Profesore::findOrFail($id);

        $profesore->delete();

        return redirect()->route('profesorView');*/


        try {
            $profesore = Profesore::findOrFail($id);

            if ($profesore->estado_id == 1) {
                $profesore->update(['estado_id' => 2]);
                return redirect()->route('profesorView');
            } else {
                return redirect()->route('profesorView')->with('info', 'El profesor ya está desactivado');
            }
        } catch (\Exception $e) {
            return redirect()->route('profesorView');
        }
    }
}
