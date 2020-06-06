<?php

namespace App\Http\Controllers;

use App\Anuncios;
use Illuminate\Http\Request;
use App\Http\Requests\AnunciosRequest;
class AnunciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anuncios=Anuncios::all();

        return view('anuncios.index',compact('anuncios'));
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
    public function store(AnunciosRequest $request)
    {
        //dd($request->all());
        
        //$codigo=$this->generarCodigo();
        $codigo="nnn";
        
            $validatedData = $request->validate([
                'imagen' => 'mimes:jpeg,png|max:3000'
            ]);
            $file=$request->file('imagen');

            $name=$codigo."_".$file->getClientOriginalName();
            $file->move(public_path().'/images_anuncios/', $name);  
            $url ='images_anuncios/'.$name;
            
        
            $anuncio=new Anuncios();

            $anuncio->titulo=$request->titulo;
            $anuncio->link=$request->link;
            $anuncio->descripcion=$request->descripcion;
            
            $anuncio->nombre_img=$name;
            $anuncio->url_img=$url;
            $anuncio->save();
       
            
        flash('Anuncio registrado con éxito!')->success()->important();
        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Anuncios  $anuncios
     * @return \Illuminate\Http\Response
     */
    public function show(Anuncios $anuncios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Anuncios  $anuncios
     * @return \Illuminate\Http\Response
     */
    public function edit(Anuncios $anuncios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Anuncios  $anuncios
     * @return \Illuminate\Http\Response
     */
    public function update(AnunciosRequest $request, $id_anuncio)
    {
        dd($request->all());

        //$codigo=$this->generarCodigo();
        $codigo="nnn";
        $cambio=0;
        if($request->hasfile('imagen')){

            $file=$request->file('imagen');

            $name=$file->getClientOriginalName();
            $file->move(public_path().'/images_anuncios/', $name);  
            $name = $name;
            $url ='files/'.$name;
            $cambio=1;
        }
            $anuncio=new Anuncios();

            $anuncio->titulo=$request->titulo;
            $anuncio->link=$request->link;
            $anuncio->descripcion=$request->descripcion;
            if($cambio==1){
            $anuncio->nombre_img=$name;
            $anuncio->url_img=$url;
            }
            $anuncio->save();

            flash('Anuncio registrado con éxito!')->success()->important();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Anuncios  $anuncios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anuncios $anuncios)
    {
        //
    }

    protected function generarCodigo() {
     $key = '';
     $pattern = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
     $max = strlen($pattern)-1;
     for($i=0;$i < 4;$i++) $key .= $pattern{mt_rand(0,$max)};
     return $key;
    }
}
