<?php namespace resaca\Http\Controllers;

use resaca\Http\Requests;
use resaca\Http\Requests\elementos_salasRequest;
use resaca\Http\Controllers\Controller;
use resaca\salas;
use resaca\elementos_salas;
use resaca\elementos;

use Illuminate\Http\Request;

class elementos_salasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function ver($id)
	{
		 $elementos_salas = \DB::table('elementos_salas')
					->select('elementos.nombre as elemento','salas.nombre as sala','elementos_salas.*')
					->join('elementos', 'elementos_salas.elemento_id', '=', 'elementos.id')
					->join('salas', 'elementos_salas.sala_id', '=', 'salas.id')
					->where('sala_id', '=', $id)
					->get();
       return view('elementos_salas.index')->with('elementos_salas', $elementos_salas);

	}

	public function index()
	{
		 $elementos_salas = \DB::table('elementos_salas')
					->select('elementos.nombre as elemento','salas.nombre as sala','elementos_salas.*')
					->join('elementos', 'elementos_salas.elemento_id', '=', 'elementos.id')
					->join('salas', 'elementos_salas.sala_id', '=', 'salas.id')
					->get();
       return view('elementos_salas.index')->with('elementos_salas', $elementos_salas);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$salas = salas::all();
		$elementos = elementos::all();
		return view('elementos_salas.create', compact('salas','elementos'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(elementos_salasRequest $request)
	{
		$elementos_salas = new elementos_salas;
		$elementos_salas->sala_id = $request->input('sala_id');
		$elementos_salas->elemento_id = $request->input('elemento_id');
		$elementos_salas->cantidad = $request->input('cantidad');
		$elementos_salas->save();

		return redirect()->route('elementos_salas.index')->with('message','el Elemento en el Aula a sido creado Correctamente');
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
		$elemento =  \DB::table('elementos_salas')
					->select('elementos.nombre','elementos_salas.elemento_id')
					->join('elementos', 'elementos_salas.elemento_id', '=', 'elementos.id')
					->where('elementos_salas.id', '=', $id)
					->get();
		$sala =		\DB::table('elementos_salas')
					->select('salas.nombre','elementos_salas.sala_id')
					->join('salas', 'elementos_salas.sala_id', '=', 'salas.id')
					->where('elementos_salas.id', '=', $id)
					->get();
		$salas = salas::all();
		$elementos = elementos::all();
		 $elementos_salas =elementos_salas::find($id);
       return view('elementos_salas.edit', compact('salas','sala','elemento','elementos'))->with('elementos_salas',$elementos_salas);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(elementos_salasRequest $request, $id)
	{
		$elementos_salas = elementos_salas::find($id);
		$elementos_salas->sala_id = $request->input('sala_id');
        $elementos_salas->elemento_id = $request->input('elemento_id');
        $elementos_salas->cantidad = $request->input('cantidad');
        $elementos_salas->save();
        return redirect()->route('elementos_salas.index')->with('message','el Elemento en el Aula a sido editado Correctamente');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$elementos_salas = elementos_salas::find($id);
        $elementos_salas->delete();
        return redirect()->route('elementos_salas.index')->with('message','el Elemento en el Aula a sido Eliminado Correctamente');
	}

}
