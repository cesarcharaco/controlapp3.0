<?php

namespace App\Http\Controllers;

use App\Noticias;
use Illuminate\Http\Request;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $noticias=\DB::table('noticias')->insert([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
        ]);
        flash('Noticia registrada!')->important();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Noticias  $noticias
     * @return \Illuminate\Http\Response
     */
    public function show(Noticias $noticias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Noticias  $noticias
     * @return \Illuminate\Http\Response
     */
    public function edit(Noticias $noticias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Noticias  $noticias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $noticia= Noticias::find($request->id);

        $noticia->titulo=$request->titulo;
        $noticia->contenido=$request->contenido;
        $noticia->save();

        flash('Noticia actualizada!')->important();
        return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Noticias  $noticias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd('asdasd');
        $noticias=Noticias::find($id);
        $noticias->delete();

        flash('Noticia eliminada!')->important();
        return redirect('home');
    }
}
