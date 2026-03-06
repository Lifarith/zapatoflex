<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CheckoutController;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/inicio', function () {
    return view('inicio');
})->middleware('auth')->name('inicio');

/* Categorías */
Route::get('/deportivos', [ProductoController::class, 'deportivos'])->name('deportivos.index');
Route::get('/casuales', [ProductoController::class, 'casuales'])->name('casuales.index');
Route::get('/formales', [ProductoController::class, 'formales'])->name('formales.index');
Route::get('/otros', [ProductoController::class, 'otros'])->name('otros.index');
Route::get('/inventario', [ProductoController::class, 'inventario'])->name('inventario.index');
Route::patch('/inventario/{id}', [ProductoController::class, 'actualizarStock'])->name('inventario.actualizar');
/* Carrito */
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::post('/carrito/eliminar', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');

/* CRUD Productos */
Route::resource('productos', ProductoController::class);



Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/pagar', [CheckoutController::class, 'pagar'])->name('checkout.pagar');
