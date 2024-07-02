<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use Illuminate\Http\Request;
use App\Models\Profesore;
use Illuminate\Support\Facades\Validator;
use App\Models\Estado;
use PDF;

use Illuminate\Support\Facades\DB;

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
        $request->validate([
            'nombre_clase' => 'required|string|min:3|max:50',
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
        $request->validate([
            'nombre_clase' => 'required|string|min:3|max:50',
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
