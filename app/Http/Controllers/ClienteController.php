<?php

namespace App\Http\Controllers;

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

    public function index() {}

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

    public function store(Request $req) {
        $cliente = new Cliente();
        $cliente->rut_cliente = $req->rut;
        $cliente->email = $req->email;
        $cliente->password = Hash::make($req->password);
        $cliente->rol_id = $req->rol_id ?? 1;
        if($req->switch == 'on') {
            $cliente->nombre_empresa = $req->nombreEmpresa;
            $cliente->holding_empresa = $req->holding;
        } else {
            $cliente->nombre = $req->nombre;
            $cliente->apellido = $req->apellido;
        }
        $cliente->save();
        return redirect()->route('home.index');
    }
}
