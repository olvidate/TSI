<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductosRequest;
use App\Http\Requests\ProductosUpdateRequest;
use App\Models\Categoria;
use App\Models\Color;
use App\Models\Producto;
use App\Models\Talla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        if(Gate::denies('admin')) {
            return redirect()->route('home.index');
        }

        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function create() {
        if(Gate::denies('admin')) {
            return redirect()->route('home.index');
        }
        $categorias = Categoria::all();
        $tallas = Talla::all();
        $colores = Color::all();
        return view('productos.create', compact(['categorias', 'tallas', 'colores']));
    }

    public function store(ProductosRequest $req) {
        $producto = new Producto();
        $producto->cod_producto = $req->cod_producto;
        $producto->cod_categoria = $req->cod_categoria;
        $producto->nombre = $req->nombre;
        $producto->descripcion = $req->descripcion;
        $producto->impuesto_adicional = 0;
        $producto->nombre_marca = $req->marca;
        $producto->id_talla = $req->id_talla;
        $producto->id_color = $req->id_color;
        $imagen = $req->file('foto');
        $file_extension = $imagen->getClientOriginalExtension();
        $filename = 'P_' . $producto->cod_producto . '.' . $file_extension;
        Storage::putFileAs(
            'imagenes',
            $imagen,
            $filename
        );
        Storage::setVisibility($filename, 'public');
        $producto->save();
        return redirect()->route('productos.index');
    }

    public function destroy($producto) {
        if(Gate::allows('admin')) {
            $producto = Producto::find($producto);
            $producto->delete();
            return redirect()->route('productos.index');
        }
    }

    public function edit(Producto $producto) {

        if(Gate::allows('admin')) {
            $categorias = Categoria::all();
            $tallas = Talla::all();
            $colores = Color::all();
            return view('productos.edit', compact(['producto','categorias', 'tallas', 'colores']));
        }
    }

    public function update(ProductosUpdateRequest $req, $producto) {
        $producto = Producto::find($producto);

        $imagen = $req->file('foto');
        if($imagen != null) {
            $file_extension = $imagen->getClientOriginalExtension();
            $filename = 'P_' . $producto->cod_producto . '.' . $file_extension;
            Storage::delete('./imagenes/' . $filename);
            $filename = 'P_' . $req->cod_producto . '.' . $file_extension;
            Storage::putFileAs(
                'imagenes',
                $imagen,
                $filename
            );
            Storage::setVisibility($filename, 'public');
        } else {
            if (file_exists(public_path('imagenes/P_' . $producto->cod_producto . '.png'))) {
                Storage::move('imagenes/P_' . $producto->cod_producto . '.png', 'imagenes/P_' . $req->cod_producto . '.png');
            }

            if(file_exists(public_path('imagenes/P_' . $producto->cod_producto . '.jpg'))) {
                Storage::move('imagenes/P_' . $producto->cod_producto . '.png', 'imagenes/P_' . $req->cod_producto . '.jpg');
            }
        }
        $producto->cod_producto = $req->cod_producto;
        $producto->cod_categoria = $req->cod_categoria;
        $producto->nombre = $req->nombre;
        $producto->descripcion = $req->descripcion;
        $producto->impuesto_adicional = 0;
        $producto->nombre_marca = $req->marca;
        $producto->id_talla = $req->id_talla;
        $producto->id_color = $req->id_color;
        $producto->save();
        return redirect()->route('productos.index');
    }
}