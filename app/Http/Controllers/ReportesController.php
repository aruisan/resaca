<?php

namespace resaca\Http\Controllers;

use Illuminate\Http\Request;

use resaca\Http\Requests;
use resaca\Http\Controllers\Controller;
use \resaca\reservas_salas;
use \resaca\ReservaElementos;
use \resaca\salas;
use \resaca\elementos;

class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salas = salas::All();
        $elementos = elementos::All();
        return view('reportes.index')->with('salas', $salas)->with('elementos', $elementos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function graficosSalas($ff_inicio, $ff_final, $estado, $salas)
    {
        $fecha = \Carbon\Carbon::now()->format('Y-m-d');

        if($ff_inicio == '' || $ff_final == '')
        {
            return 0;
        }else if($ff_inicio > $ff_final)
        {
            return 1;
        }else if($estado == '*' & $salas == '*'){
            $sql = reservas_salas::whereBetween('fecha_servicio', [$ff_inicio, $ff_final])
                                ->select(\DB::raw('COUNT(fecha_servicio) AS conteo'), 'salas.nombre as objeto')
                                ->join('salas', 'reservas_salas.sala_id', '=', 'salas.id')
                                ->groupBy('objeto')
                                ->get();     

        }else if($estado == '*'){
            $sql = reservas_salas::whereBetween('fecha_servicio', [$ff_inicio, $ff_final])
                                ->select(\DB::raw('COUNT(fecha_servicio) AS conteo'), 'salas.nombre as objeto')
                                ->join('salas', 'reservas_salas.sala_id', '=', 'salas.id')
                                ->where('sala_id', $salas)
                                ->groupBy('objeto')
                                ->get();     
        }else if($salas == '*'){
            $sql = reservas_salas::whereBetween('fecha_servicio', [$ff_inicio, $ff_final])
                                ->select(\DB::raw('COUNT(fecha_servicio) AS conteo'), 'salas.nombre as objeto')
                                ->join('salas', 'reservas_salas.sala_id', '=', 'salas.id')
                                ->where('confirmar', $estado)
                                ->groupBy('objeto')
                                ->get();  
        }else{
            $sql = reservas_salas::whereBetween('fecha_servicio', [$ff_inicio, $ff_final])
                                ->where('sala_id', $salas)
                                ->where('confirmar', $estado)
                                ->select(\DB::raw('COUNT(fecha_servicio) AS conteo'), 'salas.nombre as objeto')
                                ->join('salas', 'reservas_salas.sala_id', '=', 'salas.id')
                                ->groupBy('objeto')
                                ->get(); 
        }


          if($sql->count() == 0)
            {
                return 2;
            }else{
                 return $sql->toJson();
            } 

    }

    public function graficosElementos($ff_inicio, $ff_final, $estado, $elementos)
    {
        $fecha = \Carbon\Carbon::now()->format('Y-m-d');


        if($ff_inicio == '' || $ff_final == '')
        {
            return 0;
        }else if($ff_inicio > $ff_final)
        {
            return 1;
        }else if($estado == '*' & $elementos == '*')
        {
            $sql = ReservaElementos::whereBetween('fecha_servicio', [$ff_inicio, $ff_final])
                                ->select(\DB::raw('COUNT(fecha_servicio) AS conteo'), 'elementos.nombre as objeto')
                                ->join('elementos', 'reservas_elementos.elemento_id', '=', 'elementos.id')
                                ->groupBy('objeto')
                                ->get();     

        }else if($estado == '*'){
            $sql = ReservaElementos::whereBetween('fecha_servicio', [$ff_inicio, $ff_final])
                                ->select(\DB::raw('COUNT(fecha_servicio) AS conteo'), 'elementos.nombre as objeto')
                                ->join('elementos', 'reservas_elementos.elemento_id', '=', 'elementos.id')
                                ->where('elemento_id', $elementos)
                                ->groupBy('objeto')
                                ->get();     
        }else if($elementos == '*'){
            $sql = ReservaElementos::whereBetween('fecha_servicio', [$ff_inicio, $ff_final])
                                ->select(\DB::raw('COUNT(fecha_servicio) AS conteo'), 'elementos.nombre as objeto')
                                ->join('elementos', 'reservas_elementos.elemento_id', '=', 'elementos.id')
                                ->where('confirmar', $estado)
                                ->groupBy('objeto')
                                ->get();  
        }else{
            $sql = ReservaElementos::whereBetween('fecha_servicio', [$ff_inicio, $ff_final])
                                ->where('elemento_id', $elementos)
                                ->where('confirmar', $estado)
                                ->select(\DB::raw('COUNT(fecha_servicio) AS conteo'), 'elementos.nombre as objeto')
                                ->join('elementos', 'reservas_elementos.elemento_id', '=', 'elementos.id')
                                ->groupBy('objeto')
                                ->get(); 
        }


          if($sql->count() == 0)
            {
                return 2;
            }else{
                 return $sql->toJson();
            } 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
