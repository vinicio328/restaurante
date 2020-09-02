<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orden;

class OrdenController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$orden = new Orden();
		return view('ordenes.edit')->withOrden($orden);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		return $this->update($request, new Orden());  
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Orden $orden)
	{
		return view('ordenes.show')->withOrden($orden);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Orden $orden)
	{
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Orden $orden)
	{
		$nombre = $request->get('nombre');
		$nit = $request->get('nit');

		if (!isset($nombre) || empty($nombre)) 
		{
			$nombre = "CF";
		}

		if (!isset($nit) || empty($nit)) 
		{
			$nit = "CF";
		}

		$orden->nombre = $nombre;
		$orden->nit = $nit;
		$orden->total = 0;
		$orden->save();

		return redirect()->route('ordenes.show', $orden)->with('success', '¡Orden creada!');
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
