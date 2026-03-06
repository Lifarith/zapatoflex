<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
    use App\Models\Producto;

class CheckoutController extends Controller
{
    public function index()
    {
        $carrito = session()->get('carrito', []);

        if (empty($carrito)) {
            return redirect()->route('carrito.index')
                ->with('success', 'El carrito está vacío');
        }

        return view('checkout.index', compact('carrito'));
    }


public function pagar(Request $request)
{
    $carrito = session()->get('carrito', []);

    if (empty($carrito)) {
        return redirect()->route('carrito.index');
    }

    foreach ($carrito as $id => $item) {

        $producto = Producto::find($id);

        if (!$producto) {
            continue;
        }

        // ✅ Validar que haya stock suficiente
        if ($producto->stock < $item['cantidad']) {
            return redirect()->back()
                ->with('error', 'No hay suficiente stock para ' . $producto->nombre);
        }

        // ✅ Descontar inventario
        $producto->stock -= $item['cantidad'];
        $producto->save();
    }

    // ✅ Vaciar carrito
    session()->forget('carrito');

    return redirect()->route('carrito.index')
        ->with('success', 'Pago realizado y stock actualizado correctamente');
}
}
