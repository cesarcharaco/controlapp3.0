<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PagosComunes;
use App\Meses;
use App\Inmuebles;
use App\Estacionamientos;

class PagosComunesController extends Controller
{
    public function store(Request $request)
    {
    	//dd($request->all());
    	$m=date('m');
        $a=date('Y');
        $meses=Meses::all();
        if(!is_null($request->anioI)){
        	$anio=$request->anioI;
        }
        if(!is_null($request->anioE)){
        	$anio=$request->anioE;
        }
        if ($request->accion==1) {
                # mensual
            if ($this->nulidad($request->monto)) {
                    flash('Debe agregar todos los montos en los meses indicados, intente otra vez!')->warning()->important();
                    return redirect()->back();    
                } else {
                    $i=0;
                    foreach ($meses as $key) {
                        if($key->id>=$m && $a==$request->anio){
                            $pagocomun=new PagosComunes();
                            $pagocomun->tipo=$request->tipo;
                            $pagocomun->anio=$anio;
                            $pagocomun->mes=$key->id;
                            $pagocomun->monto=$request->monto[$i];
                            $pagocomun->save();
                            $i++;
                        }else{

                            $pagocomun=new PagosComunes();
                            $pagocomun->tipo=$request->tipo;
                            $pagocomun->anio=$anio;
                            $pagocomun->mes=$key->id;
                            $pagocomun->monto=$request->monto[$i];
                            $pagocomun->save();
                            $i++;
                        }
                    }
                }//nulidad
            } else {
                # anual
                foreach ($meses as $key) {
                    if($key->id>=$m && $a==$request->anio){
                        $pagocomun=new PagosComunes();
                        $pagocomun->tipo=$request->tipo;
                        $pagocomun->anio=$request->anio;
                        $pagocomun->mes=$key->id;
                        $pagocomun->monto=$request->montoaAnio;
                        $pagocomun->save();
                    }else{
                        $pagocomun=new PagosComunes();
                        $pagocomun->tipo=$request->tipo;
                        $pagocomun->anio=$request->anio;
                        $pagocomun->mes=$key->id;
                        $pagocomun->monto=$request->montoaAnio;
                        $pagocomun->save();
                    }
                }
                
            }
            flash('Pago Común registrado para el año: <b>'.$anio.'</b> para : <b>'.$request->tipo.'</b>, de manera exitosa!')->success()->important();
            return redirect()->to('home');
    }

    public function update(Request $request)
    {
    	//dd($request->all());
    	if(!is_null($request->anioI)){
        	$anio=$request->anioI;
        }
        if(!is_null($request->anioE)){
        	$anio=$request->anioE;
        }
    	if ($this->nulidad($request->monto)==true && $request->accion==1) {
                    flash('Debe agregar todos los montos en los meses indicados, intente otra vez!')->warning()->important();
                    return redirect()->back();    
                } else {

                $meses=Meses::all();
                

            foreach($meses as $key){
                    $pagocomun= PagosComunes::where('tipo',$request->tipo)->where('anio',$request->anio)->where('mes',$key->mes)->first();
                    //dd($pagocomun);
                    if ($pagocomun!=null) {
                        
                        $pagocomun->delete();
                    }
                }
            //----------------------
        if ($request->accion==1) {
                # mensual
                $i=1;
                foreach($meses as $key){
                    
                        $pagocomun=new PagosComunes();
                        $pagocomun->tipo=$request->tipo;
                        $pagocomun->anio=$anio;
                        $pagocomun->mes=$key->id;
                        $pagocomun->monto=$request->monto[$i];
                        $pagocomun->save();

                        //cambiando montos de inmuebles
                        $inmuebles=Inmuebles::all();
                        foreach ($inmuebles as $key2) {
                        	foreach ($key2->mensualidades as $key3) {
                        		if($key3->mes==$key->id){
                        			$key3->monto=$pagocomun->monto;
                        			$key3->save();
                        		}
                        	}
                        }
                        //-----------------------------
                        //cambiando montos de estacionamientos
                        $estacionamiento=Estacionamientos::all();
                        foreach ($estacionamiento as $key2) {
                        	foreach ($key2->mensualidad as $key3) {
                        		if($key3->mes==$key->id){
                        			$key3->monto=$pagocomun->monto;
                        			$key3->save();
                        		}
                        	}
                        }
                        //-----------------------------
                        $i++;
                }
                        
                    	
                }
            } else {
                # anual
                for($i=0;$i<count($request->mes);$i++){
                   
                        $pagocomun=new PagosComunes();
                        $pagocomun->tipo=$request->tipo;
                        $pagocomun->anio=$anio;
                        $pagocomun->mes=$request->mes[$i];
                        $pagocomun->monto=$request->montoaAnio;
                        $pagocomun->save();
                    
                }
                
            }

            flash('Pago Común actualizado para el año: <b>'.$request->anio.'</b> para el <b>'.$request->tipo.'</b>, de manera exitosa!')->success()->important();
            return redirect()->to('home');
        }
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

    public function buscarPagoAnio($tipo, $anio)
    {
        if ($tipo==1) {
            return $pagoComun=PagosComunes::where('tipo','Inmueble')->where('anio',$anio)->get();
        }else{
            return $pagoComun=PagosComunes::where('tipo','Estacionamiento')->where('anio',$anio)->get();
        }
    }
}
