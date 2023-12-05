<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion;
use App\Models\DetalleCotizacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function updateDetalle(Request $req, $id)
    {
        $cotizacion = Cotizacion::find($id);

        if (!$cotizacion) {
            // Maneja el caso en que no se encuentra la cotización.
            return redirect()->route('admin.cotizacion.reply', $id)->with('error', 'No se encontró la cotización.');
        }

        // Actualiza el precio del producto utilizando DB::update
        $affectedRows = DB::table('detalle_cotizacion')
            ->where('cod_producto', $req->cod_producto)
            ->where('id_cotizacion', $id)
            ->where('rut_cliente', $cotizacion->rut_cliente) // Asegúrate de incluir el rut_cliente
            ->update(['precio_producto' => $req->precio]);

        if ($affectedRows > 0) {
            notify()->success('Producto actualizado exitosamente', 'Mantenedor de Cotizaciones');
            return redirect()->route('admin.cotizaciones.reply', $id);
        } else {
            // Maneja el caso en que no se encuentra el detalle.
            notify()->error('Detalle de Producto no encontrado', 'Mantenedor de Cotizaciones');
            return redirect()->route('admin.cotizaciones.reply', $id);
        }
    }

    public function sendUpdate(Request $req, $id) {
        $cotizacion = Cotizacion::find($id);

        if (!$cotizacion) {
            // Maneja el caso en que no se encuentra la cotización.
            return redirect()->route('admin.cotizaciones.reply', $id)->with('error', 'No se encontró la cotización.');
        }

        $monto_neto_total = ($cotizacion->detallesCotizacion->sum('precio_producto')) + ($cotizacion->precio_envio);
        $affectedRows = DB::table('cotizaciones')
            ->where('id', $id)
            ->update(['monto_neto' => $monto_neto_total, 'estado'=>1]);
        if($affectedRows>= 1) {
            return redirect()->route('admin.cotizaciones.index', $id)->with('success', 'Respuesta enviada con éxito');
        }
    }
}
