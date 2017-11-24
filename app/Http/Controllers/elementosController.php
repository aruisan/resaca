<?php namespace resaca\Http\Controllers;

use resaca\Http\Requests;
use resaca\Http\Requests\elementoRequest;
use resaca\Http\Controllers\Controller;
use resaca\elementos;
use resaca\tipo_elementos;
use Illuminate\Http\Request;

class elementosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	

	public function index()
	{	
	$elementos = \DB::table('tipo_elementos')
					->select('elementos.*','tipo_elementos.descripcion as tipo')
					->join('elementos', 'tipo_elementos.id', '=', 'elementos.tipo_elemento_id')
					->get();
            return view('elementos.index')->with('elementos', $elementos);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		$tipo = tipo_elementos::all();
		return view('elementos.create', compact('tipo'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(elementoRequest $request)
	{
		$elementos = new elementos;
		$elementos->nombre = $request->input('nombre');
		$elementos->descripcion = $request->input('descripcion');
		$elementos->serial = $request->input('serial');
        $elementos->tipo_elemento_id = $request->input('tipo_elemento_id');
        $elementos->save();
        

        return redirect()->route('elementos.index')->with('message','Elemento creado con exito');
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
		$tipo = \DB::table('elementos')
					->select('tipo_elementos.descripcion','elementos.tipo_elemento_id')
					->join('tipo_elementos', 'elementos.tipo_elemento_id', '=', 'tipo_elementos.id')
					->where('elementos.id', '=', $id)
					->get();
					//dd($tipo);
		$tipos = tipo_elementos::all();
		$elementos = elementos::find($id);
        return view('elementos.edit', compact('tipo','tipos'))->with('elementos',$elementos);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 public function update(elementoRequest $request, $id)
    {
        $elementos = elementos::find($id);
		$elementos->nombre = $request->input('nombre');
		$elementos->descripcion = $request->input('descripcion');
		$elementos->serial = $request->input('serial');
        $elementos->tipo_elemento_id = $request->input('tipo_elemento_id');
        $elementos->save();
        return redirect()->route('elementos.index')->with('message','Elemento Editado Correctamente');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
    {
        $elementos = elementos::find($id);
        $elementos->delete();
        return redirect()->route('elementos.index')->with('message','Elemento Eliminado Correctamente');
    }

}
