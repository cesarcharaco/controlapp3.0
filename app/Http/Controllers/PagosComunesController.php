<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PagosComunes;
class PagosComunesController extends Controller
{
    public function store(Request $request)
    {
    	$m=date('m');
        $a=date('Y');
        $meses=Meses::all();
        
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
                            $pagocomun->anio=$request->anio;
                            $pagocomun->mes=$key->id;
                            $pagocomun->monto=$request->monto[$i];
                            $pagocomun->save();
                            $i++;
                        }else{

                            $pagocomun=new PagosComunes();
                            $pagocomun->tipo=$request->tipo;
                            $pagocomun->anio=$request->anio;
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
            flash('Pago Común registrado para el año: <b>'.$request->anio.'</b> para : <b>'.$request->tipo.'</b>, de manera exitosa!')->success()->important();
            return redirect()->to('home');
    }

    public function update(Request $request)
    {
    	if ($this->nulidad($request->monto)==true && $request->accion==1) {
                    flash('Debe agregar todos los montos en los meses indicados, intente otra vez!')->warning()->important();
                    return redirect()->back();    
                } else {

                $meses=Meses::all();
                

            for($i=0;$i<count($request->mes);$i++){
                    $pagocomun= PagosComunes::where('tipo',$request->tipo)->where('anio',$request->anio)->where('mes',$request->mes[$i])->first();
                    //dd($pagocomun);
                    if ($pagocomun!=null) {
                        
                        $pagocomun->delete();
                    }
                }
            //----------------------
        if ($request->accion==1) {
                # mensual
                
                for($i=0;$i<count($request->mes);$i++) {
                    
                        $pagocomun=new PagosComunes();
                        $pagocomun->tipo=$request->tipo;
                        $pagocomun->anio=$request->anio;
                        $pagocomun->mes=$request->mes[$i];
                        $pagocomun->monto=$request->monto[$i];
                        $pagocomun->save();
                        
                    
                }
            } else {
                # anual
                for($i=0;$i<count($request->mes);$i++){
                   
                        $pagocomun=new PagosComunes();
                        $pagocomun->tipo=$request->tipo;
                        $pagocomun->anio=$request->anio;
                        $pagocomun->mes=$request->mes[$i];
                        $pagocomun->monto=$request->montoaAnio;
                        $pagocomun->save();
                    
                }
                
            }

            flash('Pago Común actualizado para el año: <b>'.$request->anio.'</b> para el <b>'.$request->tipo.'</b>, de manera exitosa!')->success()->important();
            return redirect()->to('home');
        }
    }
}
