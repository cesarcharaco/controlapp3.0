<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UsersAdmin;
use App\Http\Requests\AdminRequest;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin=UsersAdmin::all();

        return view('root.index',compact('admin'));
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
    public function store(AdminRequest $request)
    {
        //dd($request->all());
            

        dd('----------------');
        $user=new UsersAdmin();

        $user->name=$request->name;
        $user->rut=$request->rut;
        $user->email=$request->email;
        $user->status=$request->status;
        $user->save();

        $user2=new User();
        $user2->name=$request->name;
        $user2->rut=$request->rut;
        $user2->email=$request->email;
        $user2->tipo_usuario='Admin';
        $user2->password=Hash::make($data['password']);
        $user2->save();

        flash('Usuario Admin registrado con éxito!')->success()->important();
            return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_user)
    {
        dd($request->all());
        $this->validator($request->all());

        dd('----------------');

        if (is_null($request->cambiar)) {
            # en caso de no querer cambiar la contraseña
            $user= UsersAdmin::find($id_user);
            $email=$user->email;

            $user->name=$request->name;
            $user->rut=$request->rut;
            $user->email=$request->email;
            $user->status=$request->status;
            $user->save();

            $user2=User::where('email',$email)->first();
            $user2->name=$request->name;
            $user2->rut=$request->rut;
            $user2->email=$request->email;
            $user2->save();
        } else {
            # en caso de querer cambiar la contraseña
            $user= UsersAdmin::find($id_user);
            $email=$user->email;

            $user->name=$request->name;
            $user->rut=$request->rut;
            $user->email=$request->email;
            $user->status=$request->status;
            $user->save();

            $user2=User::where('email',$email)->first();
            $user2->name=$request->name;
            $user2->rut=$request->rut;
            $user2->email=$request->email;
            $user2->tipo_usuario='Admin';
            $user2->password=Hash::make($data['password']);
            $user2->save();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
