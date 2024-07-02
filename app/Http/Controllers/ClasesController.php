<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use Illuminate\Http\Request;
use App\Models\Profesore;
use Illuminate\Support\Facades\Validator;
use App\Models\Estado;
use PDF;

class ClasesController extends Controller
{
    private $idest;
    public function index()
    {
        $clases = Clase::all();
        $this->idest = $clases;
        return view('clase.claseView', compact('clases'));
    }

    public function create()
    {
        $profesores = Profesore::all();
        return view('clase.create', compact('profesores'));
    }

    public function imprimirClases()
    {
        $this->index();
        $clases = $this->idest;

        $pdf = PDF::loadView('clase.claseView', compact('clases'))->setPaper('a3', 'landscape');

        return $pdf->download('clases.pdf');
    }

    public function store(Request $request)
    {
        /*$request->validate([
            'nombre_clase' => [
            'required', 
            'string', 
            'min:3', 
            'max:50', 
            'unique:cursos,nombre_clase', 
            'regex:/^[\pL\s]+$/u'
            ],
            'id_profesor' => 'required',
            'periodo' => 'required|min:1|max:2'
        ]);
    
        try {
            Clase::create([
                'nombre_clase' => $request->nombre_clase,
                'id_profesor' => $request->id_profesor,
                'periodo' => $request->periodo,
                'estado_id' => 1,
            ]);

            return redirect()->route('claseView');

        } catch (\Exception $e) {
            dd($e->getMessage());
        }*/

        $validator = Validator::make($request->all(), [
            'nombre_clase' => [
                'required',
                'string',
                'min:3',
                'max:50',
                'unique:cursos,nombre_clase',
                'regex:/^[\pL\s]+$/u'
            ],
            'id_profesor' => 'required',
            'periodo' => 'required|min:1|max:2'
        ]);

        $validator->after(function ($validator) use ($request) {
            $periodoCount = Clase::where('periodo', $request->periodo)->count();
            if ($periodoCount >= 5) {
                $validator->errors()->add('periodo', '5 records with this period already exist.');
            }
        });

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            Clase::create([
                'nombre_clase' => $request->nombre_clase,
                'id_profesor' => $request->id_profesor,
                'periodo' => $request->periodo,
                'estado_id' => 1,
            ]);

            return redirect()->route('claseView')->with('success', 'Clase creada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al crear la clase.')->withInput();
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $clase = Clase::findOrFail($id);
        $profesores = Profesore::all();
        return view('clase.edit', compact('clase', 'profesores'));
    }

    public function update(Request $request, $id)
    {
        /*$request->validate([
            'nombre_clase' => [
            'required', 
            'string', 
            'min:3', 
            'max:50', 
            'unique:cursos,nombre_clase,' . $id . ',id_curso', 
            'regex:/^[\pL\s]+$/u'
            ],
            'id_profesor' => 'required',
            'periodo' => 'required|min:1|max:2',
            'estado_id' => 'required|min:1|max:1'
        ]);
    
        try {
            $clase = Clase::findOrFail($id);
            $clase->update($request->all());
    
            return redirect()->route('claseView');
        } catch (\Exception $e) {
            dd($e->getMessage()); 
        }*/

        $validator = Validator::make($request->all(), [
            'nombre_clase' => [
                'required',
                'string',
                'min:3',
                'max:50',
                'unique:cursos,nombre_clase,' . $id . ',id_curso',
                'regex:/^[\pL\s]+$/u'
            ],
            'id_profesor' => 'required',
            'periodo' => 'required|min:1|max:2',
            'estado_id' => 'required|min:1|max:1'
        ], [
            'nombre_clase.regex' => 'El campo nombre de la clase solo puede contener letras y espacios.',
        ]);

        $validator->after(function ($validator) use ($request, $id) {
            $periodoCount = Clase::where('periodo', $request->periodo)
                ->where('id_curso', '!=', $id)
                ->count();
            if ($periodoCount >= 5) {
                $validator->errors()->add('periodo', '5 records with this period already exist.');
            }
        });

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $clase = Clase::findOrFail($id);
            $clase->update($request->all());

            return redirect()->route('claseView')->with('success', 'Clase actualizada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al actualizar la clase.')->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $clase = Clase::findOrFail($id);

            if ($clase->estado_id == 1) {
                $clase->update(['estado_id' => 2]);
                return redirect()->route('claseView');
            } else {
                return redirect()->route('claseView');
            }
        } catch (\Exception $e) {
            return redirect()->route('claseView');
        }
    }
}
