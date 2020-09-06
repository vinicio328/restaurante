<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Estudiante;

class PDFController extends Controller
{
    //
    public function PDF($id){
        $ordenitems = OrdenItems::FindOrFail($id);
    	$pdf = PDF::loadView('factura', compact('ordenitems'));
    	return $pdf->stream('factura.pdf');

    }
    
}
