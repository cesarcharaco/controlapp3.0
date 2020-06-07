<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticias;
use App\Notificaciones;
use App\Residentes;
use App\PagosComunes;
use App\Estacionamientos;
use App\Inmuebles;
use App\Anuncios;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $anio=Date('Y');
        $noticias=Noticias::all();
        $notificaciones=Notificaciones::all();
        $residentes=Residentes::all();
        $residente=Residentes::where('id_usuario',\Auth::user()->id)->first();
        $estacionamientos=Estacionamientos::where('status','<>','Ocupado')->get();
        $inmuebles=Inmuebles::where('status','<>','No Disponible')->get();

        $buscarPInmuebles= PagosComunes::where('tipo','Inmueble')->where('anio',$anio)->get();
        $buscarPEstaciona= PagosComunes::where('tipo','Estacionamiento')->where('anio',$anio)->get();
        $anuncios=Anuncios::all();

        // dd(count($pagosComunesInmuebles));

        return view('home', compact('noticias', 'notificaciones','residentes','residente','buscarPInmuebles','buscarPEstaciona','anuncios'));
    }
}
