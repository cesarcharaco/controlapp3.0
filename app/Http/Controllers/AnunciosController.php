<?php

namespace App\Http\Controllers;

use App\Anuncios;
use Illuminate\Http\Request;
use App\Http\Requests\AnunciosRequest;
use App\Http\Requests\AnunciosUpdateRequest;
use App\AdminsAnuncios;
use App\UsersAdmin;
use App\Empresas;
use App\EmpresasAnuncios;
use DB;
class AnunciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->tipo_usuario == 'root'){
            $empresas = Empresas::all();
            $users_admin = UsersAdmin::all();
            $anuncios=Anuncios::all();
            $EmpresasAnuncios=EmpresasAnuncios::all();
            return view('anuncios.index',compact('anuncios','users_admin','empresas','EmpresasAnuncios'));
        }else{
            toastr()->warning('no puede acceder!!', 'ACCESO DENEGADO');
            return redirect()->back();
        }
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
        // dd(date('Y-m-d'));
        $validacion=$this->validar_imagen($request->file('imagen'));
        
        if(!$validacion['valida']){
            toastr()->warning('intente otra vez!!', $validacion['mensaje'].'');
            return redirect()->back();
        }
        $codigo=$this->generarCodigo();
        //$codigo="nnn";
        
            $validatedData = $request->validate([
                'imagen' => 'mimes:jpeg,png'
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
            
            $datos = $request['admins'];
            //dd($datos);
            if ($request->admins_todos!="1") {
                //dd('hola mundo');                
                foreach($datos as $selected){
                    //dd($selected);
                    $admins_anuncios = new AdminsAnuncios();
                    $admins_anuncios->id_users_admin=$selected;
                    $admins_anuncios->id_anuncios=$anuncio->id;
                    $admins_anuncios->save();
                }

            } else {
                $users_admin = UsersAdmin::where('status','activo')->get();
                $count=count($users_admin);
                //dd(($count));
                //$admins_anuncios = array();
                for($i=1;$i<=$count;$i++){
                    \DB::table('admins_has_anuncios')->insert([
                        'id_users_admin' => $i,
                        'id_anuncios' => $anuncio->id
                    ]);
                }

                /*foreach ($users_admin as $key) {
                    dd($key);
                    $admins_anuncios = new AdminsAnuncios();
                    $admins_anuncios->id_users_admin=$value;
                    $admins_anuncios->id_anuncios=$anuncio->id;
                    $admins_anuncios->save();
                }*/
                 
            }
            $fecha_orden=date('Y-m-d');
            $adminAnuncios=\DB::table('empresas_has_anuncios')->insert([
                'id_empresa'    => $request->id_empresa,
                'id_anuncios'   => $anuncio->id,
                // 'id_planP'      => $request->planP,
                'fecha_orden'   => $fecha_orden
            ]);


            
       
        toastr()->success('con éxito!!','Anuncio registrado');
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
    public function update(AnunciosUpdateRequest $request, $id_anuncio)
    {
        //dd($request->all());

        $codigo=$this->generarCodigo();
        //$codigo="nnn";
        $cambio=0;
        
        $anuncio=Anuncios::find($request->id_anuncio);
        if($request->imagen!==null){
            $validacion=$this->validar_imagen($request->file('imagen'));

            if(!$validacion['valida']){
                toastr()->warning('intente otra vez!!', $validacion['mensaje'].'');
                return redirect()->back();
            }else{
            $nombre=$anuncio->nombre_img;
            unlink(public_path().'/images_anuncios/'.$nombre);
            $file=$request->file('imagen');

            $name=$codigo."_".$file->getClientOriginalName();
            $file->move(public_path().'/images_anuncios/', $name);  
            $name = $name;
            $url ='images_anuncios/'.$name;
            $cambio=1;
            }
        }
            
        //dd('asasa');
            $anuncio->titulo=$request->titulo;
            $anuncio->link=$request->link;
            $anuncio->descripcion=$request->descripcion;
            if($cambio==1){
            $anuncio->nombre_img=$name;
            $anuncio->url_img=$url;
            }
            $anuncio->save();

            toastr()->success('con éxito!!', 'Anuncio actualizado');
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Anuncios  $anuncios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //dd($request->all());
        $anuncio=Anuncios::find($request->id);
        $nombre=$anuncio->nombre_img;
        if ($anuncio->delete()) {
            unlink(public_path().'/images_anuncios/'.$nombre);
            toastr()->success('con éxito!!', 'Anuncio eliminado');
            return redirect()->back();
        } else {
            toastr()->error('intente otra vez!!', 'El Anuncio no pudo ser eliminado');
            return redirect()->back();
        }
        

    }

    protected function generarCodigo() {
     $key = '';
     $pattern = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
     $max = strlen($pattern)-1;
     for($i=0;$i < 4;$i++){
        $key .= $pattern=mt_rand(0,$max);
    }
     return $key;
    }

    protected function validar_imagen($imagen)
    {
        //dd($imagen);
        $mensaje="";
        $valida=true;
        $img=getimagesize($imagen);
        $size=$imagen->getClientSize();
        $width=$img[0];
        $higth=$img[1];

        //dd($size."-".$width."-".$higth);

        if ($size>819200) {
            $mensaje="La imagen excede el límite de tamaño de 800 KB ";
            $valida=false;
        }

        if ($width>1024) {
            $mensaje.=" | La imagen excede el límite de ancho de 1024 KB ";
            $valida=false;
        }

        if ($higth>800) {
            $mensaje.=" | La imagen excede el límite de altura de 800 KB ";
            $valida=false;
        }

        $respuesta=['mensaje' => $mensaje,'valida' => $valida];

        return $respuesta;
    }
}
