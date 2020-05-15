<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticias;
use App\Notificaciones;
use App\Residentes;
use App\PagosComunes;

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


        $buscarPInmuebles= PagosComunes::where('tipo','Inmueble')->where('anio',$anio)->get();
        $buscarPEstaciona= PagosComunes::where('tipo','Estacionamiento')->where('anio',$anio)->get();

        // dd(count($pagosComunesInmuebles));

        return view('home', compact('noticias', 'notificaciones','residentes','residente','buscarPInmuebles','buscarPEstaciona'));
    }
}
