<?php

namespace resaca\Http\Controllers;


use resaca\Http\Requests\userRequest;
use resaca\Http\Requests;
use resaca\Http\Controllers\Controller;
use resaca\User;
use Auth;
use Session;
use Redirect;

use Illuminate\Http\Request;

class UserController extends Controller
{


    public function __construct()
    {
    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
      if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']]))
        {
            if(Auth::user()->admin == 1)
                {
                    return Redirect::to('reservaElementos');
                }else{
                    return Redirect::to('misElementos');
                }     
        }
        Session::flash('message-error', 'Datos son incorrectos');
        return Redirect::to('/');
    }


    public function index()
    {
        $user = User::get();
        return view('users.index')->with('users', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
      public function store(userRequest $request)
    {   
        $ingresar = new User;
        $ingresar->name = $request->name;
        $ingresar->email = $request->email;
        $ingresar->password = bcrypt($request->password);
        $ingresar->admin = $request->admin;
        $ingresar->save();
 
        return redirect()->route('users.index')->with('message','usuario '.$request->name.' creado Correctamente');
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
       $users = User::find($id);
        return view('users.edit')->with('user',$users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $actualizar = User::find($id);
        if($request->password != "")
        {
        $actualizar->password = bcrypt($request->password);
        }

        $actualizar->name = $request->name;
        $actualizar->email = $request->email; 
        $actualizar->admin = $request->admin;
        $actualizar->save();

        Session::flash('message','Usuario '.$request->name.' Editado con exito');
        return redirect()->route('users.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        User::destroy($id);
        Session::flash('message-error','Usuario  Borrado con exito');
        return redirect()->route('users.index');
    }
}
