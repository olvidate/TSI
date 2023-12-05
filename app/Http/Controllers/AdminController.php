<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Color;
use App\Models\Cotizacion;
use App\Models\DetalleCotizacion;
use App\Models\Producto;
use App\Models\Rol;
use App\Models\Talla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
//    Productos
    public function productos_index() {
        if(Gate::denies('admin')) {
            return redirect()->route('home.index');
        }

        $productos = Producto::all();
        return view('admin/productos.index', compact('productos'));
    }

    public function productos_create() {
        if(Gate::denies('admin')) {
            return redirect()->route('home.index');
        }
        $categorias = Categoria::all();
        $tallas = Talla::all();
        $colores = Color::all();
        return view('admin/productos.create', compact(['categorias', 'tallas', 'colores']));
    }

    public function productos_edit(Producto $producto) {

        if(Gate::allows('admin')) {
            $categorias = Categoria::all();
            $tallas = Talla::all();
            $colores = Color::all();
            return view('admin/productos.edit', compact(['producto','categorias', 'tallas', 'colores']));
        }
    }
//    Clientes

    public function clientes_index() {
        if(Gate::denies('admin')) {
            return redirect()->route('home.index');
        }

        $roles = Rol::all();
        $clientes = Cliente::all();
        return view('admin/clientes.index', compact([
            'clientes',
            'roles'
        ]));
    }

    public function categorias_index() {
        if(Gate::denies('admin')) {
            return redirect()->route('home.index');
        }

        $categorias = Categoria::all();

        return view('admin/categorias.index', compact('categorias'));
    }

    public function tallas_index() {
        if(Gate::denies('admin')) {
            return redirect()->route('home.index');
        }

        $tallas = Talla::all();

        return view('admin/tallas.index', compact('tallas'));
    }

    public function colores_index() {
        if(Gate::denies('admin')) {
            return redirect()->route('home.index');
        }

        $colores = Color::all();

        return view('admin/colores.index', compact('colores'));
    }

//    Cotizaciones
    public function cotizaciones_index() {
        if(Gate::denies('admin')) {
            return redirect()->route('home.index');
        }

        $cotizaciones = Cotizacion::orderBy('created_at', 'DESC')->orderBy('estado', 'DESC')->get();
        return view('admin/cotizaciones.index', compact('cotizaciones'));
    }

    public function cotizaciones_reply($id) {
        $cotizacion = Cotizacion::find($id);
        $detalles = $cotizacion->detallesCotizacion;

        return view('admin/cotizaciones.reply', compact([
                'cotizacion',
                'detalles'
            ])
        );
    }

}
