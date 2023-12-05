<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $productos = Producto::inRandomOrder()->limit(4)->get();
        return view('home.index', compact('productos'));
    }

    public function login() {
        return view('auth.login');
    }

    public function register() {
        return view('auth.register');
    }
}
