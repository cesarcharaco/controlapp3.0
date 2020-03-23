<?php

namespace App\Http\Controllers;

use App\Estacionamientos;
use Illuminate\Http\Request;
use App\MensualidadE;
use App\Meses;
use App\Inmuebles;

class EstacionamientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estacionamientos=Estacionamientos::all();
        $anio=date('Y');
        $meses=Meses::all();
        $inmuebles=Inmuebles::all();

        return view('estacionamientos.index',compact('estacionamientos','anio','meses','inmuebles'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anio=date('Y');
        $meses=Meses::all();

        return view('estacionamientos.meses',compact('anio','meses'));
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
        $buscar=Estacionamientos::where('idem',$request->idem)->get();
        if (count($buscar)>0) {
            flash('El idem ya se encuentra registrado, intente otra vez!')->warning()->important();
            return redirect()->back();
        } else {
            $estacionamiento=new Estacionamientos();
            $estacionamiento->idem=$request->idem;
            $estacionamiento->status=$request->status;
            $estacionamiento->save();

            if ($request->opcion==1) {
                # mensual
                for($i=0;$i<12;$i++) {
                    $mensualidad=new MensualidadE();
                    $mensualidad->id_estacionamiento=$estacionamiento->id;
                    $mensualidad->anio=$request->anio;
                    $mensualidad->mes=$request->mes[$i];
                    $mensualidad->monto=$request->monto[$i];
                    $mensualidad->save();
                }
            } else {
                # anual
                $meses=Meses::all();
                foreach ($variable as $key) {
                    # code...
                    $mensualidad=new MensualidadE();
                    $mensualidad->id_estacionamiento=$estacionamiento->id;
                    $mensualidad->anio=$request->anio;
                    $mensualidad->mes=$key->mes;
                    $mensualidad->monto=$request->monto;
                    $mensualidad->save();
                }
                
            }
        

            flash('Estacionamiento registrado con éxito!')->success()->important();
            return redirect()->to('estacionamientos');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estacionamientos  $estacionamientos
     * @return \Illuminate\Http\Response
     */
    public function show(Estacionamientos $estacionamientos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estacionamientos  $estacionamientos
     * @return \Illuminate\Http\Response
     */
    public function edit($id_estacionamiento)
    {
        $estacionamiento=Estacionamientos::find($id_estacionamiento);

        return view('estacionamientos.edit',compact('estacionamiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estacionamientos  $estacionamientos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_estacionamiento)
    {
        $buscar=Estacionamientos::where('idem',$request->idem)->where('id','<>',$id_estacionamiento)->get();
        if (count($buscar)>0) {
            flash('El idem ya se encuentra registrado, intente otra vez!')->warning()->important();
            return redirect()->back();
        } else {

            $estacionamiento= Estacionamientos::find($id_estacionamiento);
            $estacionamiento->idem=$request->idem;
            $estacionamiento->status=$request->status;
            $estacionamiento->save();
            //eliminando registros de mensualidad
            for($i=0;$i<12;$i++) {
                $mensualidad= MensualidadE::where('id_estacionamiento',$id_estacionamiento)->where('mes',$mes[$i])->first();
                $mensualidad->delete();
            }
            //registrando mensualidad
            for($i=0;$i<12;$i++) {
                $mensualidad=new MensualidadE();
                $mensualidad->id_estacionamiento=$estacionamiento->id;
                $mensualidad->anio=$request->anio;
                $mensualidad->mes=$mes[$i];
                $mensualidad->monto=$request->monto[$i];
                $mensualidad->save();
            }
            flash('Estacionamiento actualizado con éxito!')->success()->important();
            return redirect()->to('estacionamientos');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estacionamientos  $estacionamientos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $meses=Meses::all();
        foreach($meses as $key){
                $mensualidad= MensualidadE::where('id_estacionamiento',$request->id_estacionamiento)->where('mes',$key->mes)->first();
                $mensualidad->delete();
            }
        $estacionamiento=Estacionamientos::find($request->id_estacionamiento);
        $estacionamiento->delete();

        flash('Estacionamiento eliminado con éxito!')->success()->important();
            return redirect()->to('estacionamientos');
    }
}
