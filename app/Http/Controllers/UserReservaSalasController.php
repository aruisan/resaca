<?php

namespace resaca\Http\Controllers;

use resaca\Http\Requests;
use resaca\Http\Requests\reservasSalasRequest;
use resaca\Http\Controllers\Controller;
use resaca\salas;
use resaca\Reservas_salas;
use resaca\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use Auth;

class UserReservaSalasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        $reservas = \DB::table('reservas_salas')
                    ->select('users.name as nom_user','salas.nombre as elemento','reservas_salas.*')
                    ->join('users', 'reservas_salas.usuario_id', '=', 'users.id')
                    ->join('salas', 'reservas_salas.sala_id', '=', 'salas.id')
                    ->where('usuario_id', Auth::user()->id)
                    ->get();

         $generales = \DB::table('reservas_salas')
                    ->select('users.name as nom_user','salas.nombre as elemento','reservas_salas.*')
                    ->join('users', 'reservas_salas.usuario_id', '=', 'users.id')
                    ->join('salas', 'reservas_salas.sala_id', '=', 'salas.id')
                    ->get();
        return view('misSalas.index', compact('reservas', 'generales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $elementos = salas::All();
        return view('misSalas.create', compact('elementos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(reservasSalasRequest $request)
    {
         if(  $request->fecha_servicio < \Carbon\Carbon::now()->format('Y-m-d'))
        {
            Session::flash('message-error','La Fecha no puede ser menor al dia de hoy '. \Carbon\Carbon::now()->format('Y-m-d'));
        }else{
        
            if($request->hhInicio >= $request->hhFinal)
            {
                Session::flash('message-error','La hora inicial no puede ser mayor o igual a la hora final');
            }else{
                $consulta = \DB::table('reservas_salas')
                    ->where('fecha_servicio', '=' , $request->fecha_servicio)
                    ->where('sala_id', '=', $request->sala_id)
                    ->where('hora_inicio', '>', $request->hhInicio)
                    ->where('hora_final','<',$request->hhFinal)

                    ->orWhere('fecha_servicio', '=' , $request->fecha_servicio)
                    ->where('sala_id', '=', $request->sala_id)
                    ->where('hora_inicio', '<', $request->hhInicio)
                    ->where('hora_final','>',$request->hhFinal)

                    ->orWhere('fecha_servicio', '=' , $request->fecha_servicio)
                    ->where('sala_id', '=', $request->sala_id)
                    ->where('hora_inicio', '>', $request->hhFinal)
                    ->where('hora_final','<',$request->hhInicio)

                    ->orWhere('fecha_servicio', '=' , $request->fecha_servicio)
                    ->where('sala_id', '=', $request->sala_id)
                    ->where('hora_inicio', '<', $request->hhFinal)
                    ->where('hora_final','>',$request->hhInicio)
                    ->get();
                    if(count($consulta) > 0){
                        Session::flash('message-error','El tiempo solicitado no esta disponible ');
                    }else{
                        $reservas = new reservas_salas;
                        $reservas->usuario_id = Auth::user()->id;
                        $reservas->sala_id = $request->input('sala_id');
                        $reservas->detalle_reserva = $request->input('detalle_reserva');
                        $reservas->fecha_servicio = $request->input('fecha_servicio');
                        $reservas->hora_inicio = $request->input('hhInicio');
                        $reservas->hora_final = $request->input('hhFinal');
                        $reservas->save();

                        Session::flash('message','reserva al elemento creada correctamente');
                        return redirect()->route('misSalas.index');
                    }
            } 

        } 
          
        return redirect()->route('misSalas.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservas =reservas_salas::find($id);
        if($reservas->confirmar == 1)
        {
            Session::flash('message-error','la reserva ya fue confirmada, no se puede editar');
            return redirect()->route('misSalas.index');
        }else{
            $usuarios = User::all();
            $elementos = salas::all();
        
            return view('misSalas.edit', compact('usuarios', 'elementos'))->with('reservas',$reservas);
        }  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(reservasSalasRequest $request, $id)
    {
       if(  $request->fecha_servicio < \Carbon\Carbon::now()->format('Y-m-d'))
        {
            Session::flash('message-error','La Fecha no puede ser menor al dia de hoy '. \Carbon\Carbon::now()->format('Y-m-d'));
        }else
        {
        
            if($request->hhInicio >= $request->hhFinal)
            {
                Session::flash('message-error','La hora inicial no puede ser mayor o igual a la hora final '. $request->hhInicio. ' >= ' .$request->hhFinal);
            }else
            {
                $reservas =reservas_salas::find($id);
                if($reservas->hora_inicio == $request->hhInicio and $reservas->hora_final == $request->hhFinal)
                {

                    $reservas = reservas_salas::find($id);
                    $reservas->usuario_id = Auth::user()->id;
                    $reservas->sala_id = $request->input('sala_id');
                    $reservas->detalle_reserva = $request->input('detalle_reserva');
                    $reservas->fecha_servicio = $request->input('fecha_servicio');
                    $reservas->hora_inicio = $request->input('hhInicio');
                    $reservas->hora_final = $request->input('hhFinal');
                    $reservas->save();

                    Session::flash('message','reserva al elemento se edito correctamente');
                    return redirect()->route('misSalas.index');

                }else
                {
                    $consulta = \DB::table('reservas_salas')
                    ->where('fecha_servicio', '=' , $request->fecha_servicio)
                    ->where('sala_id', '=', $request->sala_id)
                    ->where('hora_inicio', '>', $request->hhInicio)
                    ->where('hora_final','<',$request->hhFinal)

                    ->orWhere('fecha_servicio', '=' , $request->fecha_servicio)
                    ->where('sala_id', '=', $request->sala_id)
                    ->where('hora_inicio', '<', $request->hhInicio)
                    ->where('hora_final','>',$request->hhFinal)

                    ->orWhere('fecha_servicio', '=' , $request->fecha_servicio)
                    ->where('sala_id', '=', $request->sala_id)
                    ->where('hora_inicio', '>', $request->hhFinal)
                    ->where('hora_final','<',$request->hhInicio)

                    ->orWhere('fecha_servicio', '=' , $request->fecha_servicio)
                    ->where('sala_id', '=', $request->sala_id)
                    ->where('hora_inicio', '<', $request->hhFinal)
                    ->where('hora_final','>',$request->hhInicio)
                    ->get();
                    if(count($consulta) > 0)
                    {
                        Session::flash('message-error','El tiempo solicitado no esta disponible ');
                    }else
                    {
                            $reservas = reservas_salas::find($id);
                            $reservas->usuario_id = Auth::user()->id;
                            $reservas->sala_id = $request->input('sala_id');
                            $reservas->detalle_reserva = $request->input('detalle_reserva');
                            $reservas->fecha_servicio = $request->input('fecha_servicio');
                            $reservas->hora_inicio = $request->input('hhInicio');
                            $reservas->hora_final = $request->input('hhFinal');
                            $reservas->save();

                        Session::flash('message','reserva al elemento se edito correctamente');
                        return redirect()->route('misSalas.index');
                    }
                }//else confirmacion disponibilidad hora

            } //else si hora inicio es mayor o igual a hora final

        } //else si las fechas son antiguas al dia de hoy
        return redirect('/misSalas/' . $id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservas =reservas_salas::find($id);
        if($reservas->confirmar == 1)
        {
            Session::flash('message-error','la reserva ya fue confirmada, no se puede eliminar');
            return redirect()->route('misSalas.index');
        }else{
            $reservas->delete();
             Session::flash('message','La Reserva del elemento se Elimino Correctamente');
            return redirect()->route('misSalas.index');
        }  
    }
}
