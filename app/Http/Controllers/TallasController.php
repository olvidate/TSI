<?php

namespace App\Http\Controllers;

use App\Http\Requests\TallasRequest;
use App\Models\Talla;
use Illuminate\Http\Request;

class TallasController extends Controller
{
    public function store(TallasRequest $req) {
        $talla = new Talla();
        $talla->nombre = $req->nombre;
        $talla->save();
        return redirect()->back();
    }

    public function update(Request $req, $id) {
        $talla = Talla::find($id);
        $talla->update(['nombre'=>$req->nombre]);
        return redirect()->back();
    }

    public function destroy($id) {
        $talla = Talla::find($id);
        $talla->delete();
        return redirect()->back();
    }
}
