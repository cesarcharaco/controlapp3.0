<?php

namespace App\Http\Controllers;

use App\Inmuebles;
use Illuminate\Http\Request;

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

		return view('inmuebles.index',compact('inmuebles'));
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
		// dd($request->all());
		$buscar=Inmuebles::where('idem',$request->idem)->get();
		if (count($buscar)>0) {
			flash('idem ya registrado')->warning()->important();
			return redirect()->back();
		} else {
			$inmueble=new Inmuebles();
			$inmueble->idem=$request->idem;
			$inmueble->tipo=$request->tipo;
			$inmueble->status='Disponible';
			$inmueble->save();
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

	/**
	* Update the specified resource in storage.
	*
	* @param \Illuminate\Http\Request $request
	* @param \App\Inmuebles $inmuebles
	* @return \Illuminate\Http\Response
	*/
	public function update(Request $request, $id_inmueble)
	{
		// dd($request->all());
		$buscar=Inmuebles::where('idem',$request->idem_e)->where('id','<>',$request->id_e)->get();
		if (count($buscar)>0) {
			flash('Ya hay un inmueble registrado con ese idem!')->warning()->important();
			return redirect()->back();
		} else {
			$inmueble=Inmuebles::find($request->id_e);
			$inmueble->idem=$request->idem_e;
			$inmueble->tipo=$request->tipo_e;
			$inmueble->status=$request->status_e;
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
		$eliminar=Inmuebles::find($request->id_inmueble);
		$eliminar->delete();

		flash('Inmueble eliminado')->success()->important();
		return redirect()->to('inmuebles');

	}
}