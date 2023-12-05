<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColoresController extends Controller
{
    public function store(Request $req) {
        $colores = new Color();
        $colores->nombre = $req->nombre;
        $colores->save();
        return redirect()->back();
    }

    public function update(Request $req, $id) {
        $colores = Color::find($id);
        $colores->update(['nombre'=>$req->nombre]);
        return redirect()->back();
    }

    public function destroy($id) {
        $colores = Color::find($id);
        $colores->delete();
        return redirect()->back();
    }
}
