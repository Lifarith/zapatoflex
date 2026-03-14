<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Producto;

class DashboardController extends Controller
{
    public function index()
    {
$totalProductos = Producto::count();

$totalStock = Producto::sum('stock');

$deportivos = Producto::where('categoria','deportivos')->count();

$casuales = Producto::where('categoria','casuales')->count();

$formales = Producto::where('categoria','formales')->count();

$otros = Producto::where('categoria','otros')->count();

$stockBajo = Producto::orderBy('stock','asc')->first();

$productoCaro = Producto::orderBy('precio','desc')->first();

$productosRecientes = Producto::latest()->take(5)->get();

$valorInventario = Producto::selectRaw('SUM(precio * stock) as total')
->value('total');


return view('dashboard', compact(
'totalProductos',
'totalStock',
'deportivos',
'casuales',
'formales',
'otros',
'stockBajo',
'productoCaro',
'productosRecientes',
'valorInventario'
));

}}
