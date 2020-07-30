<?php

namespace App\Http\Controllers;

use App\contabilidad;
use Illuminate\Http\Request;

class ContabilidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('contabilidad.index');
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
     * @param  \App\contabilidad  $contabilidad
     * @return \Illuminate\Http\Response
     */
    public function show(contabilidad $contabilidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\contabilidad  $contabilidad
     * @return \Illuminate\Http\Response
     */
    public function edit(contabilidad $contabilidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\contabilidad  $contabilidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contabilidad $contabilidad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\contabilidad  $contabilidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(contabilidad $contabilidad)
    {
        //
    }
}
