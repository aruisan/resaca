<?php namespace resaca\Http\Controllers;

use resaca\Http\Requests;
use resaca\Http\Requests\salasRequest;
use resaca\Http\Controllers\Controller;
use resaca\salas;
use Illuminate\Http\Request;

class salasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		 $salas = salas::get();
        return view('salas.index')->with('salas', $salas);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('salas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(salasRequest $request)
	{
		$salas = new salas;
        $salas->nombre = $request->input('nombre');
        $salas->id_aula_ryca = $request->input('id_aula_ryca');

        $salas->save();

        return redirect()->route('salas.index')->with('message','Aula creada Correctamente');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$salas = salas::find($id);
        return view('salas.edit')->with('salas',$salas);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(salasRequest $request, $id)
	{
		 $salas = salas::find($id);
        $salas->nombre = $request->input('nombre');
        $salas->id_aula_ryca = $request->input('id_aula_ryca');
        $salas->save();
        return redirect()->route('salas.index')->with('message','Aula editada Correctamente');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$salas = salas::find($id);
        $salas->delete();
        return redirect()->route('salas.index')->with('message','Aula Eliminada Correctamente');

	}

}
