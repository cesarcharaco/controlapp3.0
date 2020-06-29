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
use App\UsersAdmin;
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
        //toastr()->warning('Éxito!', 'Usuario Admin registrado');
        $entrar="";
        $id_admin=id_admin(\Auth::user()->email);
        if(\Auth::user()->tipo_usuario=="Admin"){
            $buscar=UsersAdmin::find($id_admin);
            if ($buscar->status=="activo") {
                $entrar="Si";
            }
        }
        if (($entrar=="Si" && \Auth::user()->tipo_usuario=="Admin") || \Auth::user()->tipo_usuario!="Admin") {
            $anio=Date('Y');
            if (\Auth::user()->tipo_usuario=="Residente") {
                $residente=Residentes::where('id_usuario',\Auth::user()->id)->first();
                $noticias=Noticias::where('id_admin',$residente->id_admin)->get();
                $notificaciones=Notificaciones::where('id_admin',$residente->id_admin)->get();
            } else {
                $noticias=Noticias::where('id_admin',$id_admin)->get();
                $notificaciones=Notificaciones::where('id_admin',$id_admin)->get();
                # code...
            }
            

            $residentes=Residentes::where('id_admin',$id_admin)->get();
            $residente=Residentes::where('id_usuario',\Auth::user()->id)->first();
            $estacionamientos=Estacionamientos::where('status','<>','Ocupado')->where('id_admin',$id_admin)->get();
            $inmuebles=Inmuebles::where('status','<>','No Disponible')->where('id_admin',$id_admin)->get();

            $buscarPInmuebles= PagosComunes::where('tipo','Inmueble')->where('anio',$anio)->where('id_admin',$id_admin)->get();
            $buscarPEstaciona= PagosComunes::where('tipo','Estacionamiento')->where('anio',$anio)->where('id_admin',$id_admin)->get();
            $anuncios=Anuncios::all();
            $users_admin = UsersAdmin::all();

            //dd('-------------');

            return view('home', compact('noticias', 'notificaciones','residentes','residente','buscarPInmuebles','buscarPEstaciona','anuncios','users_admin'));    
        } else {
            # code...
            
            flash('Usuario Suspendido','warning')->important();
            return redirect()->to('/');
        }
        
        
    }
}
