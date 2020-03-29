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
        $mensualidadE=MensualidadE::where('anio','>=',$anio)->groupBy('id_estacionamiento')->get();
        $inmuebles=Inmuebles::all();

        return view('estacionamientos.index',compact('estacionamientos','anio','meses','inmuebles','mensualidadE'));

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
        // dd($request->all());
        $buscar=Estacionamientos::where('idem',$request->idem)->get();
        $meses=Meses::all();
        if (count($buscar)>0) {
            flash('El idem ya se encuentra registrado, intente otra vez!')->warning()->important();
            return redirect()->back();
        } else {
            $estacionamiento=new Estacionamientos();
            $estacionamiento->idem=$request->idem;
            $estacionamiento->status=$request->status;
            $estacionamiento->save();
            $m=date('m');

            if ($request->opcion==1) {
                # mensual
                $i=0;
                foreach ($meses as $key) {
                    if($key->id>=$m){
                    $mensualidad=new MensualidadE();
                    $mensualidad->id_estacionamiento=$estacionamiento->id;
                    $mensualidad->anio=$request->anio;
                    $mensualidad->mes=$key->id;
                    $mensualidad->monto=$request->monto[$i];
                    $mensualidad->save();
                    $i++;
                    }
                }
            } else {
                # anual
                foreach ($meses as $key) {
                    if($key->id>=$m){
                        $mensualidad=new MensualidadE();
                        $mensualidad->id_estacionamiento=$estacionamiento->id;
                        $mensualidad->anio=$request->anio;
                        $mensualidad->mes=$key->id;
                        $mensualidad->monto=$request->montoAnio;
                        $mensualidad->save();
                    }
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

    public function buscar_mensualidad($id, $anio)
    {
        return MensualidadE::where('id_estacionamiento', $id)->where('anio',$anio)->get();
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
        //dd($request->all());
        $buscar=Estacionamientos::where('idem',$request->idem)->where('id','<>',$request->id)->get();
        //$meses=Meses::all();
        if (count($buscar)>0) {
            flash('El idem ya se encuentra registrado, intente otra vez!')->warning()->important();
            return redirect()->back();
        } else {
            $estacionamiento= Estacionamientos::find($request->id);
            $estacionamiento->idem=$request->idem;
            $estacionamiento->status=$request->status;
            $estacionamiento->save();
            $m=date('m');
            //---------------------
            //eliminando mensualidades

            /*foreach ($meses as $key) {
                    if($key->id>=$m){
                    $mensualidad= MensualidadE::where('id_estacionamiento',$request->id)->where('anio',$request->anio)->where('mes',$key->id)->first();
                    //dd($mensualidad);
                    if ($mensualidad!=null) {
                        
                    $mensualidad->delete();
                    }
                    
                    }
                }
            //----------------------

            if ($request->opcion==1) {
                # mensual
                $i=0;
                foreach ($meses as $key) {
                    if($key->id>=$m){
                    $mensualidad=new MensualidadE();
                    $mensualidad->id_estacionamiento=$estacionamiento->id;
                    $mensualidad->anio=$request->anio;
                    $mensualidad->mes=$key->id;
                    $mensualidad->monto=$request->monto[$i];
                    $mensualidad->save();
                    $i++;
                    }
                }
            } else {
                # anual
                foreach ($meses as $key) {
                    if($key->id>=$m){
                    $mensualidad=new MensualidadE();
                    $mensualidad->id_estacionamiento=$estacionamiento->id;
                    $mensualidad->anio=$request->anio;
                    $mensualidad->mes=$key->id;
                    $mensualidad->monto=$request->monto;
                    $mensualidad->save();
                    }
                }
                
            }*/
        

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
        $estacionamiento=Estacionamientos::find($request->id_estacionamiento);

        foreach($meses as $key){
                $mensualidad= MensualidadE::where('id_estacionamiento',$request->id_estacionamiento)->where('anio',$estacionamiento->anio)->where('mes',$key->mes)->first();
                $mensualidad->delete();
            }
        $estacionamiento->delete();

        flash('Estacionamiento eliminado con éxito!')->success()->important();
            return redirect()->to('estacionamientos');
    }

    public function registrar_mensualidad(Request $request)
    {
        dd('Registrar mensualidad',$request->all());
    }
    public function editar_mensualidad(Request $request)
    {
        dd('Editar mensualidad',$request->all());
    }
    public function eliminar_mensualidad(Request $request)
    {
        dd('Eliminar mensualidad',$request->all());
    }

}
