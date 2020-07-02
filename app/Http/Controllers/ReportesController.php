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
        
        $anio= array();
        $year=Date('Y');
        $n=0;
        for ($i=$year; $i <= $year; $i++) { 
            $anio[$n]=$i;
            $n++;
        }

        $multas=MultasRecargas::where('id_admin',$id_admin)->get();

        return View('reportes.index', compact('meses','inmuebles','estacionamientos','residentes','anio','multas'));
    }

    
    public function store(Request $request)
    {
        
        dd($request->all());
        /*"id_meses" => array:2 [▶]
          "MesesTodos" => "MesesTodos"
          "id_estacionamientos" => array:1 [▶]
          "EstacionamientosTodos" => "Si"
          "id_inmuebles" => array:1 [▶]
          "InmueblesTodos" => "Si"
          "id_residentes" => array:1 [▶]
          "ResidentesTodos" => "Si"
          "MultasRecargas" => "Si"*/
        
        $id_admin=id_admin(\Auth::user()->email);
        //preparando variable para anios de inmuebles
        if (!is_null($request->id_inmuebles) || !is_null($request->InmueblesTodos)) {
            
             $sql_i="SELECT * FROM inmuebles WHERE id_admin=".$id_admin." ";
             if (is_null($request->InmueblesTodos)) {
                //dd("----------------");
                $sql_i.=" AND ";// agrego un AND para comenzar a agregar condicionales
                $limit=count($request->id_inmuebles) -1;// variable que me permite saber cual es la última vuelta del for
                for ($x=0; $x < count($request->id_inmuebles); $x++) { 
                   $sql_i.=" inmuebles.id=".$request->id_inmuebles[$x];
                   if ($x!=$limit) {
                       $sql_i.=" OR ";
                   }
                   
                }
             }
        } else {
            $sql_i="";
        }
        //dd($sql_i);
        //preparando variable para anios de estacionamientos
        if (!is_null($request->id_estacionamientos) || !is_null($request->EstacionamientosTodos)) {
            
            $sql_e="SELECT * FROM estacionamientos  WHERE id_admin=".$id_admin." ";

            if(is_null($request->EstacionamientosTodos)){
                $sql_e.= ' AND ';
                $limit=count($request->id_estacionamientos) -1;

                for ($y=0; $y < count($request->id_estacionamientos); $y++) { 
                    $sql_e.=" estacionamientos.id=".$request->id_estacionamientos[$y];
                    if ($y!=$limit) {
                        $sql_e.= " OR ";
                    }
                }
            }


        } else {
           $sql_e="";
        }
        //dd($sql_e);
        //preparando la variable de anios multas/recargas
        if (!is_null($request->MultasRecargas)) {
                $sql_mr="SELECT * FROM multas_recargas WHERE id_admin=".$id_admin." ";

                if (in_null($request->id_multa)) {
                    $sql_mr.= ' AND ';
                    $limit = count($request->id_multa) -1;

                    for ($z=0; $z < count($request->id_multa); $z++) { 
                        $sql_mr.= " multas_recargas.id=".$request->id_multa[$z];
                        if ($z != $limit) {
                            $sql_mr.= " OR ";
                        }
                    }
                }
        } else {
            $sql_mr="";
        }
        
        //agregando los residentes
        $sql_r="SELECT * FROM residentes,users WHERE residentes.id_admin=".$id_admin." AND residentes.id_usuario=users.id ";
        if (is_null($request->ResidentesTodos)) {
            $sql_r.=" AND ";// agrego un AND para comenzar a agregar condicionales
            $limit=count($request->id_residentes) -1;// variable que me permite saber cual es la última vuelta del for
          for ($i=0; $i < count($request->id_residentes); $i++) { 
              $sql_r.=" residentes.id=".$request->id_residentes[$i]." ";// anexo la condición para cada id_residente que está en el array
              if ($i!=$limit) {
                $sql_r.=" OR ";// agrego OR para que me los traiga todos
              }elseif($i==$limit){
                $sql_r.=" GROUP BY residentes.id "; // cuando sea la ultima vuelta le agrego el group by
              }
              

          }
        }else{
          
            $sql_r="SELECT residentes.*,users.email FROM residentes,users WHERE residentes.id_admin=".$id_admin." AND residentes.id_usuario=users.id ";
        }
        //dd($sql_r);
        $residentes=\DB::select($sql_r);
        
        //haciendo arrays de meses y años de inmuebles


        //---------------------------------------------

        //haciendo arrays de meses y años de estacionamientos


        //---------------------------------------------

        //haciendo arrays de meses y años de residentes


        //---------------------------------------------
        //haciendo arrays de meses y años de multas_recargas


        //---------------------------------------------
        $mesesInmuebles[]=array();
        $aniosInmuebles[]=array();

        //Meses de los inmuebles
        if(is_null($request->MesesTodosInmuebles)){
            // para agregar los meses

            for ($i=0; $i < count($request->meses_inmueble) ; $i++) { 
                
                $mesesInmuebles[$i]=$request->meses_inmueble[$i];
            }
        }else{
            for ($i=0; $i < 12; $i++) { 
                $mesesInmuebles[$i]=$i+1;
            }
        }

        //Anios de los inmuebles
        if(is_null($request->AniosTodosInmuebles)){
            // para agregar los meses

            for ($i=0; $i < count($request->anios_inmueble) ; $i++) { 
                
                $aniosInmuebles[$i]=$request->anios_inmueble[$i];
            }
        }else{
            for ($i=0; $i < 12; $i++) { 
                $aniosInmuebles[$i]=$i+1;
            }
        }
        
        
        
        dd($sql_i);
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
        //dd($estacionamientos);
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
        //dd($request->all());
        $id_admin=id_admin(\Auth::user()->email);
        $anio=$request->anio;
        $meses[]=array();
        //dd($request->all());
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
