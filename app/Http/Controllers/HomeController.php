<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticias;
use App\Notificaciones;
use App\Residentes;
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
        $noticias=Noticias::all();
        $notificaciones=Notificaciones::all();
        $residentes=Residentes::all();
        
        $residente=Residentes::where('id_usuario',\Auth::user()->id)->first();

        return view('home', compact('noticias', 'notificaciones','residentes','residente'));
    }
}
