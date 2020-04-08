<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ArriendosController extends Controller
{

    public function asignando(Request $request)
    {
        //dd($request->all());
        if($request->opcion=="inmueble"){
            for ($i=0; $i < count($request->id_inmueble); $i++) { 
                \DB::table('residentes_has_inmuebles')->insert([
                    'id_residente' => $request->id_residente,
                    'id_inmueble' => $request->id_inmueble[$i]
                ]);
            }

        }elseif($request->opcion=="estacionamiento"){
            for ($i=0; $i < count($request->id_estacionamiento); $i++) { 
                \DB::table('residentes_has_est')->insert([
                    'id_residente' => $request->id_residente,
                    'id_inmueble' => $request->id_estacionamiento[$i]
                ]);
            }
        }
        flash($request->opcion.'asignado con éxito!')->success()->important();
        return redirect()->to('arriendos');

    }

}
