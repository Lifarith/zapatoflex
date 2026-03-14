<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CompraRealizada;
use Illuminate\Http\Request;
use App\Models\Producto;

class CheckoutController extends Controller
{
    public function index()
    {
        $carrito = session()->get('carrito', []);

        if (empty($carrito)) {
            return redirect()->route('carrito.index')
                ->with('error', 'El carrito está vacío');
        }

        return view('checkout.index', compact('carrito'));
    }

    public function pagar(Request $request)
    {
        $carrito = session()->get('carrito', []);

        // Verificar carrito
        if (empty($carrito)) {
            return redirect()->route('carrito.index')
                ->with('error', 'El carrito está vacío');
        }

        $total = 0;

        foreach ($carrito as $id => $item) {

            $producto = Producto::find($id);

            if (!$producto) {
                continue;
            }

            // Validar stock
            if ($producto->stock < $item['cantidad']) {
                return redirect()->back()
                    ->with('error', 'No hay suficiente stock para ' . $producto->nombre);
            }

            // Descontar inventario
            $producto->stock -= $item['cantidad'];
            $producto->save();

            // Calcular total
            $total += $producto->precio * $item['cantidad'];
        }

        // Crear objeto simple de pedido
        $pedido = (object)[
            'id' => rand(1000,9999),
            'total' => $total
        ];

        // Obtener usuario autenticado
        $user = Auth::user();

        // Enviar notificación
        if ($user) {
            Notification::send($user, new CompraRealizada($pedido));
        }

        // Vaciar carrito
        session()->forget('carrito');

        return redirect()->route('carrito.index')
            ->with('success', 'Pago realizado correctamente');
    }
}
