<?php

namespace App\Http\Controllers;

use App\MultasRecargas;
use Illuminate\Http\Request;
use App\Residentes;
class MultasRecargasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_admin=id_admin(\Auth::user()->email);
        $asignacion = \DB::table('residentes')
        ->join('resi_has_mr','resi_has_mr.id_residente','=','residentes.id')
        ->join('multas_recargas','multas_recargas.id','=','resi_has_mr.id_mr')
        ->where('residentes.id_usuario',\Auth::user()->id)
        ->where('multas_recargas.id_admin',$id_admin)
        ->select('multas_recargas.*','resi_has_mr.mes')
        ->get();

        // dd(count($asignacion));

        $mr=MultasRecargas::where('id_admin',$id_admin)->get();

        return view('multas.index',compact('mr','asignacion'));
    }

    public function buscar_multa($id_multa)
    {
        return \DB::table('multas_recargas')->where('id',$id_multa)->get();
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
        $id_admin=id_admin(\Auth::user()->email);
        $anio=date('Y');
        if ($request->motivo=="") {
            flash('Debe ingresar un motivo')->warning()->important();
            return redirect()->back();
        } elseif($request->monto=="") {
            flash('Debe Ingresar un Monto')->warning()->important();
            return redirect()->back();
        }else{
            $mr=new MultasRecargas();
            $mr->motivo=$request->motivo;
            $mr->observacion=$request->observacion;
            $mr->monto=$request->monto;
            $mr->tipo=$request->tipo;
            $mr->anio=$anio;
            $mr->id_admin=$id_admin;
            $mr->save();

            flash('La '.$request->tipo.' ha sido registrada con éxito')->success()->important();
            return redirect()->to('multas_recargas');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MultasRecargas  $multasRecargas
     * @return \Illuminate\Http\Response
     */
    public function show(MultasRecargas $multasRecargas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MultasRecargas  $multasRecargas
     * @return \Illuminate\Http\Response
     */
    public function edit(MultasRecargas $multasRecargas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MultasRecargas  $multasRecargas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_mr)
    {
        
        $anio=date('Y');
        if ($request->motivo=="") {
            flash('Debe ingresar un motivo')->warning()->important();
            return redirect()->back();
        } elseif($request->monto=="") {
            flash('Debe Ingresar un Monto')->warning()->important();
            return redirect()->back();
        }else{
            $mr= MultasRecargas::find($request->id);
            $mr->motivo=$request->motivo;
            $mr->observacion=$request->observacion;
            $mr->monto=$request->monto;
            $mr->tipo=$request->tipo;
            $mr->anio=$anio;

            $mr->save();

            flash('La '.$request->tipo.' ha sido actualiza con éxito')->success()->important();
            return redirect()->to('multas_recargas');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MultasRecargas  $multasRecargas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id_mr)
    {
        $mr=MultasRecargas::find($request->id_mr);
        $tipo=$mr->tipo;
        if ($mr->delete()) {
            flash('La '.$tipo.' ha sido eliminada con éxito')->success()->important();
            return redirect()->to('multas_recargas');
        } else {
            flash('La '.$tipo.' no pudo ser eliminada')->warning()->important();
            return redirect()->to('multas_recargas');
        }
        
    }

    public function saldo()
    {
        $id_admin=id_admin(\Auth::user()->email);
        $residentes=Residentes::where('id_admin',$id_admin)->get();

        return view('saldo',compact('residentes'));
    }
    public function asignar_mr(Request $request)
    {
        $id_admin=id_admin(\Auth::user()->email);
        $residentes=Residentes::where('id_admin',$id_admin)->get();

        // dd($request->all());
        if($request->registrarTodos== 'AsignarTodos'){

            for ($i=0; $i < count($residentes); $i++) {

                $asignados=\DB::table('resi_has_mr')->where('id_residente',$residentes[$i]->id)->get();
                if(count($asignados)==0){

                    for ($j=0; $j < count($request->id_mr); $j++) { 

                        \DB::table('resi_has_mr')->insert([
                            'id_residente' => $residentes[$i]->id,
                            'id_mr' => $request->id_mr[$j],
                            'mes' => date('m')
                        ]);
                    }

                }else{
                    flash('Hay sanciones que ya estaban registradas al residente '.$residentes[$i]->nombres.' '.$residentes[$i]->apellidos)->warning()->important();
                }
            }

            flash('Sanciones asignadas a todos los residentes con éxito')->success()->important();

        }else{
            for ($i=0; $i < count($request->id_residente); $i++) { 

                for ($j=0; $j < count($request->id_mr); $j++) { 

                    \DB::table('resi_has_mr')->insert([
                        'id_residente' => $request->id_residente[$i],
                        'id_mr' => $request->id_mr[$j],
                        'mes' => date('m')
                    ]);
                }
            }

            flash('Sanción asignada con éxito')->success()->important();
        }


        return redirect()->back();
    }

    public function status_mr(Request $request)
    {
        $residente=Residentes::find($request->id_residente);

        foreach ($residente->mr as $key) {
            if ($key->id_mr==$request->id_mr) {
                $key->pivot->status=$request->status;
                $key->save();
            }
        }

        flash('Status de Sanción actualizado a ('.$request->status.') con éxito')->success()->important();
            return redirect()->to('multas_recargas');
    }



    public function buscar_mr_all($num)
    {
        $id_admin=id_admin(\Auth::user()->email);
        return $mr=MultasRecargas::where('id','>=',$num)->where('id_admin',$id_admin)->get();
    }

    public function eliminar_mr(Request $request)
    {
        $residente=Residentes::find($request->id_residente);

        foreach ($residente->mr as $key) {
            if ($key->id_mr==$request->id_mr) {
                $key->pivot->status=$request->status;
                $key->delete();
            }
        }

        flash('Sanción eliminada con éxito')->success()->important();
            return redirect()->to('multas_recargas');
    }



    public function multas_residentes($id)
    {
        
        return $multas=\DB::table('multas_recargas')
        ->join('resi_has_mr','resi_has_mr.id_mr','=','multas_recargas.id')
        ->where('resi_has_mr.id_residente',$id)
        ->select('multas_recargas.*')
        ->get();
    }
}
