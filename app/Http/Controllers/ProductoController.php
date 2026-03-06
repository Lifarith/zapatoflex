<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function deportivos()
    {
        $productos = Producto::where('categoria', 'deportivos')->get();

        return view('deportivos', compact('productos'));
    }
    public function casuales()
    {
        $productos = \App\Models\Producto::where('categoria', 'casuales')->get();

        return view('casuales', compact('productos'));
    }
    public function formales()
    {
        $productos = \App\Models\Producto::where('categoria', 'formales')->get();

        return view('formales', compact('productos'));
    }
    public function otros()
    {
        $productos = \App\Models\Producto::where('categoria', 'otros')->get();

        return view('otros', compact('productos'));
    }
    public function index(Request $request)
    {
        $query = Producto::query();

        // Filtro por marca
        if ($request->filled('marca')) {
            $query->where('marca', $request->marca);
        }

        // Filtro por categoría
        if ($request->filled('categoria')) {
            $query->where('categoria', $request->categoria);
        }

        // Filtro por precio mínimo
        if ($request->filled('precio_min')) {
            $query->where('precio', '>=', $request->precio_min);
        }

        // Filtro por precio máximo
        if ($request->filled('precio_max')) {
            $query->where('precio', '<=', $request->precio_max);
        }

        $productos = $query->paginate(10)->withQueryString();

        return view('productos.index', compact('productos'));
    }
    public function create()
    {
        return view('productos.create');
    }
    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required',
        'marca' => 'required',
        'categoria' => 'required',
        'precio' => 'required|numeric',
        'imagen' => 'image|mimes:jpg,jpeg,png',
        'stock' => 'required|integer|min:0',
    ]);

    if ($request->hasFile('imagen')) {
        $imagenPath = $request->file('imagen')
            ->store('productos', 'public');
    }

    Producto::create([
        'nombre' => $request->nombre,
        'marca' => $request->marca,
        'categoria' => $request->categoria,
        'tecnologia' => $request->tecnologia,
        'descripcion' => $request->descripcion,
        'precio' => $request->precio,
        'imagen' => $imagenPath ?? null,
        'stock' => $request->stock,
    ]);

    return redirect()->route('productos.index')
        ->with('success', 'Producto creado correctamente');
    }
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }
    public function update(Request $request, Producto $producto)
{
    $request->validate([
        'nombre' => 'required',
        'marca' => 'required',
        'categoria' => 'required',
        'precio' => 'required|numeric',
        'stock' => 'required|integer|min:0',
        ]);

    if ($request->hasFile('imagen')) {
        $imagenPath = $request->file('imagen')
            ->store('productos', 'public');

        $producto->imagen = $imagenPath;
    }

    $producto->update($request->except('imagen'));

    return redirect()->route('productos.index')
        ->with('success', 'Producto actualizado correctamente');
}
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado correctamente');
    }


    public function inventario()
    {
        $productos = Producto::all();
        return view('inventario', compact('productos'));
    }

    public function actualizarStock(Request $request, $id)
{
    $request->validate([
        'stock' => 'required|integer|min:0'
    ]);

    $producto = Producto::findOrFail($id);
    $producto->stock = $request->stock;
    $producto->save();

    return back()->with('success', 'Stock actualizado correctamente');
}
}
