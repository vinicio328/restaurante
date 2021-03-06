<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Elemento;
use App\ElementoMenu;
use App\Http\Requests\TemplateForm;

class MenuController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		
		$menus = Menu::all();
		return view('menus.index', compact('menus'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return $this->edit(new Menu());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		return $this->update($request, new Menu());     
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Menu $menu)
	{
		$elementoAsignado = $menu->elementos;
		$todosElementos = Elemento::all();
		$elementos = $todosElementos->diff($elementoAsignado);
		return view('menus.show')->withMenu($menu)->withElementos($elementos);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Menu $menu)
	{
		return view('menus.edit')->withMenu($menu);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Menu $menu)
	{
		$request->validate([
			'nombre'=>'required',
			'descripcion'=>'required',
			'costo'=>'required'
		]);

		$menu->nombre = $request->get('nombre');
		$menu->descripcion = $request->get('descripcion');
		$menu->costo = $request->get('costo');

		$menu->save();
		return redirect('/menus')->with('success', '¡Menu guardado!');
	}

	public function updateItem(Request $request, Menu $menu) 
	{
		$elemento_id = $request->get('elemento_id');
		$cantidad = $request->get('cantidad');
		$elemento = ElementoMenu::find($elemento_id);
		$elemento->cantidad = $cantidad;
		$elemento->save();
		return redirect()->route('menus.show', $menu)->with('success', '¡Menu guardado!');
	}

	public function attach(Request $request, Menu $menu)
	{
		$menu->elementos()->attach($request->get('elemento_id'));
		return redirect()->route('menus.show', $menu)->with('success', '¡Menu guardado!');
	}

	public function detach(Request $request, Menu $menu)
	{
		$menu->elementos()->detach($request->get('elemento_id'));
		return redirect()->route('menus.show', $menu)->with('success', '¡Menu guardado!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Menu $menu)
	{
		$menu->delete();

		return redirect('/menus')->with('success', '¡Menu borrado!');
	}
}
