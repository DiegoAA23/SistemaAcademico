<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ClasesController extends Controller{
    function index(){
        $data = array(
            'list' => DB::table('horarios')->get(),
        );
        return view('matricula', $data);
    }
}