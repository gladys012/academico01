<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notas_Materia;
use App\Persona;
use Illuminate\Support\Facades\DB;

class Notas_MateriaController extends Controller
{
    public function index(Request $request)
    {
        //if (!$request->ajax()) return redirect('/');         
            $Notas_Materia = Notas_Materia:://where('estado','=','1')
            join('identificador','notas_materia.ididentificador','=','identificador.id')
            ->select('notas_materia.id','notas_materia.ididentificador','notas_materia.materia','identificador.paterno','identificador.materno','identificador.nombre','identificador.ci','identificador.departamento','notas_materia.nota','notas_materia.usr_id','notas_materia.estado')
            ->orderBy('notas_materia.id', 'desc')->paginate(10);

        return [
            'Notas_Materia' => $Notas_Materia
        ];
    }
   /* public function buscaPersona(Request $request){
        if(!$request->ajax()) return redirect('/');
        $filtro = $request->filtro;
        $personas = Persona::where('ci','=', $filtro)
        ->select('id','ci','paterno')->orderBy('ci','asc')->take(1)->get();
       
        return['personas'=>$personas];
    } */
  
}