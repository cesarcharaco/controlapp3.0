<?php

namespace App\Http\Controllers;

use App\Inmuebles;
use Illuminate\Http\Request;
use App\Meses;
use App\Mensualidades;
use App\Estacionamientos;

class InmueblesController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index()
	{
		$inmuebles=Inmuebles::all();
		$meses=Meses::all();
		$estacionamientos=estacionamientos::where('status','Libre')->get();

		return view('inmuebles.index',compact('inmuebles','meses','estacionamientos'));
	}

	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create()
	{
	
	}

	/**
	* Store a newly created resource in storage.
	*
	* @param \Illuminate\Http\Request $request

	* @return \Illuminate\Http\Response
	*/
	public function store(Request $request)
	{
		//dd($request->all());
		$buscar=Inmuebles::where('idem',$request->idem)->get();
		$meses=Meses::all();
		if (count($buscar)>0) {
			flash('El Idem ya se encuentra registrado, intente otra vez')->warning()->important();
			return redirect()->back();
		} else {
			$inmueble=new Inmuebles();
			$inmueble->idem=$request->idem;
			$inmueble->tipo=$request->tipo;
			$inmueble->status='Disponible';
			$inmueble->estacionamiento=$request->estacionamiento;
			$inmueble->save();
			$m=date('m');
			if ($request->opcion==1) {
                # mensual
                if ($this->nulidad($request->monto)) {
                    flash('Debe agregar todos los montos en los meses indicados, intente otra vez!')->warning()->important();
                    return redirect()->back();    
                } else {
                    
                $i=0;
                foreach ($meses as $key) {
                    if($key->id>=$m){
                    $mensualidad=new Mensualidades();
                    $mensualidad->id_inmueble=$inmueble->id;
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
                        $mensualidad=new Mensualidades();
                        $mensualidad->id_inmueble=$inmueble->id;
                        $mensualidad->anio=$request->anio;
                        $mensualidad->mes=$key->id;
                        $mensualidad->monto=$request->montoAnio;
                        $mensualidad->save();
                    }
                }
                
            }
			flash('Inmueble registrado con éxito!')->important();
			return redirect()->to('inmuebles');
		}

	}

	/**
	* Display the specified resource.
	*
	* @param \App\Inmuebles $inmuebles
	* @return \Illuminate\Http\Response
	*/
	public function show(Inmuebles $inmuebles)
	{
	
	}

	/**
	* Show the form for editing the specified resource.
	*
	* @param \App\Inmuebles $inmuebles
	* @return \Illuminate\Http\Response

	*/
	public function edit($id_inmueble)
	{
	
	}

	public function buscar_mensualidad($id, $anio)
    {
        return Mensualidades::where('id_inmueble', $id)->where('anio',$anio)->get();
    }

    public function buscar_anios($id)
    {
        return Mensualidades::where('id_inmueble', $id)->groupBy('id_inmueble')->get();
    }

	/**
	* Update the specified resource in storage.
	*
	* @param \Illuminate\Http\Request $request
	* @param \App\Inmuebles $inmuebles
	* @return \Illuminate\Http\Response
	*/
	public function update(Request $request, $id_inmueble)
	{
		//dd($request->all());
		$buscar=Inmuebles::where('idem',$request->idem)->where('id','<>',$request->id)->get();
		if (count($buscar)>0) {
			flash('Ya hay un inmueble registrado con ese idem!')->warning()->important();
			return redirect()->back();
		} else {
			$inmueble=Inmuebles::find($request->id);
			$inmueble->idem=$request->idem;
			$inmueble->tipo=$request->tipo;
			$inmueble->status=$request->status;
			$inmueble->estacionamiento=$request->estacionamiento;
			$inmueble->save();

			flash('Inmueble actualizado')->success()->important();
			return redirect()->to('inmuebles');
		}
	}

	/**
	* Remove the specified resource from storage.
	*
	* @param \App\Inmuebles $inmuebles

	* @return \Illuminate\Http\Response
	*/
	public function destroy(Request $request)
	{
		//dd($request->all());
		$meses=Meses::all();
		$inmueble=Inmuebles::find($request->id);

		foreach($meses as $key){
                $mensualidad= Mensualidades::where('id_inmueble',$request->id)->where('mes',$key->mes)->first();
                if ($mensualidad!=null) {
                    $mensualidad->delete();
                }
            }

		$inmueble->delete();

		flash('Inmueble eliminado')->success()->important();
		return redirect()->to('inmuebles');

	}

	public function registrar_mensualidad(Request $request)
    {
        //dd('Registrar mensualidad',$request->all());
        $m=date('m');
        $a=date('Y');
        $meses=Meses::all();
        $inmueble=Inmuebles::find($request->id_inmueble);
        if ($request->accion==1) {
                # mensual
            if ($this->nulidad($request->monto)) {
                    flash('Debe agregar todos los montos en los meses indicados, intente otra vez!')->warning()->important();
                    return redirect()->back();    
                } else {
                    $i=0;
                    foreach ($meses as $key) {
                        if($key->id>=$m && $a==$request->anio){
                            $mensualidad=new Mensualidades();
                            $mensualidad->id_inmueble=$request->id_inmueble;
                            $mensualidad->anio=$request->anio;
                            $mensualidad->mes=$key->id;
                            $mensualidad->monto=$request->monto[$i];
                            $mensualidad->save();
                            $i++;
                        }else{

                            $mensualidad=new Mensualidades();
                            $mensualidad->id_inmueble=$request->id_inmueble;
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
                        $mensualidad=new Mensualidades();
                        $mensualidad->id_inmueble=$request->id_inmueble;
                        $mensualidad->anio=$request->anio;
                        $mensualidad->mes=$key->id;
                        $mensualidad->monto=$request->montoaAnio;
                        $mensualidad->save();
                    }else{
                        $mensualidad=new Mensualidades();
                        $mensualidad->id_inmueble=$request->id_inmueble;
                        $mensualidad->anio=$request->anio;
                        $mensualidad->mes=$key->id;
                        $mensualidad->monto=$request->montoaAnio;
                        $mensualidad->save();
                    }
                }
                
            }
            flash('Mensualidad registrada para el año: <b>'.$request->anio.'</b> en el inmueble: <b>'.$inmueble->idem.'</b>, de manera exitosa!')->success()->important();
            return redirect()->to('inmuebles');
    }
    public function editar_mensualidad(Request $request)
    {
        //dd('Editar mensualidad',$request->all());

        if ($this->nulidad($request->monto)==true && $request->accion==1) {
                    flash('Debe agregar todos los montos en los meses indicados, intente otra vez!')->warning()->important();
                    return redirect()->back();    
                } else {

                $meses=Meses::all();
                $inmueble=Inmuebles::find($request->id_inmueble);
                //eliminando mensualidades

            for($i=0;$i<count($request->mes);$i++){
                    $mensualidad= Mensualidades::where('id_inmueble',$request->id_inmueble)->where('anio',$request->anio)->where('mes',$request->mes[$i])->first();
                    //dd($mensualidad);
                    if ($mensualidad!=null) {
                        
                        $mensualidad->delete();
                    }
                }
            //----------------------
        if ($request->accion==1) {
                # mensual
                
                for($i=0;$i<count($request->mes);$i++) {
                    
                        $mensualidad=new Mensualidades();
                        $mensualidad->id_inmueble=$request->id_inmueble;
                        $mensualidad->anio=$request->anio;
                        $mensualidad->mes=$request->mes[$i];
                        $mensualidad->monto=$request->monto[$i];
                        $mensualidad->save();
                        
                    
                }
            } else {
                # anual
                for($i=0;$i<count($request->mes);$i++){
                   
                        $mensualidad=new Mensualidades();
                        $mensualidad->id_inmueble=$request->id_inmueble;
                        $mensualidad->anio=$request->anio;
                        $mensualidad->mes=$request->mes[$i];
                        $mensualidad->monto=$request->montoaAnio;
                        $mensualidad->save();
                    
                }
                
            }

            flash('Mensualidad actualizada para el año: <b>'.$request->anio.'</b> en el inmueble: <b>'.$inmueble->idem.'</b>, de manera exitosa!')->success()->important();
            return redirect()->to('inmuebles');
        }
    }
    public function eliminar_mensualidad(Request $request)
    {
        //dd('Eliminar mensualidad',$request->all());
        //eliminando mensualidades
        $inmueble=Inmuebles::find($request->id_inmueble);
        $meses=Meses::all();

            foreach ($meses as $key) {
                    
                    $mensualidad= Mensualidades::where('id_inmueble',$request->id_inmueble)->where('anio',$request->anio)->where('mes',$key->id)->first();
                    //dd($mensualidad);
                    if ($mensualidad!=null) {
                        
                        $mensualidad->delete();
                    }
                    
                    
                }
            //----------------------
                flash('Mensualidad eliminada para el año: <b>'.$request->anio.'</b> en el inmueble: <b>'.$inmueble->idem.'</b>, de manera exitosa!')->success()->important();
                return redirect()->to('inmuebles');
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