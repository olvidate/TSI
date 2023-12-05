<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion;
use App\Models\DetalleCotizacion;
use App\Models\DetalleFactura;
use App\Models\Factura;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FacturasController extends Controller
{
    public function generatePdf($id) {
        $factura = Factura::find($id);
        $detalles_factura = $factura->detallesFactura;
        dd($factura);
        $pdf = PDF::loadView('pdf.factura', [
            'factura' => $factura,
            'detalles' => $detalles_factura,
        ]);
        $name = 'factura-n' . $factura->id . '.pdf';
        return $pdf->download($name);
    }

    public function store(Request $req) {
        $cotizacion = Cotizacion::find($req->cotizacionId);


        $userRut = auth()->user()->rut_cliente;
        if (!($cotizacion->rut_cliente == $userRut)) {
            return redirect()->route('home.index')->with('error', 'No tienes permisos para ver esta factura');
        }

        $exists = Factura::where('id_cotizacion', $cotizacion->id)->count();

        if ($exists > 0) {
            return redirect()->route('home.index')->with('error', 'Ya existe la factura de este producto');
        }

        $cotizacion->update(['estado'=>'2']);

        $detalle_cotizacion = $cotizacion->detallesCotizacion;
        $monto_neto = (($detalle_cotizacion->sum('precio_producto') + $cotizacion->precio_envio));
        $factura = new Factura();
        $factura->rut_cliente = $cotizacion->rut_cliente;
        $factura->id_cotizacion = $cotizacion->id;
        $factura->fecha_emision = Carbon::now();
        $factura->monto_neto = $monto_neto;
        $factura->save();

        foreach ($detalle_cotizacion as $item) {
            if(!$item->precio_producto == null) {
                $detalle_factura = new DetalleFactura();
                $detalle_factura->id_factura = $factura->id;
                $detalle_factura->rut_cliente = $factura->rut_cliente;
                $detalle_factura->cod_producto = $item->cod_producto;
                $detalle_factura->cantidad = $item->cantidad_producto;
                $detalle_factura->precio = $item->precio_producto;
                $detalle_factura->save();
            }
        }

        return redirect()->route('factura.view', $factura->id);
    }
}
