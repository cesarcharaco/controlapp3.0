<?php

namespace App\Http\Controllers;

use App\Pagos;
use App\Residentes;
use App\Inmuebles;
use App\Meses;
use App\Estacionamientos;
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
        $residentes=Residentes::all();
        $meses=Meses::all();
        $pagos=Pagos::all();
        $inmuebles=Inmuebles::all();
        $estacionamientos=Estacionamientos::all();

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

        
        $factura="";


        if (is_null($request->id_mensInmueble)==true and is_null($request->id_mensEstaciona)==true and is_null($request->id_mensMulta)==true) {
            flash('No ha seleccionado nada a pagar!')->warning()->important();
        return redirect()->back();
        } else {
            for ($i=0; $i < count($request->id_mensInmueble); $i++) { 
                $pagos=Pagos::where('id_mensualidad',$request->id_mensInmueble[$i])->first();
                $pagos->status="Cancelado";
                $pagos->save();
                
                $factura.="Inmueble: ".$pagos->mensualidad->inmuebles->idem." Mes: ".$this->mostrar_mes($pagos->mensualidad->mes)."<br>";
            }

            for ($i=0; $i < count($request->id_mensEstaciona); $i++) { 
                $pagosE=PagosE::where('id_mensualidad',$request->id_mensEstaciona[$i])->first();
                $pagosE->status="Cancelado";
                $pagosE->save();
                
                $factura.="Inmueble: ".$pagosE->mensualidad->inmuebles->idem." Mes: ".$this->mostrar_mes($pagosE->mensualidad->mes)."<br>";
            }
            $factura.="<br></br>Total Cancelado: ".$request->total.", con la referencia: ".$request->referencia."<br>";
            $reporte=\DB::table('reportes_pagos')->insert([
                'referencia' => $request->referencia,
                'reporte' => $factura,
                'id_residente' => $request->id_residente
            ]);
            flash('Pago realizado con éxito!')->success()->important();
            return redirect()->back();
        }
        
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
    public function update(Request $request, Pagos $pagos)
    {
        //
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

}
