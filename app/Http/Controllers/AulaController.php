<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;
use App\Models\Estado;


class AulaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aulas = Aula::all();
        return view('aula.aulaView', compact('aulas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aula.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'aula' => 'required|min:3|max:4',
        ]);
    
        try {

            Aula::create([
                'aula' => $request->aula,
                'estado_id' => 1,
            ]);
            
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    
        return redirect()->route('aulaView');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $aula = Aula::findOrFail($id);
        return view('aula.edit', compact('aula'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'aula' => 'required|min:3|max:4',
            'estado_id' => 'required|min:1|max:1'
        ]);
    
        try {
            $aula = Aula::findOrFail($id);
            $aula->update($request->all());
    
            return redirect()->route('aulaView');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $aula = Aula::findOrFail($id);
    
            if ($aula->estado_id == 1) { 
                $aula->update(['estado_id' => 2]);
                return redirect()->route('aulaView');
            } else {
                return redirect()->route('aulaView');
            }
            
        } catch (\Exception $e) {
            return redirect()->route('aulaView');
        }
    }
}
