<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CarritoController extends Controller
{
    // Mostrar carrito
    public function index(Request $request)
    {
        $carrito = $request->session()->get('carrito', []);
        return view('carrito.index', compact('carrito'));
    }

    // Agregar producto
    public function agregar(Request $request)
    {
        $producto = Producto::findOrFail($request->producto_id);

        $carrito = $request->session()->get('carrito', []);

        // Si ya está en el carrito, solo aumentamos cantidad
        if(isset($carrito[$producto->id])) {
            $carrito[$producto->id]['cantidad']++;
        } else {
            $carrito[$producto->id] = [
                "nombre" => $producto->nombre,
                "precio" => $producto->precio,
                "imagen" => $producto->imagen,
                "cantidad" => 1
            ];
        }

        $request->session()->put('carrito', $carrito);

        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }

    // Eliminar producto
    public function eliminar(Request $request)
    {
        $carrito = $request->session()->get('carrito', []);

        if(isset($carrito[$request->producto_id])) {
            unset($carrito[$request->producto_id]);
            $request->session()->put('carrito', $carrito);
        }

        return redirect()->back()->with('success', 'Producto eliminado del carrito');
    }
    
}
