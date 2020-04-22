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

    public function buscar_inmuebles($id_residente)
    {
        return \DB::table('residentes')
        ->join('residentes_has_inmuebles','residentes_has_inmuebles.id_residente','=','residentes.id')
        ->join('inmuebles','inmuebles.id','=','residentes_has_inmuebles.id_inmueble')
        ->where('residentes.id', $id_residente)
        ->select('inmuebles.*')
        ->get();

    }

    public function buscar_estacionamientos($id_residente)
    {
        return \DB::table('residentes')
        ->join('residentes_has_est','residentes_has_est.id_residente','=','residentes.id')
        ->join('estacionamientos','estacionamientos.id','=','residentes_has_est.id_estacionamiento')
        ->where('residentes.id', $id_residente)
        ->select('estacionamientos.*')
        ->get();

    }

    public function buscar_estacionamientos2($id_residente)
    {
        return \DB::table('mens_estac')
        ->join('estacionamientos','estacionamientos.id','=','mens_estac.id_estacionamiento')
        ->join('residentes_has_est','residentes_has_est.id_estacionamiento','=','estacionamientos.id')
        ->join('residentes','residentes.id','=','residentes_has_est.id_residente')
        ->where('residentes.id', $id_residente)
        ->select('estacionamientos.*','mens_estac.*')
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
        ->select('inmuebles.*')
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
        ->select('inmuebles.*')
        ->get();
    }
}
