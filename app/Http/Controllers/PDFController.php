<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Orden;
use App\Menu;
use App\Elemento;
use App\ElemntoMenu;
use App\MenuItem;

class PDFController extends Controller
{
    public function PDF($id){
        $orden = Orden::FindOrFail($id);
        $items = $orden->menuItems->whereNull('parent_id');
    	$pdf = PDF::loadView('factura.factura', compact('orden', 'items'));
    	return $pdf->stream('factura'.$id.'.pdf');
    }
    
}
