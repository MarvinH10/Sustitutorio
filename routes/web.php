<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrendaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\DetalleVentaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prenda/mostrar', [PrendaController::class,'mostrar']);
Route::get('/prenda/guardar', [PrendaController::class,'formulario'])->name('prenda.guardar');
Route::post('/prenda/guardar', [PrendaController::class,'guardar'])->name('prenda.guardar');

Route::get('/cliente/mostrar', [ClienteController::class,'mostrar']);
Route::get('/cliente/guardar', [ClienteController::class,'formulario'])->name('cliente.guardar');
Route::post('/cliente/guardar', [ClienteController::class,'guardar'])->name('cliente.guardar');

Route::get('/venta/mostrar', [VentaController::class,'mostrar']);
Route::get('/venta/guardar', [VentaController::class,'formulario'])->name('venta.guardar');
Route::post('/venta/guardar', [VentaController::class,'guardar'])->name('venta.guardar');

Route::get('/detalleventa/mostrar', [DetalleVentaController::class,'mostrar']);
Route::get('/detalleventa/guardar', [DetalleVentaController::class,'formulario'])->name('detalleventa.guardar');
Route::post('/detalleventa/guardar', [DetalleVentaController::class,'guardar'])->name('detalleventa.guardar');
