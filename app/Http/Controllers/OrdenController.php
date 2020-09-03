<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orden;
use App\Elemento;
use App\Menu;
use App\OrdenItem;
use App\ElementoMenu;
use Illuminate\Support\Facades\DB;

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
		$elementos = Elemento::all();
		$menus = Menu::all();
		return view('ordenes.show')->withOrden($orden)->withMenus($menus)->withElementos($elementos);
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

	public function attach(Request $request, Orden $orden) 
	{
		$elemento_id = $request->get('elemento_id');
		$type = $request->get('elemento_type');

		$orden_item = new OrdenItem();
		$orden_item->orden_id = $orden->id;
		$orden_item->item_id = $elemento_id;
		$orden_item->cantidad = 1;
		$orden_item->item_type = $type;

		if ($type == 'menu') 
		{	
			$menu = Menu::find($elemento_id);
			$orden_item->es_custom = false;
			$orden_item->es_extra =false;
			$orden_item->precio = $menu->costo;
			$orden_item->save();

			foreach ($menu->elementos as $elemento) {
				$elemento_menu = ElementoMenu::where('menu_id', $menu->id)
					->where('elemento_id', $elemento->id)->firstOrFail();
				$sub_item = new OrdenItem();
				$sub_item->orden_id = $orden->id;
				$sub_item->item_id = $elemento->id;
				$sub_item->cantidad = $elemento_menu->cantidad;
				$sub_item->item_type = 'elemento';
				$sub_item->parent_id = $orden_item->id;
				$sub_item->es_custom = false;
				$sub_item->es_extra =false;
				$sub_item->precio = 0;
				$sub_item->save();
			}

			$orden->total += $menu->costo;
			$orden->save();

		} else {
			$elemento = Elemento::find($elemento_id);
			$orden_item->es_custom = false;
			$orden_item->es_extra =false;
			$orden_item->precio = $elemento->costo;
			$orden_item->save();
			$orden->total += $elemento->costo;
			$orden->save();
		}
		return redirect()->route('ordens.show', $orden)->with('success', '¡Orden actualizada!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Orden $orden)
	{
		$orden->delete();

		return redirect('/')->with('success', '¡Orden borrada!');
	}
}
