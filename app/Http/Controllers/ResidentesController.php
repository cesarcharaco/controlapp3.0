<?php

namespace App\Http\Controllers;

use App\User;
use App\Residentes;
use App\Estacionamientos;
use App\Inmuebles;
use Illuminate\Http\Request;
use App\Http\Requests\ResidentesRequest;
use App\UsersAdmin;
use App\Mensualidades;
use App\MensualidadE;
use App\Pagos;
use App\PagosE;
class ResidentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public $id_admin=id_admin(\Auth::user()->email);

    public function index()
    {
        $id_admin=id_admin(\Auth::user()->email);
        $inmuebles=Inmuebles::where('id_admin',$id_admin)->get();
        $estacionamientos=Estacionamientos::where('id_admin',$id_admin)->get();
        $residentes=Residentes::where('id_admin',$id_admin)->orderBy('rut','ASC')->get();;
        return View('residentes.index', compact('residentes','inmuebles','estacionamientos'));
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
        $id_admin=id_admin(\Auth::user()->email);
        $buscar=Residentes::where('id_admin',$id_admin)->get();
        $cont=0;
        $mes=date('m');
        foreach ($buscar as $key) {
            $usuario=User::find($key->id_usuario);
            if($usuario->email==$request->email){
                $cont++;
            }
        }
        if ($cont>0) {
            flash('Email ya registrado, intente otra vez')->warning()->important();
            return redirect()->back();
        } else {
            $buscar2=Residentes::where('rut',$request->rut)->where('id_admin',$id_admin)->get();
            if (count($buscar2)>0) {
                flash('RUT ya registrado, intente otra vez')->warning()->important();
            return redirect()->back();
            } else {
                $user=new User();
                $user->name=$request->nombres;
                $user->rut= $request->rut;
                $user->email=$request->email;
                $user->password=bcrypt($request->rut);
                $user->tipo_usuario='Residente';
                $user->save();

                
                $residente=new Residentes();
                $residente->nombres = $request->nombres;
                $residente->apellidos = $request->apellidos;
                $residente->rut = $request->rut;
                if(!is_null($request->telefono)){
                    $residente->telefono = $request->telefono;
                }
                $residente->id_usuario = $user->id;
                $residente->id_admin = $id_admin;
                $residente->save();
                $anio=date('Y');
                //asignacion de inmueble
                if(!is_null($request->id_inmuebles)){
                        for ($i=0; $i < count($request->id_inmuebles); $i++) { 
                            \DB::table('residentes_has_inmuebles')->insert([
                                'id_residente' => $residente->id,
                                'id_inmueble' => $request->id_inmuebles[$i]
                            ]);
                            $inmueble=Inmuebles::find($request->id_inmuebles[$i]);
                            $inmueble->status="No Disponible";
                            $inmueble->save();

                            //asignando estatus de pago del inmueble
                            $mensualidades=Mensualidades::where('id_inmueble',$request->id_inmuebles[$i])->where('anio',$anio)->get();
                            foreach ($mensualidades as $key) {
                                //echo "".$key->mes."-".$mes."<br>";
                                if ($key->mes>=intval($mes)) {
                                    $pago=new Pagos();
                                    $pago->id_mensualidad=$key->id;
                                    $pago->status="Pendiente";
                                    $pago->save();
                                   
                                } else {
                                    $pago=new Pagos();
                                    $pago->id_mensualidad=$key->id;
                                    $pago->status="No Aplica";
                                    $pago->save();
                                    
                                }
                                
                            }

                        }
                        //dd("---------");
                    }//fin de asignacion de inmubles

                    //asignacion de estacionamientos
                    if(!is_null($request->id_estacionamientos)){
                        for ($i=0; $i < count($request->id_estacionamientos); $i++) { 
                            \DB::table('residentes_has_est')->insert([
                                'id_residente' => $residente->id,
                                'id_estacionamiento' => $request->id_estacionamientos[$i]
                            ]);
                            //dd(".....");
                            $estacionamiento=Estacionamientos::find($request->id_estacionamientos[$i]);
                            $estacionamiento->status="Ocupado";
                            $estacionamiento->save();

                            //asignando estatus de pago del inmueble
                            $mensualidades=MensualidadE::where('id_estacionamiento',$request->id_estacionamientos[$i])->where('anio',$anio)->get();
                            foreach ($mensualidades as $key) {
                                if ($key->mes>=intval($mes)) {
                                    $pago=new PagosE();
                                    $pago->id_mens_estac=$key->id;
                                    $pago->status="Pendiente";
                                    $pago->save();
                                } else {
                                    $pago=new PagosE();
                                    $pago->id_mens_estac=$key->id;
                                    $pago->status="No Aplica";
                                    $pago->save();
                                }
                                
                            }
                        }
                    }
                flash('Residente registrado exitosamente!')->success()->important();
                return redirect()->back();       
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Residentes  $residentes
     * @return \Illuminate\Http\Response
     */
    public function show(Residentes $residentes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Residentes  $residentes
     * @return \Illuminate\Http\Response
     */
    public function edit(Residentes $residentes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Residentes  $residentes
     * @return \Illuminate\Http\Response
     */
    public function update(ResidentesRequest $request)
    {
        //dd($request->all());
        $id_admin=id_admin(\Auth::user()->email);

        $buscar=Residentes::where('id_admin',$id_admin)->get();
        $cont=0;
        foreach ($buscar as $key) {
            
            if ($key->id!=$request->id) {
                
                $usuario=User::find($key->id_usuario);
                if($usuario->email==$request->email){
                    $cont++;
                }
            }
            
        }
        //dd($cont);
        if ($cont>0) {
            flash('Email ya registrado, intente otra vez')->warning()->important();
            return redirect()->back();
        } else {
            $buscar2=Residentes::where('rut',$request->rut)->where('id','<>',$request->id)->where('id_admin',$id_admin)->get();
            if (count($buscar2)>0) {
                flash('RUT ya registrado, intente otra vez')->warning()->important();
            return redirect()->back();
            } else {
                $residente= Residentes::find($request->id);

                $residente->nombres=$request->nombres;
                $residente->apellidos=$request->apellidos;
                $residente->rut=$request->rut;
                if(!is_null($request->telefono)){
                    $residente->telefono=$request->telefono;
                }
                $residente->save();

                $user=User::find($residente->id_usuario);

                $user->name=$request->nombres;
                $user->rut=$request->rut;
                $user->email=$request->email;
                $user->password=bcrypt($request->rut);
                $user->save();

                flash('Residente actualizado!')->success()->important();
                return redirect()->back();
            }
        }
        
        
    }

    public function arriendos()
    {
        $id_admin=id_admin(\Auth::user()->email);
        $residentes=Residentes::where('id_admin',$id_admin)->get();
        $estacionamientos=Estacionamientos::where('status','Libre')->where('id_admin',$id_admin)->get();
        $inmuebles=Inmuebles::where('status','Disponible')->where('id_admin',$id_admin)->get();

        return View('arriendos.index', compact('residentes', 'estacionamientos','inmuebles'));
    }

    public function buscar_residente($id_residente)
    {
        return \DB::table('residentes')
        ->join('users','users.id','=','residentes.id_usuario')
        ->where('residentes.id', $id_residente)
        ->select('residentes.*','users.email')
        ->get();

        // return Residentes::where('id', $id_residente)->get();
    }

    public function buscar_residente2($num)
    {
        $id_admin=id_admin(\Auth::user()->email);
        return $residentes=Residentes::where('id','>=',$num)->where('id_admin',$id_admin)->get();

        // return Residentes::where('id', $id_residente)->get();
    }

    public function buscar_inmuebles($id_residente)
    {

        return \DB::table('residentes')
        ->join('residentes_has_inmuebles','residentes_has_inmuebles.id_residente','=','residentes.id')
        ->join('inmuebles','inmuebles.id','=','residentes_has_inmuebles.id_inmueble')
        ->where('residentes.id', $id_residente)
        ->where('residentes_has_inmuebles.status','En Uso')
        ->select('inmuebles.*','residentes_has_inmuebles.status AS alquiler_status')
        ->get();

    }

    public function buscar_inmuebles2($id_residente)
    {

        return \DB::table('residentes')
        ->join('residentes_has_inmuebles','residentes_has_inmuebles.id_residente','=','residentes.id')
        ->join('inmuebles','inmuebles.id','=','residentes_has_inmuebles.id_inmueble')
        ->where('residentes.id', $id_residente)
        ->where('residentes_has_inmuebles.status','En Uso')
        ->select('inmuebles.id','inmuebles.idem','residentes_has_inmuebles.status AS alquiler_status')
        ->get();

    }

    public function buscar_inmuebles3($id_inmueble)
    {
        $anio=date('Y');
        $id_admin=id_admin(\Auth::user()->email);
        return \DB::table('residentes')
        ->join('residentes_has_inmuebles','residentes_has_inmuebles.id_residente','=','residentes.id')
        ->join('inmuebles','inmuebles.id','=','residentes_has_inmuebles.id_inmueble')
        ->join('mensualidades','mensualidades.id_inmueble','=','inmuebles.id')
        ->join('pagos','pagos.id_mensualidad','=','mensualidades.id')
        ->where('inmuebles.id',$id_inmueble)
        ->where('residentes.id_admin',$id_admin)
        ->where('mensualidades.anio',$anio)
        ->where('residentes_has_inmuebles.status','En Uso')
        ->select('mensualidades.mes','mensualidades.id','pagos.status','residentes_has_inmuebles.status AS alquiler_status')
        ->get();

    }

    public function buscar_estacionamientos($id_residente)
    {
        return \DB::table('residentes')
        ->join('residentes_has_est','residentes_has_est.id_residente','=','residentes.id')
        ->join('estacionamientos','estacionamientos.id','=','residentes_has_est.id_estacionamiento')
        ->where('residentes.id', $id_residente)
        ->where('residentes_has_est.status','En Uso')
        ->select('estacionamientos.*','residentes_has_est.status AS alquiler_status')
        ->get();

    }

    public function buscar_estacionamientos2($id_residente)
    {
        return \DB::table('residentes')
        ->join('residentes_has_est','residentes_has_est.id_residente','=','residentes.id')
        ->join('estacionamientos','estacionamientos.id','=','residentes_has_est.id_estacionamiento')
        ->where('residentes.id', $id_residente)
        ->where('residentes_has_est.status','En Uso')
        ->select('estacionamientos.id','estacionamientos.idem','residentes_has_est.status AS alquiler_status')
        ->get();

    }

    public function buscar_estacionamientos3($id_estacionamiento)
    {
        $anio=date('Y');
        $id_admin=id_admin(\Auth::user()->email);
        return \DB::table('residentes')
        ->join('residentes_has_est','residentes_has_est.id_residente','=','residentes.id')
        ->join('estacionamientos','estacionamientos.id','=','residentes_has_est.id_estacionamiento')
        ->join('mens_estac','mens_estac.id_estacionamiento','=','estacionamientos.id')
        ->join('pagos_estac','pagos_estac.id_mens_estac','=','mens_estac.id')
        ->where('estacionamientos.id',$id_estacionamiento)
        ->where('estacionamientos.id_admin',$id_admin)
        ->where('mens_estac.anio',$anio)
        ->where('residentes_has_est.status','En Uso')
        ->select('mens_estac.mes','mens_estac.id','pagos_estac.status','residentes_has_est.status AS alquiler_status')
        ->get();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Residentes  $residentes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $residente = Residentes::where('id', $request->id)->first();
        $id=$residente->id_usuario;
        
        foreach ($residente->inmuebles as $key) {
            $inmueble=Inmuebles::find($key->pivot->id_inmueble);
            $inmueble->status="Disponible";
            $inmueble->save();
            foreach ($key->mensualidades as $key2) {
                $buscar=Pagos::where('id_mensualidad',$key2->id);
                $buscar->delete();
            }
        }

        foreach ($residente->estacionamientos as $key) {
            $inmueble=Estacionamientos::find($key->pivot->id_estacionamiento);
            $inmueble->status="Libre";
            $inmueble->save();
            foreach ($key->mensualidad as $key2) {
                $buscar=PagosE::where('id_mens_estac',$key2->id);
                $buscar->delete();
            }
        }

        $residente->delete();

        if($eliminar = User::find($id)){
            $eliminar->delete();
        }

        flash('Residente eliminado!')->success();
        return redirect()->back();
    }





    public function mostrar_inmuebles($id_residente)
    {
        return \DB::table('residentes')
        ->join('residentes_has_inmuebles','residentes_has_inmuebles.id_residente','=','residentes.id')
        ->join('inmuebles','inmuebles.id','=','residentes_has_inmuebles.id_inmueble')
        ->join('mensualidades','mensualidades.id_inmueble','=','inmuebles.id')
        ->join('pagos','pagos.id_mensualidad','=','mensualidades.id')
        ->where('residentes.id', $id_residente)
        ->where('residentes_has_inmuebles.status','En Uso')
        ->select('inmuebles.*','residentes_has_inmuebles.status AS alquiler_status')
        ->get();
    }

    public function mostrar_estacionamientos($id_residente)
    {
        return \DB::table('residentes')
        ->join('residentes_has_est','residentes_has_est.id_residente','=','residentes.id')
        ->join('estacionamientos','estacionamientos.id','=','residentes_has_estacionamientos.id_estacionamiento')
        ->join('mens_estac','mens_estac.id_estacionamiento','=','estacionamientos.id')
        ->join('pagos_estac','pagos_estac.id_mens_estac','=','mens_estac.id')
        ->where('residentes.id', $id_residente)
        ->where('residentes_has_est.status','En Uso')
        ->select('inmuebles.*','residentes_has_est.status AS alquiler_status')
        ->get();
    }

    public function buscar_mr($id_residente)
    {
        return \DB::table('multas_recargas')
        ->join('resi_has_mr','resi_has_mr.id_mr','=','multas_recargas.id')
        ->join('residentes','residentes.id','=','resi_has_mr.id_residente')
        ->where('residentes.id',$id_residente)
        ->where('resi_has_mr.status','<>','Pagada')
        ->select('multas_recargas.*','resi_has_mr.id AS id_resi_mr')
        ->get();
    }
}
