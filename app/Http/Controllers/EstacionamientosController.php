<?php

namespace App\Http\Controllers;

use App\Estacionamientos;
use Illuminate\Http\Request;
use App\MensualidadE;
use App\Meses;
use App\Inmuebles;
use App\PagosComunes;
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
        $meses=Meses::all();

        return view('estacionamientos.index',compact('estacionamientos','meses'));

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
            $anio=date('Y');
            $mensualidad=PagosComunes::where('anio',$anio)->where('tipo','Estacionamiento')->get();
            if (count($mensualidad)==0) {
                flash('No se encuentran Pagos Comunes registrados para estacionamiento este año, intente otra vez!')->warning()->important();
                return redirect()->back();
            } else {
                $estacionamiento=new Estacionamientos();
                $estacionamiento->idem=$request->idem;
                $estacionamiento->status=$request->status;
                $estacionamiento->save();
                //$m=date('m');
                foreach ($mensualidad as $key) {
                    $reg=\DB::table('mens_estac')->insert([
                        'id_estacionamiento' => $estacionamiento->id,
                        'mes' => $key->mes,
                        'anio' => $key->anio,
                        'monto' => $key->monto

                    ]);
                }
            }
            

            /*if ($request->opcion==1) {
                # mensual
                if ($this->nulidad($request->monto)) {
                    flash('Debe agregar todos los montos en los meses indicados, intente otra vez!')->warning()->important();
                    return redirect()->back();    
                } else {
                    
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
                }//nulidad
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
                
            }*/
        

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
        dd('asasas');
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

    public function buscar_anios($id)
    {
        return MensualidadE::where('id_estacionamiento', $id)->groupBy('id_estacionamiento')->get();
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
        //dd($request->all());
        $meses=Meses::all();
        $estacionamiento=Estacionamientos::find($request->id);

        foreach($meses as $key){
                $mensualidad= MensualidadE::where('id_estacionamiento',$request->id)->where('mes',$key->mes)->first();
                if ($mensualidad!=null) {
                    $mensualidad->delete();
                }
            }
        $estacionamiento->delete();

        flash('Estacionamiento eliminado con éxito!')->success()->important();
            return redirect()->to('estacionamientos');
    }

    public function registrar_mensualidad(Request $request)
    {
        //dd('Registrar mensualidad',$request->all());
        $m=date('m');
        $a=date('Y');
        $meses=Meses::all();
        $estacionamiento=Estacionamientos::find($request->id_estacionamiento);
        if ($request->accion==1) {
                # mensual
            if ($this->nulidad($request->monto)) {
                    flash('Debe agregar todos los montos en los meses indicados, intente otra vez!')->warning()->important();
                    return redirect()->back();    
                } else {
                    $i=0;
                    foreach ($meses as $key) {
                        if($key->id>=$m && $a==$request->anio){
                            $mensualidad=new MensualidadE();
                            $mensualidad->id_estacionamiento=$request->id_estacionamiento;
                            $mensualidad->anio=$request->anio;
                            $mensualidad->mes=$key->id;
                            $mensualidad->monto=$request->monto[$i];
                            $mensualidad->save();
                            $i++;
                        }else{

                            $mensualidad=new MensualidadE();
                            $mensualidad->id_estacionamiento=$request->id_estacionamiento;
                            $mensualidad->anio=$request->anio;
                            $mensualidad->mes=$key->id;
                            $mensualidad->monto=$request->monto[$i];
                            $mensualidad->save();
                            $i++;
                        }
                    }
                }//nulidad
            } else {
                # anual
                foreach ($meses as $key) {
                    if($key->id>=$m && $a==$request->anio){
                        $mensualidad=new MensualidadE();
                        $mensualidad->id_estacionamiento=$request->id_estacionamiento;
                        $mensualidad->anio=$request->anio;
                        $mensualidad->mes=$key->id;
                        $mensualidad->monto=$request->montoaAnio;
                        $mensualidad->save();
                    }else{
                        $mensualidad=new MensualidadE();
                        $mensualidad->id_estacionamiento=$request->id_estacionamiento;
                        $mensualidad->anio=$request->anio;
                        $mensualidad->mes=$key->id;
                        $mensualidad->monto=$request->montoaAnio;
                        $mensualidad->save();
                    }
                }
                
            }
            flash('Mensualidad registrada para el año: <b>'.$request->anio.'</b> en el estacionamiento: <b>'.$estacionamiento->idem.'</b>, de manera exitosa!')->success()->important();
            return redirect()->to('estacionamientos');
    }
    public function editar_mensualidad(Request $request)
    {
        //dd('Editar mensualidad',$request->all());

        if ($this->nulidad($request->monto)==true && $request->accion==1) {
                    flash('Debe agregar todos los montos en los meses indicados, intente otra vez!')->warning()->important();
                    return redirect()->back();    
                } else {

                $meses=Meses::all();
                $estacionamiento=Estacionamientos::find($request->id_estacionamiento);
                //eliminando mensualidades

            for($i=0;$i<count($request->mes);$i++){
                    $mensualidad= MensualidadE::where('id_estacionamiento',$request->id_estacionamiento)->where('anio',$request->anio)->where('mes',$request->mes[$i])->first();
                    //dd($mensualidad);
                    if ($mensualidad!=null) {
                        
                        $mensualidad->delete();
                    }
                }
            //----------------------
        if ($request->accion==1) {
                # mensual
                
                for($i=0;$i<count($request->mes);$i++) {
                    
                        $mensualidad=new MensualidadE();
                        $mensualidad->id_estacionamiento=$request->id_estacionamiento;
                        $mensualidad->anio=$request->anio;
                        $mensualidad->mes=$request->mes[$i];
                        $mensualidad->monto=$request->monto[$i];
                        $mensualidad->save();
                        
                    
                }
            } else {
                # anual
                for($i=0;$i<count($request->mes);$i++){
                   
                        $mensualidad=new MensualidadE();
                        $mensualidad->id_estacionamiento=$request->id_estacionamiento;
                        $mensualidad->anio=$request->anio;
                        $mensualidad->mes=$request->mes[$i];
                        $mensualidad->monto=$request->montoaAnio;
                        $mensualidad->save();
                    
                }
                
            }

            flash('Mensualidad actualizada para el año: <b>'.$request->anio.'</b> en el estacionamiento: <b>'.$estacionamiento->idem.'</b>, de manera exitosa!')->success()->important();
            return redirect()->to('estacionamientos');
        }
    }
    public function eliminar_mensualidad(Request $request)
    {
        //dd('Eliminar mensualidad',$request->all());
        //eliminando mensualidades
        $estacionamiento=Estacionamientos::find($request->id_estacionamiento);
        $meses=Meses::all();

            foreach ($meses as $key) {
                    
                    $mensualidad= MensualidadE::where('id_estacionamiento',$request->id_estacionamiento)->where('anio',$request->anio)->where('mes',$key->id)->first();
                    //dd($mensualidad);
                    if ($mensualidad!=null) {
                        
                        $mensualidad->delete();
                    }
                    
                    
                }
            //----------------------
                flash('Mensualidad eliminada para el año: <b>'.$request->anio.'</b> en el estacionamiento: <b>'.$estacionamiento->idem.'</b>, de manera exitosa!')->success()->important();
                return redirect()->to('estacionamientos');
    }

    protected function nulidad($request)
    {
        $cont=0;
        for ($i=0; $i <count($request) ; $i++) { 
            if ($request[$i]==NULL) {
                $cont++;
            }
        }
        if ($cont>0) {
            return true;
        } else {
            return false;
        }
        
    }
}
