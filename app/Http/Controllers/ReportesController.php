<?php

namespace resaca\Http\Controllers;

use Illuminate\Http\Request;

use resaca\Http\Requests;
use resaca\Http\Controllers\Controller;
use \resaca\reservas_salas;
use \resaca\ReservaElementos;

class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reportes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function graficosSalas($ff_inicio, $ff_final)
    {
        $fecha = \Carbon\Carbon::now()->format('Y-m-d');

        if($ff_inicio == '' || $ff_final == '')
        {
            return 0;
        }else if($ff_inicio > $ff_final){
            return 1;
        }else{

        $inicio =  $ff_inicio;
        $final =    $ff_final;

            $sql = reservas_salas::whereBetween('fecha_servicio', [$inicio, $final])
                                    ->select(\DB::raw('COUNT(fecha_servicio) AS conteo'), 'fecha_servicio')
                                    ->groupBy('fecha_servicio')
                                    ->get();
       
            if($sql->count() == 0)
            {
                return 2;
            }else{
                 return $sql->toJson();
            }      

        }

    }

     public function graficosElementos($ff_inicio, $ff_final)
    {
        $fecha = \Carbon\Carbon::now()->format('Y-m-d');


        if($ff_inicio == '' || $ff_final == '')
        {
            return 0;
        }else if($ff_inicio > $ff_final){
            return 1;
        }else{

           $inicio =  $ff_inicio;
            $final =    $ff_final;

            $sql = ReservaElementos::whereBetween('fecha_servicio', [$inicio, $final])
                                    ->select(\DB::raw('COUNT(fecha_servicio) AS conteo'), 'fecha_servicio')
                                    ->groupBy('fecha_servicio')
                                    ->get();

            if($sql->count() == 0)
            {
                return 2;
            }else{
                 return $sql->toJson();
            }      

            

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
