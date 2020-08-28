<?php

namespace App\Http\Controllers;

use App\Alquiler;
use Illuminate\Http\Request;
use App\PlanesPago;
use App\Residentes;
use App\Dias;
use App\Instalaciones;
use App\PlanesPago;
// use App\Instalaciones;

class AlquilerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dias= Dias::all();
        $alquiler = Alquiler::all();
        $instalaciones = Instalaciones::all();
        $id_admin=id_admin(\Auth::user()->email);
        $residentes=Residentes::where('id_admin',$id_admin)->get();
        $planesPago=PlanesPago::where('status','Activo')->get();
        $pagosAnuncios=PagosAnuncios::where('id','<>',0)->orderby('id','DESC')->get();
        return View('alquiler.index', compact('planesPago','residentes','dias','instalaciones','alquiler','pagosAnuncios'));
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
        $instalacion = new Instalaciones();
        $instalacion->nombre=$request->nombre;
        $instalacion->hora_desde=$request->hora_desde;
        $instalacion->hora_hasta=$request->hora_hasta;
        $instalacion->max_personas=$request->max_personas;
        $instalacion->status=$request->status;
        $instalacion->save();

        if (count($request->id_dia)>0) {
            for($i=0; $i<count($request->id_dia); $i++){
                \DB::table('instalaciones_has_dias')->insert([
                    'id_instalacion' => $instalacion->id,
                    'id_dia' => $request->id_dia[$i]
                ]);
            }
        }
        toastr()->success('con éxito!', 'Instalacion registrada');
        return redirect()->back();
    }

    public function registrar_alquiler(Request $request)
    {
        //dd($request->all());
        $alquiler = new Alquiler();
        $alquiler->id_residente=$request->id_residente;
        $alquiler->id_instalacion=$request->id_instalacion;
        $alquiler->tipo_alquiler=$request->tipo_alquiler;
        $alquiler->fecha=$request->fecha;
        $alquiler->hora=$request->hora;
        $alquiler->num_personas=$request->num_personas;
        $alquiler->num_horas=$request->num_horas;
        $alquiler->status=$request->status;
        $alquiler->save();

        toastr()->success('con éxito!', 'Alquiler registrada');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alquiler  $alquiler
     * @return \Illuminate\Http\Response
     */
    public function show(Alquiler $alquiler)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alquiler  $alquiler
     * @return \Illuminate\Http\Response
     */
    public function edit(Alquiler $alquiler)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alquiler  $alquiler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alquiler $alquiler)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alquiler  $alquiler
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alquiler $alquiler)
    {
        //
    }
}
