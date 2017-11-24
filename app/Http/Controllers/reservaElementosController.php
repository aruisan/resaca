<?php

namespace resaca\Http\Controllers;

use resaca\Http\Requests;
use resaca\Http\Requests\reservasElementosRequest;
use resaca\Http\Controllers\Controller;
use resaca\elementos;
use resaca\ReservaElementos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use resaca\User;
use Session;

class reservaElementosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Misreservas($id)
    {
        $reservas = \DB::table('reservas_elementos')
                    ->select('usuarios.nombres as nom_user','usuarios.apellidos as ape_user','elementos.nombre as elemento','reservas_elementos.*')
                    ->join('usuarios', 'reservas_elementos.usuario_id', '=', 'usuarios.id')
                    ->join('elementos', 'reservas_elementos.elemento_id', '=', 'elementos.id')
                    ->where('usuario_id', '=', $id)
                    ->get();

        return view('especializaciones.index')->with('reservas', $reservas);

    }       

    public function confirmar($id)
    {
        $reservas = ReservaElementos::find($id);
        $reservas->confirmar = 1;
        $reservas->save();
        return redirect()->route('reservaElementos.index')->with('message','La Reserva se ha Confirmado');
    }

   public function index()
    {   
        $reservas = \DB::table('reservas_elementos')
                    ->select('users.name as nom_user','elementos.nombre as elemento','reservas_elementos.*')
                    ->join('users', 'reservas_elementos.usuario_id', '=', 'users.id')
                    ->join('elementos', 'reservas_elementos.elemento_id', '=', 'elementos.id')
                    ->get();
        return view('reservas_elementos.index')->with('reservas', $reservas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */


    public function create()
    {
        $usuarios = User::all();
        $elementos = elementos::all();
        return view('reservas_elementos.create', compact('usuarios', 'elementos'));
    }

    /**d
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(reservasElementosRequest $request)
    {

        if(  $request->fecha_servicio < \Carbon\Carbon::now()->format('Y-m-d'))
        {
            Session::flash('message-error','La Fecha no puede ser menor al dia de hoy '. \Carbon\Carbon::now()->format('Y-m-d'));
        }else{
        
            if($request->hhInicio >= $request->hhFinal)
            {
                Session::flash('message-error','La hora inicial no puede ser mayor o igual a la hora final');
            }else{
                $consulta = \DB::table('reservas_elementos')
                    ->where('fecha_servicio', '=' , $request->fecha_servicio)
                    ->where('elemento_id', '=', $request->elemento)
                    ->where('hora_inicio', '>', $request->hhInicio)
                    ->where('hora_final','<',$request->hhFinal)

                    ->orWhere('fecha_servicio', '=' , $request->fecha_servicio)
                    ->where('elemento_id', '=', $request->elemento)
                    ->where('hora_inicio', '<', $request->hhInicio)
                    ->where('hora_final','>',$request->hhFinal)

                    ->orWhere('fecha_servicio', '=' , $request->fecha_servicio)
                    ->where('elemento_id', '=', $request->elemento)
                    ->where('hora_inicio', '>', $request->hhFinal)
                    ->where('hora_final','<',$request->hhInicio)

                    ->orWhere('fecha_servicio', '=' , $request->fecha_servicio)
                    ->where('elemento_id', '=', $request->elemento)
                    ->where('hora_inicio', '<', $request->hhFinal)
                    ->where('hora_final','>',$request->hhInicio)
                    ->get();
                    if(count($consulta) > 0){
                        Session::flash('message-error','El tiempo solicitado no esta disponible ');
                    }else{
                        $reservas = new ReservaElementos;
                        $reservas->usuario_id = $request->input('usuario_id');
                        $reservas->elemento_id = $request->input('elemento');
                        $reservas->cantidad = $request->input('cantidad');
                        $reservas->detalle_reserva = $request->input('detalle_reserva');
                        $reservas->fecha_servicio = $request->input('fecha_servicio');
                        $reservas->hora_inicio = $request->input('hhInicio');
                        $reservas->hora_final = $request->input('hhFinal');
                        $reservas->save();

                        Session::flash('message','reserva al elemento creada correctamente');
                        return redirect()->route('reservaElementos.index');
                    }
            } 

        } 
          
        return redirect()->route('reservaElementos.create');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $reservas =ReservaElementos::find($id);
        if($reservas->confirmar == 1)
        {
            Session::flash('message-error','la reserva ya fue confirmada, no se puede editar');
            return redirect()->route('reservaElementos.index');
        }else{
            $usuarios = User::all();
            $elementos = elementos::all();
        
            return view('reservas_elementos.edit', compact('usuarios', 'elementos'))->with('reservas',$reservas);
        }  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(reservasElementosRequest $request, $id)
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
                $reservas =ReservaElementos::find($id);
                if($reservas->hora_inicio == $request->hhInicio and $reservas->hora_final == $request->hhFinal)
                {

                    $reservas = ReservaElementos::find($id);
                    $reservas->usuario_id = $request->input('usuario_id');
                    $reservas->elemento_id = $request->input('elemento');
                    $reservas->cantidad = $request->input('cantidad');
                    $reservas->detalle_reserva = $request->input('detalle_reserva');
                    $reservas->fecha_servicio = $request->input('fecha_servicio');
                    $reservas->hora_inicio = $request->input('hhInicio');
                    $reservas->hora_final = $request->input('hhFinal');
                    $reservas->save();

                    Session::flash('message','reserva al elemento se edito correctamente');
                    return redirect()->route('reservaElementos.index');

                }else
                {
                    $consulta = \DB::table('reservas_elementos')
                    ->where('fecha_servicio', '=' , $request->fecha_servicio)
                    ->where('elemento_id', '=', $request->elemento)
                    ->where('hora_inicio', '>', $request->hhInicio)
                    ->where('hora_final','<',$request->hhFinal)

                    ->orWhere('fecha_servicio', '=' , $request->fecha_servicio)
                    ->where('elemento_id', '=', $request->elemento)
                    ->where('hora_inicio', '<', $request->hhInicio)
                    ->where('hora_final','>',$request->hhFinal)

                    ->orWhere('fecha_servicio', '=' , $request->fecha_servicio)
                    ->where('elemento_id', '=', $request->elemento)
                    ->where('hora_inicio', '>', $request->hhFinal)
                    ->where('hora_final','<',$request->hhInicio)

                    ->orWhere('fecha_servicio', '=' , $request->fecha_servicio)
                    ->where('elemento_id', '=', $request->elemento)
                    ->where('hora_inicio', '<', $request->hhFinal)
                    ->where('hora_final','>',$request->hhInicio)
                    ->get();
                    if(count($consulta) > 0)
                    {
                        Session::flash('message-error','El tiempo solicitado no esta disponible ');
                    }else
                    {
                            $reservas = ReservaElementos::find($id);
                            $reservas->usuario_id = $request->input('usuario_id');
                            $reservas->elemento_id = $request->input('elemento');
                            $reservas->cantidad = $request->input('cantidad');
                            $reservas->detalle_reserva = $request->input('detalle_reserva');
                            $reservas->fecha_servicio = $request->input('fecha_servicio');
                            $reservas->hora_inicio = $request->input('hhInicio');
                            $reservas->hora_final = $request->input('hhFinal');
                            $reservas->save();

                        Session::flash('message','reserva al elemento se edito correctamente');
                        return redirect()->route('reservaElementos.index');
                    }
                }//else confirmacion disponibilidad hora

            } //else si hora inicio es mayor o igual a hora final

        } //else si las fechas son antiguas al dia de hoy
        return redirect('/reservaElementos/' . $id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $reservas =ReservaElementos::find($id);
        if($reservas->confirmar == 1)
        {
            Session::flash('message-error','la reserva ya fue confirmada, no se puede eliminar');
            return redirect()->route('reservaElementos.index');
        }else{
           $reservas = ReservaElementos::find($id);
            $reservas->delete();
            return redirect()->route('reservaElementos.index')->with('message','La Reserva del elemento se Elimino Correctamente');
        }  
    }

}
