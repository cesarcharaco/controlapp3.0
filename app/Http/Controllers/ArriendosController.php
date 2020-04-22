<?php

namespace App\Http\Controllers;

use App\Inmuebles;
use App\Estacionamientos;
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
                $inmueble=Inmuebles::find($request->id_inmueble[$i]);
                $inmueble->status="No Disponible";
                $inmueble->save();
            }

        }elseif($request->opcion=="estacionamiento"){
            for ($i=0; $i < count($request->id_estacionamiento); $i++) { 
                \DB::table('residentes_has_est')->insert([
                    'id_residente' => $request->id_residente,
                    'id_estacionamiento' => $request->id_estacionamiento[$i]
                ]);
                //dd(".....");
                $estacionamiento=Estacionamientos::find($request->id_estacionamiento[$i]);
                $estacionamiento->status="No Disponible";
                $estacionamiento->save();
            }
        }
        flash($request->opcion.'asignado con éxito!')->success()->important();
        return redirect()->to('arriendos');

    }

}
