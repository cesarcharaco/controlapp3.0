<?php

namespace App\Http\Controllers;

use App\User;
use App\Residentes;
use App\Estacionamientos;
use App\Inmuebles;
use Illuminate\Http\Request;

class ResidentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $residentes=Residentes::all();
        return View('residentes.index', compact('residentes'));
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
        // dd($request->all());
        $buscar=user::where('email',$request->email)->get();
        if (count($buscar)>0) {
            flash('email ya registrado')->warning()->important();
            return redirect()->back();
        } else {
            $user=\DB::table('users')->insert([
            'name' =>           $request->nombres,
            'rut' =>            $request->rut,
            'email' =>          $request->email,
            'password' =>       bcrypt($request->rut),
            'tipo_usuario' =>   'Residente'
            ]);

            $user=User::where('email',$request->email)->first();

            $residente=\DB::table('residentes')->insert([
                'nombres' => $request->nombres,
                'apellidos' => $request->apellidos,
                'rut' => $request->rut,
                'telefono' => $request->telefono,
                'id_usuario' => $user->id
            ]);

            flash('Residente registrado exitosamente!')->success()->important();
            return redirect()->back();
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
    public function update(Request $request)
    {
        // dd($request->all());
        $residente= Residentes::find($request->id);

        $residente->nombres=$request->nombres;
        $residente->apellidos=$request->apellidos;
        $residente->rut=$request->rut;
        $residente->telefono=$request->telefono;
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

    public function arriendos()
    {
        $residentes=Residentes::all();
        $estacionamientos=Estacionamientos::where('status','Libre')->get();
        $inmuebles=Inmuebles::where('status','Disponible')->get();

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
        return $residentes=Residentes::where('id','>=',$num)->get();

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
        return \DB::table('residentes')
        ->join('residentes_has_inmuebles','residentes_has_inmuebles.id_residente','=','residentes.id')
        ->join('inmuebles','inmuebles.id','=','residentes_has_inmuebles.id_inmueble')
        ->join('mensualidades','mensualidades.id_inmueble','=','inmuebles.id')
        ->join('pagos','pagos.id_mensualidad','=','mensualidades.id')
        ->where('inmuebles.id',$id_inmueble)
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
        return \DB::table('residentes')
        ->join('residentes_has_est','residentes_has_est.id_residente','=','residentes.id')
        ->join('estacionamientos','estacionamientos.id','=','residentes_has_est.id_estacionamiento')
        ->join('mens_estac','mens_estac.id_estacionamiento','=','estacionamientos.id')
        ->join('pagos_estac','pagos_estac.id_mens_estac','=','mens_estac.id')
        ->where('estacionamientos.id',$id_estacionamiento)
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
