<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticias;
use App\Notificaciones;

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

        return view('home', compact('noticias', 'notificaciones'));
    }
}
