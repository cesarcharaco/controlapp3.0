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
use PDF;

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
        $id_admin=id_admin(\Auth::user()->email);
        if(\Auth::user()->tipo_usuario == 'Admin'){
            $inmuebles=Inmuebles::where('id_admin',$id_admin)->get();
            $estacionamientos=Estacionamientos::where('id_admin',$id_admin)->get();
            $residentes=Residentes::where('id_admin',$id_admin)->get();

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
        

        
        //dd(count($anios));
        return View('reportes.index', compact('meses','inmuebles','estacionamientos','residentes'));
    }

    
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
        $id_admin=id_admin(\Auth::user()->email);
        //preparando variable para anios de inmuebles
        if (!is_null($request->id_inmuebles) || !is_null($request->InmueblesTodos)) {
            $sql_i="SELECT inmuebles.* FROM residentes, inmuebles, residentes_has_inmuebles, mensualidades,pagos WHERE residentes.id_admin=".$id_admin." AND  residentes.id=residentes_has_inmuebles.id_residente AND inmuebles.id=residentes_has_inmuebles.id_inmueble AND mensualidades.id_inmueble=inmuebles.id AND mensualidades.anio=".$request->anio." ";
        } else {
            $sql_i="";
        }

        //preparando variable para anios de estacionamientos
        if (!is_null($request->id_estacionamientos) || !is_null($request->EstacionamientosTodos)) {
            
            $sql_e="SELECT * FROM residentes, residentes_has_est, estacionamientos,mens_estac WHERE residentes.id_admin=".$id_admin." AND residentes.id=residentes_has_est.id_residente AND estacionamientos.id=residentes_has_est.id_estacionamiento AND mens_estac.id_estacionamiento=estacionamientos.id  AND mens_estac.anio=".$request->anio." ";
        } else {
           $sql_e="";
        }
        
        //preparando la variable de anios multas/recargas
        if (!is_null($request->MultasRecargas)) {
            $sql_mr="SELECT * FROM residentes, multas_recargas, resi_has_mr WHERE residentes.id_admin=".$id_admin." AND residentes.id=resi_has_mr.id_residente AND resi_has_mr.id_mr=multas_recargas.id AND multas_recargas.anio=".$request->anio." ";
        } else {
            $sql_mr="";
        }
        
        //agregando los residentes
        $sql_r="SELECT * FROM residentes,users WHERE residentes.id_admin=".$id_admin." AND residentes.id_usuario=users.id ";
        if (is_null($request->ResidentesTodos)) {
            $residentes="";
            $residentes2="";
          for ($i=0; $i < count($request->id_residentes); $i++) { 
              $residentes.=" AND residentes.id=".$request->id_residentes[$i]." ";
              $residentes2.=" AND resi_has_mr.id_residente=".$request->id_residentes[$i]." ";
              $sql_r.="AND residentes.id=".$request->id_residentes[$i]." ";

          }
          if($sql_i!==""){
            $sql_i.=$residentes;
          }
          if($sql_e!==""){
            $sql_e.=$residentes; 
          }
          if($sql_mr!==""){
            $sql_mr.=$residentes2;
          }
        }else{
          
            $sql_r="SELECT residentes.*,users.email FROM residentes,users WHERE residentes.id_admin=".$id_admin." AND residentes.id_usuario=users.id ";
        }
            $residentes=\DB::select($sql_r);
        $meses[]=array();
        if(is_null($request->MesesTodos)){
            // para agregar los meses

            for ($i=0; $i < count($request->id_meses) ; $i++) { 
                $sql_i.=" OR mensualidades.mes=".$request->id_meses[$i]." ";
                $sql_e.=" OR mens_estac.mes=".$request->id_meses[$i]." ";
                $meses[$i]=$request->id_meses[$i];
            }
        }else{
            for ($i=0; $i < 12; $i++) { 
                $meses[$i]=$i+1;
            }
        }
          if($sql_i!==""){
            $sql_i.=" GROUP BY inmuebles.id";
          }
          if($sql_e!==""){
            $sql_e.=" GROUP BY estacionamientos.id"; 
          }
          if($sql_mr!==""){
            $sql_mr.=" GROUP BY multas_recargas.id";
          }
        /*echo $sql_i."<br>".$sql_e."<br>".$sql_mr."<br>";
        dd("-------------");*/
        //dd($meses);
        if($sql_i!==""){
        $inmuebles=\DB::select($sql_i);
        }else{
            $inmuebles=null;
        }
        if($sql_e!==""){
        $estacionamientos=\DB::select($sql_e);
        }else{
        $estacionamientos=null;
        }
        if($sql_mr!==""){
        $mr=\DB::select($sql_mr);
        }else{
            $mr=null;
        }
        $anio=$request->anio;

        $pdf = PDF::loadView('reportes/PDF/ReporteEspecifico', array(
            'inmuebles'=>$inmuebles,
            'estacionamientos'=>$estacionamientos,
            'mr'=>$mr,
            'residentes' => $residentes,
            'meses' => $meses,
            'anio' => $anio
        ));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('reportes/ReporteEspecifico.pdf');
        
    }

   
    public function general(Request $request)
    {
        $id_admin=id_admin(\Auth::user()->email);
        $anio=$request->anio;
        $meses[]=array();
        if (is_null($request->id_mes)) {
            flash('No ha seleccionado ningún mes, intente otra vez')->warning()->important();
            return redirect()->back();
        } else {
            for ($i=0; $i < count($request->id_mes); $i++) { 
                $meses[$i]=$request->id_mes[$i];
            }

            if (\Auth::user()->tipo_usuario=="Residente") {
                $residentes=Residentes::where('id_usuario',\Auth::user()->id)->get();
            } else {
                $residentes=Residentes::where('id_admin',$id_admin)->get();
            }
            
        }
        if (count($residentes)==0) {
           flash('No existen datos para mostrar')->warning()->important();
            return redirect()->back();
        } else {
            
            $pdf = PDF::loadView('reportes/PDF/ReporteGeneral', array(
                'residentes'=>$residentes,
                'meses'=>$meses,
                'anio' => $anio
            ));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream('reportes/ReporteGeneral.pdf');
        }
        
        
    }

    
}
