<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Cotizacion;
use App\Models\DetalleCotizacion;
use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index() {
        $productos = Producto::all();
        return view('cart.checkout', compact('productos'));
    }
    public function add(Request $request) {
        $producto = Producto::find($request->id);
        if (empty($producto)) {
            return redirect('home.index');
        }

        Cart::add($producto->cod_producto, $producto->nombre, 1, 1000);

        notify()->success('Añadiste el producto ' . $producto->nombre . ' al carrito', 'Nuevo producto agregado');
        return redirect()->back();
    }

    public function remove($rowId) {
        Cart::remove($rowId);
        return redirect()->back();
    }

    public function increment($id) {
        $item = Cart::content()->where("rowId", $id)->first();
        Cart::update($id, ["qty"=>$item->qty+1]);
        notify()->success('Añadiste una unidad', 'Producto aumentado');
        return redirect()->back();
    }

    public function decrement($id) {
        $item = Cart::content()->where("rowId", $id)->first();
        if (is_null($item)) {
           return redirect()->route('cart.index');
        }
        Cart::update($id, ["qty"=>$item->qty-1]);
        notify()->error('Removiste una unidad', 'Producto disminuido');
        return redirect()->back();
    }

    public function store(Request $request) {
        if(Cart::content()->count() < 1) {
            return back();
        }
        $cliente = Cliente::where('rut_cliente', auth()->user()->rut_cliente);
        $cliente->update(['direccion'=>$request->direccion, 'num_tlf' => $request->tlf]);

        $cotizacion = new Cotizacion();
        $cotizacion->rut_cliente = auth()->user()->rut_cliente;
        $cotizacion->estado = 0;
        $cotizacion->save();
        foreach (Cart::content() as $item) {
            $detalleCotizacion = new DetalleCotizacion();
            $detalleCotizacion->id_cotizacion = $cotizacion->id;
            $detalleCotizacion->rut_cliente = $cotizacion->rut_cliente;
            $detalleCotizacion->cod_producto = $item->id;
            $detalleCotizacion->cantidad_producto = $item->qty;
            $detalleCotizacion->save();
        }

        Cart::destroy();
        return back();
    }
}
