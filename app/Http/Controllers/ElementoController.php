<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Elemento;
use App\Http\Requests\TemplateForm;


class ElementoController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$elementos = Elemento::all();
		return view('elementos.index', compact('elementos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return $this->edit(new Elemento());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		return $this->update($request, new Elemento());		
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
	public function edit(Elemento $elemento)
	{
		return view('elementos.edit')->withElemento($elemento);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Elemento $elemento)
	{
		$request->validate([
			'nombre'=>'required',
			'descripcion'=>'required',
			'costo'=>'required'
		]);

		$elemento->nombre = $request->get('nombre');
		$elemento->descripcion = $request->get('descripcion');
		$elemento->sin_costo = $request->has('sin_costo');
		$elemento->costo = $request->has('sin_costo') ? 0 : $request->get('costo');

		$elemento->save();
		return redirect('/elementos')->with('success', '¡Elemento guardado!');
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
