<?php

namespace App\Http\Controllers;

use App\Inmuebles;
use App\Estacionamientos;
use Illuminate\Http\Request;
use App\Mensualidades;
use App\MensualidadE;
use App\Pagos;
use App\PagosE;
class ArriendosController extends Controller
{

    public function asignando(Request $request)
    {
        //dd($request->all());
        $anio=date('Y');
        $mes=date('m');
        //dd($mes);
        if($request->opcion=="inmueble"){
            for ($i=0; $i < count($request->id_inmueble); $i++) { 
                \DB::table('residentes_has_inmuebles')->insert([
                    'id_residente' => $request->id_residente,
                    'id_inmueble' => $request->id_inmueble[$i]
                ]);
                $inmueble=Inmuebles::find($request->id_inmueble[$i]);
                $inmueble->status="No Disponible";
                $inmueble->save();

                //asignando estatus de pago del inmueble
                $mensualidades=Mensualidades::where('id_inmueble',$request->id_inmueble[$i])->where('anio',$anio)->get();
                foreach ($mensualidades as $key) {
                    //echo "".$key->mes."-".$mes."<br>";
                    if ($key->mes>=intval($mes)) {
                        $pago=new Pagos();
                        $pago->id_mensualidad=$key->id;
                        $pago->status="Pendiente";
                        $pago->save();
                       
                    } else {
                        $pago=new Pagos();
                        $pago->id_mensualidad=$key->id;
                        $pago->status="No Aplica";
                        $pago->save();
                        
                    }
                    
                }

            }
            //dd("---------");
        }elseif($request->opcion=="estacionamiento"){
            for ($i=0; $i < count($request->id_estacionamiento); $i++) { 
                \DB::table('residentes_has_est')->insert([
                    'id_residente' => $request->id_residente,
                    'id_estacionamiento' => $request->id_estacionamiento[$i]
                ]);
                //dd(".....");
                $estacionamiento=Estacionamientos::find($request->id_estacionamiento[$i]);
                $estacionamiento->status="Ocupado";
                $estacionamiento->save();

                //asignando estatus de pago del inmueble
                $mensualidades=MensualidadE::where('id_estacionamiento',$request->id_estacionamiento[$i])->where('anio',$anio)->get();
                foreach ($mensualidades as $key) {
                    if ($key->mes>=intval($mes)) {
                        $pago=new PagosE();
                        $pago->id_mens_estac=$key->id;
                        $pago->status="Pendiente";
                        $pago->save();
                    } else {
                        $pago=new PagosE();
                        $pago->id_mens_estac=$key->id;
                        $pago->status="No Aplica";
                        $pago->save();
                    }
                    
                }
            }
        }
        flash($request->opcion.'asignado con éxito!')->success()->important();
        return redirect()->to('arriendos');

    }

    public function retirando(Request $request)
    {
        //dd($request->all());
        if ($request->id_inmueble>0) {
            $inmueble=Inmuebles::find($request->id_inmueble);

            $inmueble->status="Disponible";
            $inmueble->save();

            foreach ($inmueble->residentes as $key) {
                if ($key->pivot->id_residente==$request->id_residente && $key->pivot->status=="En Uso") {
                    $key->pivot->status="Retirado";
                    $key->pivot->save();
                }
                
            }
            flash('Retiro de inmueble realizado con éxito!')->success()->important();
        } elseif($request->id_estacionamiento>0) {
            $estacionamiento=Estacionamientos::find($request->id_estacionamiento);

            $estacionamiento->status="Libre";
            $estacionamiento->save();

            foreach ($estacionamiento->residentes as $key) {
                if ($key->pivot->id_residente==$request->id_residente && $key->pivot->status=="En Uso") {
                    $key->pivot->status="Retirado";
                    $key->pivot->save();
                }
                
            }
            flash('Retiro de estacionamiento realizado con éxito!')->success()->important();
        }

        
        return redirect()->to('arriendos');
    }

    
}
