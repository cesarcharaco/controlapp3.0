<?php

namespace App\Http\Controllers;

use App\Notificaciones;
use Illuminate\Http\Request;
use App\Residentes;
class NotificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $notificaciones=\DB::table('notificaciones')->insert([
            'titulo' => $request->titulo,
            'motivo' => $request->motivo
        ]);
        flash('Notificacion registrada!')->important();
        return redirect()->back();
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
        $notificacion= Notificaciones::find($request->id);

        $notificacion->titulo=$request->titulo;
        $notificacion->motivo=$request->motivo;
        $notificacion->save();

        flash('Notificación actualizada!')->important();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notificacion=Notificaciones::find($id);
        $notificacion->delete();

        flash('Notificación eliminada!')->important();
        return redirect('home');
    }

    public function asignar_notif(Request $request)
    {
        //dd($request->all());

        for ($i=0; $i < count($request->id_mr); $i++) { 
            \DB::table('resi_has_notif')->insert([
                'id_residente' => $request->id_residente,
                'id_notificacion' => $request->id_mr[$i]
            ]);
        }

        flash('Notificación enviada con éxito')->success()->important();
            return redirect()->to('notificaciones');
    }

    public function status_notif(Request $request)
    {
        $residente=Residentes::find($request->id_residente);

        foreach ($residente->notificaciones as $key) {
            if ($key->id_notificacion==$request->id_notificacion) {
                $key->pivot->status=$request->status;
                $key->save();
            }
        }

        flash('Status de Notificación actualizado a ('.$request->status.') con éxito')->success()->important();
            return redirect()->to('notificaciones');
    }

    public function eliminar_notif(Request $request)
    {
        $residente=Residentes::find($request->id_residente);

        foreach ($residente->notificaciones as $key) {
            if ($key->id_notificacion==$request->id_notificacion) {
                $key->pivot->status=$request->status;
                $key->delete();
            }
        }

        flash('Notificación eliminada con éxito')->success()->important();
            return redirect()->to('notificaciones');
    }
}
