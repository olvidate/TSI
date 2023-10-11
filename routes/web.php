<?php

use App\Http\Controllers\ProductosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/login', [HomeController::class, 'login'])->name('home.login');
Route::get('/register', [HomeController::class, 'register'])->name('home.register');

Route::post('/register', [ClienteController::class, 'store'])->name('cliente.store');
Route::post('/login', [ClienteController::class, 'login'])->name('cliente.login');
Route::get('/logout', [ClienteController::class, 'logout'])->name('cliente.logout');

Route::get('/productos', [ProductosController::class, 'index'])->name('productos.index');
Route::get('/productos/create', [ProductosController::class, 'create'])->name('productos.create');
Route::get('/productos/{producto}/edit', [ProductosController::class, 'edit'])->name('productos.edit');

Route::delete('/productos/{producto}', [ProductosController::class, 'destroy'])->name('productos.destroy');
Route::post('/productos', [ProductosController::class, 'store'])->name('productos.store');
Route::put('/productos/{producto}', [ProductosController::class, 'update'])->name('productos.update');
