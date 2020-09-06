<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orden;
use App\Elemento;
use App\Menu;
use App\OrdenItem;
use App\ElementoMenu;
use Illuminate\Support\Facades\DB;

class OrdenItemController extends Controller
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
        //
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
    public function edit(Orden $orden, $id)
    {
        $orden_item = OrdenItem::find($id);
        //$elementos = Elemento::where('id', '!=', $id);
        $elementos = Elemento::where('id', '!=', $orden_item->elemento->id)->get();

        return view('ordenitems.edit')
        ->withElementos($elementos)
        ->withOrdenItem($orden_item)
        ->withOrden($orden);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orden $orden, $id)
    {
        $orden_item = OrdenItem::find($id);
        $elemento_id = $request->get('elemento_id');
        $elemento = Elemento::find($elemento_id);
        $menu = OrdenItem::find($orden_item->parent_id);
        $nuevo_item = new OrdenItem();
        $nuevo_item->orden_id = $orden->id;
        $nuevo_item->item_id = $elemento_id;
        $nuevo_item->cantidad = 1;
        $nuevo_item->item_type = 'elemento';
        $nuevo_item->es_custom = true;
        $nuevo_item->precio = $elemento->costo;
        $nuevo_item->parent_id = $menu->id;
        $nuevo_item->save();
        
        if ($orden_item->es_custom) {
            $menu->precio -= $orden_item->precio;
            $orden->total -= $orden_item->precio;
        }

        $menu->precio += $elemento->costo;
        $menu->save();

        $orden->total += $elemento->costo;
        $orden->save();

        $nuevo_item->save();

        $orden_item->delete();
        return redirect()->route('ordens.show', $orden)->with('success', '¡Orden actualizada!');

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
