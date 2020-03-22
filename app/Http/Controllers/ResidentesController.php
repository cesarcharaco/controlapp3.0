<?php

namespace App\Http\Controllers;

use App\User;
use App\Residentes;
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
}
