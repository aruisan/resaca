<?php namespace resaca\Http\Controllers;

use resaca\Http\Requests;
use resaca\Http\Requests\tipo_elementoRequest;
use resaca\Http\Controllers\Controller;
use resaca\tipo_elementos;
use Illuminate\Http\Request;

class tipoElementosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		 $tipo_elementos = tipo_elementos::get();
        return view('tipo_elementos.index')->with('tipo_elementos', $tipo_elementos);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tipo_elementos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(tipo_elementoRequest $request)
	{
		
		$tipo_elementos = new tipo_elementos;
        $tipo_elementos->descripcion = $request->input('descripcion');

        $tipo_elementos->save();

        return redirect()->route('tipo_elementos.index')->with('message','Tipo de Elemento creado  Correctamente');
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
	 * Show the form for editing the specified tipo_elementos
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tipo_elementos = tipo_elementos::find($id);
        return view('tipo_elementos.edit')->with('tipo_elementos',$tipo_elementos);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 public function update(tipo_elementoRequest $request, $id)
    {
        $tipo_elementos = tipo_elementos::find($id);
        $tipo_elementos->descripcion = $request->input('descripcion');
        $tipo_elementos->save();
        return redirect()->route('tipo_elementos.index')->with('message','Tipo de Elemento Editado Correctamente');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
    {
        $tipo_elementos = tipo_elementos::find($id);
        $tipo_elementos->delete();
        return redirect()->route('tipo_elementos.index')>with('message','Tipo de Elemento Eliminado Correctamente');
    }

}
