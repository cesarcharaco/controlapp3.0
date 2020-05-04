<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estacionamientos;
use App\Inmuebles;
use App\Mensualidades;
use App\MensualidadE;
use App\Meses;
use App\MultasRecargas;
use App\Notificaciones;
use App\Pagos;
use App\PagosE;
use App\Residentes;

class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $meses=Meses::all();

        if(\Auth::user()->tipo_usuario == 'Admin'){
            $inmuebles=Inmuebles::all();
            $estacionamientos=Estacionamientos::all();
            $residentes=Residentes::all();

        }else{
            $inmuebles = \DB::table('residentes')
                ->join('residentes_has_inmuebles','residentes_has_inmuebles.id_residente','=','residentes.id')
                ->join('inmuebles','inmuebles.id','=','residentes_has_inmuebles.id_inmueble')
                ->where('residentes.id_usuario',\Auth::user()->id)
                ->select('inmuebles.*')
                ->get();

            $estacionamientos = \DB::table('residentes')
                ->join('residentes_has_est','residentes_has_est.id_residente','=','residentes.id')
                ->join('estacionamientos','estacionamientos.id','=','residentes_has_est.id_estacionamiento')
                ->where('residentes.id_usuario',\Auth::user()->id)
                ->select('estacionamientos.*')
                ->get();
            $residentes=0;
        }
        $anios=array();
        $limit=date('Y')+1;
        for ($i=2019; $i <= $limit; $i++) { 
            $anios[$i]=$i;
        }
        //dd($anios);
        return View('reportes.index', compact('meses','inmuebles','estacionamientos','residentes','anios'));
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
        /*"id_meses" => array:2 [▶]
          "MesesTodos" => "MesesTodos"
          "id_estacionamientos" => array:1 [▶]
          "EstacionamientosTodos" => "Si"
          "id_inmuebles" => array:1 [▶]
          "InmueblesTodos" => "Si"
          "id_residentes" => array:1 [▶]
          "ResidentesTodos" => "Si"
          "MultasRecargas" => "Si"*/
        //dd($request->all());
        
        //preparando variable para anios de inmuebles
        if (!is_null($request->id_inmuebles) || !is_null($request->InmueblesTodos)) {
            $sql_i="SELECT * FROM residentes, inmuebles, residentes_has_inmuebles WHERE residentes.id=residentes_has_inmuebles.id_residente AND inmuebles.id=residentes_has_inmuebles.id_inmueble AND residentes_has_inmuebles.anio=".$request->anio." ";
        } else {
            $sql_i="";
        }

        //preparando variable para anios de estacionamientos
        if (!is_null($request->id_estacionamientos) || !is_null($request->EstacionamientosTodos)) {
            
            $sql_e="SELECT * FROM residentes, residentes_has_est, estacionamientos WHERE residentes.id=residentes_has_est.id_residente AND estacionamientos.id=residentes_has_est.id_estacionamiento AND residentes_has_est.anio=".$request->anio." ";
        } else {
           $sql_e="";
        }
        
        //preparando la variable de anios multas/recargas
        if (!is_null($request->MultasRecargas)) {
            $sql_mr="SELECT * FROM residentes, multas_recargas, resi_has_mr WHERE residentes.id=multas_recargas.id_residente AND multas_recargas.id_mr=multas_recargas.id AND multas_racargas.anio=".$request->anio." ";
        } else {
            $sql_mr="";
        }
        
        //agregando los residentes
        if (is_null($request->ResidentesTodos)) {
            $residentes="";
          for ($i=0; $i < count($request->id_residentes); $i++) { 
              $residentes.=" AND residentes.id=".$request->id_residentes[$i]." ";

          }
          if($sql_i!==""){
            $sql_i.=$residentes;
          }
          if($sql_e!==""){
            $sql_e.=$residentes; 
          }
          if($sql_mr!==""){
            $sql_mr.=$residentes;
          }
        }

        if(is_null($request->MesesTodos)){
            // para agregar los meses
            for ($i=0; $i < count($request->id_meses) ; $i++) { 
                $sql_i.=" AND mensualidades.mes=".$request->id_meses[$i]." ";
                $sql_e.=" AND mens_estac.mes=".$request->id_meses[$i]." ";
            }
        }

        echo $sql_i."<br>".$sql_e."<br>".$sql_mr."<br>";
        dd("-------------");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
