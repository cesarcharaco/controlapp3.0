<?php

namespace App\Http\Controllers;

use App\Pagos;
use App\Residentes;
use App\Inmuebles;
use App\Meses;
use App\Estacionamientos;
use App\MultasRecargas;
use App\PagosE;
use App\MensualidadE;
use App\Mensualidades;
use App\Reportes;
use Illuminate\Http\Request;

class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_admin=id_admin(\Auth::user()->email);
        $residentes=Residentes::where('id_admin',$id_admin)->get();
        $meses=Meses::all();
        $pagos=Pagos::all();
        $inmuebles=Inmuebles::where('id_admin',$id_admin)->get();
        $estacionamientos=Estacionamientos::where('id_admin',$id_admin)->get();

        $asignaIn= \DB::table('residentes_has_inmuebles')->groupBy('id_residente')->get();
        $asignaEs= \DB::table('residentes_has_est')->groupBy('id_residente')->get();

        return View('pagos.index', compact('residentes','pagos','inmuebles','estacionamientos','meses','asignaEs','asignaIn'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        //dd(count($request->mes));
        $factura="";
        $total=0;

        if (is_null($request->mes)==true) {
            flash('No ha seleccionado nada a pagar!')->warning()->important();
        return redirect()->back();
        } else {
            if (is_null($request->mes)==false) {
                for ($i=0; $i < count($request->mes); $i++) {
                    if($request->mes[$i]!==null){
                        $residente=Residentes::find($request->id_user);
                        foreach ($residente->inmuebles as $key) {
                            if ($key->pivot->status=="En Uso") {
                                foreach ($key->mensualidades as $key2) {
                                    if ($key2->mes==$request->mes[$i]) {
                                        //echo $key2->id."<br>";
                                        $pagos=Pagos::where('id_mensualidad',$key2->id)->first();
                                        $pagos->status="Cancelado";
                                        $pagos->save();
                                        $total+=$key2->monto;
                                        $factura.="Inmueble: ".$key->idem." Mes: ".$this->mostrar_mes($request->mes[$i])." Monto: ".$key2->monto."<br>";
                                    }
                                }
                            }
                        }
                    }
                }
            }
            
            if(is_null($request->mes)==false){
                for ($i=0; $i < count($request->mes); $i++) { 
                    if($request->mes[$i]!==null){
                        $residente=Residentes::find($request->id_user);
                        foreach ($residente->estacionamientos as $key) {
                            if ($key->pivot->status=="En Uso") {
                                foreach ($key->mensualidad as $key2) {
                                    if ($key2->mes==$request->mes[$i]) {
                                        //echo $key2->id."<br>";
                                        $pagos=PagosE::where('id_mens_estac',$key2->id)->first();
                                        $pagos->status="Cancelado";
                                        $pagos->save();
                                        $total+=$key2->monto;
                                        $factura.="Estacionamiento: ".$key->idem." Mes: ".$this->mostrar_mes($request->mes[$i])." Monto: ".$key2->monto."<br>";
                                    }
                                }
                            }
                        }
                    }
                }
            }

            
            $factura.="<br></br>Total Cancelado: ".$total.", con la referencia: ".$request->referencia."<br>";
            $reporte=\DB::table('reportes_pagos')->insert([
                'referencia' => $request->referencia,
                'reporte' => $factura,
                'id_residente' => $request->id_user
            ]);
            //dd("---------");
            flash('Pago realizado con éxito!')->success()->important();
            return redirect()->back();
        }
        
    }
    public function pagarmultas(Request $request)
    {
        if(is_null($request->id_mensMulta)==false){
                for ($i=0; $i < count($request->id_mensMulta) ; $i++) { 
                    $mr=MultasRecargas::find($request->id_mensMulta[$i]);
                    //dd($mr->residentes);
                    foreach ($mr->residentes as $key) {
                        if($key->pivot->id_residente==$request->id_residente){
                            //dd("asas");
                            $key->pivot->status="Pagada";
                            $key->pivot->save();
                            $factura.="Multa o Recarga: ".$mr->motivo.", Monto: ".$mr->monto." status:Pagada<br>";
                        }
                    }
                }
            }
            $factura.="<br></br>Total Cancelado: ".$request->total.", con la referencia: ".$request->referencia."<br>";
            $reporte=\DB::table('reportes_pagos')->insert([
                'referencia' => $request->referencia,
                'reporte' => $factura,
                'id_residente' => $request->id_residente
            ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function show(Pagos $pagos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function edit(Pagos $pagos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pago)
    {
    //dd($request->all());

        switch ($request->opcion) {
            case 1:
                $pago=Pagos::where('id_mensualidad',$request->id_inmueble)->first();
                //dd($this->mostrar_mes($pago->mensualidad->mes));
                $mes=$this->mostrar_mes($pago->mensualidad->mes);
                $inmueble=$pago->mensualidad->inmuebles->idem;
                $sql="SELECT * FROM `reportes_pagos` where referencia='".$request->referencia_edit."' AND tipo='Cancelado' AND reporte LIKE '%".$mes."%' ORDER BY id DESC LIMIT 0,1";
                $sql2="SELECT * FROM `reportes_pagos` where referencia='".$request->referencia_edit."' AND tipo='Cancelado' AND reporte LIKE '%".$inmueble."%' ORDER BY id DESC LIMIT 0,1";
                //dd($sql2);
                $buscar1=\DB::select($sql);
                $buscar2=\DB::select($sql2);
                
               if (count($buscar1)>0 AND count($buscar2)>0) {
                    $reporte_new=new Reportes();
                    $reporte_new->referencia=$request->referencia_edit;
                    $reporte_new->reporte="Se ha colocado como Pendiente al mes de ".$mes." del Inmueble: ".$inmueble;
                    $reporte_new->tipo="Pendiente";
                    $reporte_new->id_residente=$request->id_residente_edit;
                    $reporte_new->save();
                    
                    $pago->status="Pendiente";
                    $pago->save();     
                    flash('Se ha colocado como Pendiente al mes de '.$mes.' del Inmueble: '.$inmueble.', con éxito!')->success()->important();
                    return redirect()->back();
               } else {
                   flash('La información no pudo ser encontrada, verifique la referencia!')->warning()->important();
                    return redirect()->back();
               }
               
                break;
            case 2:

                if ($request->status=="Pendiente") {
                    
                    $pago=PagosE::where('id_mens_estac',$request->id_estacionamiento)->first();
                    //dd($this->mostrar_mes($pago->mensualidad->mes));
                    $mes=$this->mostrar_mes($pago->mensualidad->mes);
                    $estacionamiento=$pago->mensualidad->estacionamientos->idem;
                    $sql="SELECT * FROM `reportes_pagos` where referencia='".$request->referencia_edit."' AND tipo='Cancelado' AND reporte LIKE '%".$mes."%' ORDER BY id DESC LIMIT 0,1";
                    $sql2="SELECT * FROM `reportes_pagos` where referencia='".$request->referencia_edit."' AND tipo='Cancelado' AND reporte LIKE '%".$estacionamiento."%' ORDER BY id DESC LIMIT 0,1";
                    //dd($sql2);
                    $buscar1=\DB::select($sql);
                    $buscar2=\DB::select($sql2);
                    
                   if (count($buscar1)>0 AND count($buscar2)>0) {
                        $reporte_new=new Reportes();
                        $reporte_new->referencia=$request->referencia_edit;
                        $reporte_new->reporte="Se ha colocado como Pendiente al mes de ".$mes." del Estacionamiento: ".$estacionamiento;
                        $reporte_new->tipo="Pendiente";
                        $reporte_new->id_residente=$request->id_residente_edit;
                        $reporte_new->save();
                        
                        $pago->status="Pendiente";
                        $pago->save();     
                        flash('Se ha colocado como Pendiente al mes de '.$mes.' del Estacionamiento: '.$estacionamiento.', con éxito!')->success()->important();
                        return redirect()->back();
                   } else {
                       flash('La información no pudo ser encontrada, verifique la referencia!')->warning()->important();
                        return redirect()->back();
                   }
                } else {
                    # en caso de colocarlo como cancelado
                    $pagos=PagosE::where('id_mens_estac',$request->id_estacionamiento)->first();
                    //dd($pagos->mensualidad->estacionamientos->residentes[0]->pivot->id_residente);
                    $id_user=$pagos->mensualidad->estacionamientos->residentes[0]->pivot->id_residente;
                    $pagos->status="Cancelado";
                    $pagos->save();
                    
                    $factura="Estacionamiento: ".$pagos->mensualidad->estacionamientos->idem." Mes: ".$this->mostrar_mes($pagos->mensualidad->mes)." Monto: ".$pagos->mensualidad->monto."<br>";

                    $factura.="<br></br>Total Cancelado: ".$pagos->mensualidad->monto.", con la referencia: ".$request->referencia_edit."<br>";
                    $reporte=\DB::table('reportes_pagos')->insert([
                        'referencia' => $request->referencia_edit,
                        'reporte' => $factura,
                        'id_residente' => $id_user
                    ]);

                    flash('Se ha colocado como Cancelado al mes de '.$this->mostrar_mes($pagos->mensualidad->mes).' del Estacionamiento: '.$pagos->mensualidad->estacionamientos->idem.', con éxito!')->success()->important();
                        return redirect()->back();
                }
                
               
                break;
            case 3:
            //multas y Recargas
                $pago=MultasRecargas::find($request->id_multa);
                
                $sql="SELECT * FROM `reportes_pagos` where referencia='".$request->referencia_edit."' AND tipo='Cancelado' AND reporte LIKE '%".$pago->motivo."%' ORDER BY id DESC LIMIT 0,1";
                //dd($sql2);
                $buscar=\DB::select($sql);
                
               if (count($buscar)>0) {
                    $reporte_new=new Reportes();
                    $reporte_new->referencia=$request->referencia_edit;
                    $reporte_new->reporte="Se ha colocado como Pendiente la ".$pago->tipo.": ".$pago->motivo;
                    $reporte_new->tipo="Pendiente";
                    $reporte_new->id_residente=$request->id_residente_edit;
                    $reporte_new->save();
                    
                    foreach ($pago->residentes as $key) {
                        if ($key->pivot->id_residente==$request->id_residente_edit) {
                            $key->pivot->status="Recibida";
                            $key->pivot->save();
                        }
                        
                    }
                         
                    flash('Se ha colocado como Pendiente la '.$pago->tipo.': '.$pago->motivo.', con éxito!')->success()->important();
                    return redirect()->back();
               } else {
                   flash('La información no pudo ser encontrada, verifique la referencia!')->warning()->important();
                    return redirect()->back();
               }
               
                break;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pagos $pagos)
    {
        //
    }

    protected function mostrar_mes($num) {
        switch ($num) {
            case 1:
                return 'Enero';
                break;
            case 2:
                return 'Febrero';
                break;
            
            case 3:
                return 'Marzo';
                break;
            
            case 4:
                return 'Abril';
                break;
            
            case 5:
                return 'Mayo';
                break;
            
            case 6:
                return 'Junio';
                break;
            
            case 7:
                return 'Julio';
                break;
            
            case 8:
                return 'Agosto';
                break;
            
            case 9:
                return 'Septiembre';
                break;
            
            case 10:
                return 'Octubre';
                break;
            
            case 11:
                return 'Noviembre';
                break;
            
            case 12:
                return 'Diciembre';
                break;
            
            
        }
    }


    public function inmuebles_residente($id)
    {
        # code...
    }

}
