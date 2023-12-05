<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion;
use App\Models\DetalleCotizacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CotizacionController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $rut = Auth::user()->rut_cliente;
        $cotizaciones = Cotizacion::where('rut_cliente', $rut)->orderBy('created_at', 'desc')->get();
        return view('cotizaciones.index', compact('cotizaciones'));
    }

    public function view($id) {
        $userRut = auth()->user()->rut_cliente;
        $cotizacion = Cotizacion::find($id);
        $detalle_cotizacion = $cotizacion->detallesCotizacion;

        if($cotizacion->estado == 2) {
            return redirect()->back()->with('error', 'Tu cotización se encuentra facturada, revisa en tus facturas.');
        }

        if (!($cotizacion->rut_cliente == $userRut)) {
            return redirect()->back()->with('error', 'No tienes permisos para ver esta cotización.');
        }

        return view('cotizaciones.view', compact('detalle_cotizacion', 'cotizacion'));
    }

    public function update(Request $req, $id) {
        $cotizacion = Cotizacion::find($id);
        $cotizacion->update(['precio_envio'=>$req->precio_envio]);
        return redirect()->route('admin.cotizaciones.reply', $id);
    }

    public function updateDetalle(Request $req, $id, $cod_producto) {

        $cotizacion = Cotizacion::findOrFail($id);
        $detalle = $cotizacion->detallesCotizacion()
            ->where('cod_producto', $cod_producto)
            ->where('id_cotizacion', $id)
            ->first();

        if ($detalle) {
            $detalle->precio_producto = $req->precio;
            $detalle->save();
            return redirect()->route('admin.cotizacion.reply', $id)->with('success', 'Detalle actualizado exitosamente.');
        } else {
            // Maneja el caso en el que el detalle no se encuentra.
            return redirect()->route('admin.cotizacion.reply', $id)->with('error', 'No se encontró el detalle.');
        }
    }
}
