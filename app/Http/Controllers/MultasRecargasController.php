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
        $mr=MultasRecargas::all();

        return view('multas.index',compact('mr'));
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
        $residentes=Residentes::all();

        return view('saldo',compact('residentes'));
    }
    public function asignar_mr(Request $request)
    {
        //dd($request->all());

        for ($i=0; $i < count($request->id_mr); $i++) { 
            \DB::table('resi_has_mr')->insert([
                'id_residente' => $request->id_residente,
                'id_mr' => $request->id_mr[$i]
            ]);
        }

        flash('Sanción asignada con éxito')->success()->important();
            return redirect()->to('multas_recargas');
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



    public function buscar_mr_all()
    {
        return \DB::table('multas_recargas')
        ->select('multas_recargas.*')
        ->get();
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
}
