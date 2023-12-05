<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriaRequest;

class CategoriaController extends Controller
{
    public function store(CategoriaRequest $req) {
        $categoria = new Categoria();
        $categoria->cod_categoria = $req->cod_categoria;
        $categoria->nombre = $req->nombre;
        $categoria->descripcion = $req->descripcion;
        $categoria->save();
        return redirect()->back();
    }

    public function update(Request $req, $id) {
        $categoria = Categoria::find($id);
        $categoria->update(['nombre'=>$req->nombre, 'descripcion'=>$req->descripcion]);
        return redirect()->back();
    }

    public function destroy($id) {
        $categoria = Categoria::find($id);
        $categoria->delete();
        return redirect()->back();
    }
}
