<?php

namespace App\Http\Controllers;

use App\Mensualidades;
use Illuminate\Http\Request;
use App\Inmuebles;
class MensualidadesController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index()
	{
		$mensualidades=Mensualidades::all();
		$inmuebles=Inmuebles::all();

		return view('mensualidades.index',compact('mensualidades','inmuebles'));
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
		$buscar=Mensualidades::where('id_inmueble',$request->id_inmueble)->get();

		if (count($buscar)>0) {
			flash('<i class="icon-circle-check"></i> Ya existen mensualidades registradas para este inmueble
			en el año seleccionado!')->warning()->important();
			return redirect()->back();

		} else {
			for($i=0;$i<count($request->mes);$i++){
				$mensualidad=new Mensualidades();
				$mensualidad->id_inmueble=$request->id_inmueble;
				$mensualidad->mes=$request->mes[$i];
				$mensualidad->anio=$request->anio;
				// $mensualidad->monto=$request->monto[$i];
				$mensualidad->monto=$request->monto;
				$mensualidad->save();
			}
		flash('<i class="icon-circle-check"></i> Mensualidades registradas con éxito!')->success()->important();
		return redirect()->to('mensualidades');
	}

	}

	/**
	* Display the specified resource.
	*
	* @param \App\Mensualidades $mensualidades
	* @return \Illuminate\Http\Response
	*/
	public function show(Mensualidades $mensualidades)

	{
	//
	}

	/**
	* Show the form for editing the specified resource.
	*
	* @param \App\Mensualidades $mensualidades
	* @return \Illuminate\Http\Response
	*/
	public function edit($id_inmueble,$anio)
	{

	}

	/**
	* Update the specified resource in storage.
	*
	* @param \Illuminate\Http\Request $request
	* @param \App\Mensualidades $mensualidades
	* @return \Illuminate\Http\Response
	*/
	public function update(Request $request, $id_inmueble)
	{
		$buscar=Mensualidades::where('id_inmueble',$id_inmueble)->where('anio',$request->anio)->get();
		if (count($buscar)>0) {
		foreach ($buscar as $key) {
		$mensualidad=Mensualidades::find($key->id);
		$mensualidad->delete();
		}
		}
		for($i=0;$i<count($request->mes);$i++){
		$mensualidad=new Mensualidades();

		$mensualidad->id_inmueble=$request->id_inmueble;
		$mensualidad->mes=$request->mes[$i];
		$mensualidad->anio=$request->anio;
		$mensualidad->monto=$request->monto[$i];
		$mensualidad->save();
		}
		flash('<i class="icon-circle-check"></i> Mensualidades actualizadas con éxito!')->success()->important();
		return redirect()->to('mensualidades');

	}

	/**
	* Remove the specified resource from storage.
	*
	* @param \App\Mensualidades $mensualidades
	* @return \Illuminate\Http\Response
	*/
	public function destroy(Request $request)
	{
		// $me=Mensualidades::where('id_inmueble',$request->id_inmueble)->where('anio',$request->anio)->get();
		$mensualidad=Mensualidades::find($request->id);
		$mensualidad->delete();

		flash('<i class="icon-circle-check"></i> Mensualidades eliminadas con éxito!')->success()->important();
		return redirect()->to('mensualidades');
	}
}