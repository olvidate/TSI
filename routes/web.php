<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\FacturasController;
use App\Http\Controllers\ProductosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TallasController;
use App\Http\Controllers\ColoresController;

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
Route::put('/cliente/update/{cliente}', [ClienteController::class, 'update'])->name('cliente.update');

Route::get('/admin/productos', [AdminController::class, 'productos_index'])->name('admin.productos.index');
Route::get('/admin/productos/create', [AdminController::class, 'productos_create'])->name('admin.productos.create');
Route::get('/admin/productos/{producto}/edit', [AdminController::class, 'productos_edit'])->name('admin.productos.edit');

Route::get('/admin/cotizaciones', [AdminController::class, 'cotizaciones_index'])->name('admin.cotizaciones.index');
Route::get('/admin/cotizaciones/reply/{id}', [AdminController::class, 'cotizaciones_reply'])->name('admin.cotizaciones.reply');

Route::get('/admin/clientes', [AdminController::class, 'clientes_index'])->name('admin.clientes.index');

Route::get('/admin/categorias', [AdminController::class, 'categorias_index'])->name('admin.categorias.index');
Route::get('/admin/tallas', [AdminController::class, 'tallas_index'])->name('admin.tallas.index');
Route::get('/admin/colores', [AdminController::class, 'colores_index'])->name('admin.colores.index');

Route::get('/productos', [ProductosController::class, 'index'])->name('productos.index');
Route::get('/productos/categorias/{categoria}', [ProductosController::class, 'category'])->name('category');
Route::delete('/productos/{producto}', [ProductosController::class, 'destroy'])->name('productos.destroy');
Route::post('/productos', [ProductosController::class, 'store'])->name('productos.store');
Route::put('/productos/{producto}', [ProductosController::class, 'update'])->name('productos.update');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{producto}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/increment/{producto}', [CartController::class, 'increment'])->name('cart.increment');
Route::get('/cart/decrement/{producto}', [CartController::class, 'decrement'])->name('cart.decrement');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');

Route::get('/cotizaciones', [CotizacionController::class, 'index'])->name('cotizaciones.index');
Route::get('/cotizaciones/view/{id}', [CotizacionController::class, 'view'])->name('cotizaciones.view');
Route::put('/cotizaciones/{id}', [CotizacionController::class, 'update'])->name('cotizaciones.update');
Route::put('/cotizaciones/detalle/{id}', [CotizacionController::class, 'updateDetalle'])->name('cotizaciones.updateDetalle');
Route::put('/cotizaciones/detalle/{id}/sendUpdate', [CotizacionController::class, 'sendUpdate'])->name('cotizaciones.sendUpdate');

Route::post('/factura', [FacturasController::class, 'store'])->name('factura.store');
Route::get('/factura/download/{id}', [FacturasController::class, 'generatePdf'])->name('factura.download');

Route::put('/categoria/update/{id}', [CategoriaController::class, 'update'])->name('categoria.update');
Route::post('/categoria', [CategoriaController::class, 'store'])->name('categoria.store');
Route::delete('/categoria/{id}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');

Route::put('/talla/update/{id}', [TallasController::class, 'update'])->name('talla.update');
Route::post('/talla', [TallasController::class, 'store'])->name('talla.store');
Route::delete('/talla/{id}', [TallasController::class, 'destroy'])->name('talla.destroy');

Route::put('/color/update/{id}', [ColoresController::class, 'update'])->name('color.update');
Route::post('/color', [ColoresController::class, 'store'])->name('color.store');
Route::delete('/color/{id}', [ColoresController::class, 'destroy'])->name('color.destroy');
