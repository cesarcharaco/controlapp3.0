<?php

namespace App\Http\Controllers;

use App\Pagos;
use App\Residentes;
use App\Inmuebles;
use App\Meses;
use App\Estacionamientos;
use Illuminate\Http\Request;

class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $residentes=Residentes::all();
        $meses=Meses::all();
        $pagos=Pagos::all();
        $inmuebles=Inmuebles::all();
        $estacionamientos=Estacionamientos::all();

        return View('pagos.index', compact('residentes','pagos','inmuebles','estacionamientos','meses'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function show(Pagos $pagos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function edit(Pagos $pagos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pagos $pagos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pagos $pagos)
    {
        //
    }
}
