<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use http\Client;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['login', 'logout', 'store']);
    }

    public function login(Request $req) {
        $email = $req->email;
        $password = $req->password;

        if(Auth::attempt(['email'=> $email, 'password'=> $password])) {
            return redirect()->route('home.index');
        }

        return back()->withErrors([
            'email' => 'Credenciales incorrectas',
        ])->onlyInput('email');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home.index');
    }

    public function store(ClienteRequest $req) {
        $cliente = new Cliente();

        if (strlen($req->rut) > 10) {
            return back()->withErrors([
                'rut' => 'RUT demasiado largo',
            ]);
        }

        if (!preg_match('/\b[0-9|.]{1,10}\-[Kk0-9]/', $req->rut)) {
            return back()->withErrors([
                'rut' => 'RUT con formato inválido',
            ]);
        }
        $cliente->rut_cliente = $req->rut;
        $cliente->email = $req->email;
        $cliente->password = Hash::make($req->password);
        $cliente->rol_id = $req->rol_id ?? 1;
        if($req->switch == 'on') {
            if(strlen($req->nombre_empresa) < 10) {
                return back()->withErrors([
                    'nombre_empresa' => 'Mínimo 10 caracteres para el nombre de empresa',
                ]);
            }
            $cliente->nombre_empresa = $req->nombre_empresa;
            $cliente->holding_empresa = $req->holding_empresa;
        } elseif ($req->switch == null) {

            if(strlen($req->firstname) < 4) {
                return back()->withErrors([
                    'firstname' => 'Mínimo 4 caracteres para el nombre',
                ]);
            }

            $cliente->nombre = $req->firstname;

            if(strlen($req->lastname) < 4) {
                return back()->withErrors([
                    'firstname' => 'Mínimo 4 caracteres para el apellido',
                ]);
            }

            $cliente->apellido = $req->lastname;
        }
        $cliente->save();
        return redirect()->route('home.index');
    }

    public function update(Request $req, $id) {
        $cliente = Cliente::find($id);
        $cliente->update(['rol_id'=>$req->rol_id, 'direccion'=>$req->direccion, 'num_tlf'=>$req->tlf]);
        return redirect()->back();
    }
}
