@extends('layouts.panel')

@section('content')
<div class="container">
    <h2>Listado de Productos</h2>

    <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">
        Nuevo Producto
    </a>
    <form method="GET" action="{{ route('productos.index') }}" class="row mb-4">

    <div class="col-md-3">
        <input type="text"
               name="marca"
               class="form-control"
               placeholder="Filtrar por marca"
               value="{{ request('marca') }}">
    </div>

    <div class="col-md-3">
        <input type="text"
               name="categoria"
               class="form-control"
               placeholder="Filtrar por categoría"
               value="{{ request('categoria') }}">
    </div>

    <div class="col-md-2">
        <input type="number"
               name="precio_min"
               class="form-control"
               placeholder="Precio mínimo"
               value="{{ request('precio_min') }}">
    </div>

    <div class="col-md-2">
        <input type="number"
               name="precio_max"
               class="form-control"
               placeholder="Precio máximo"
               value="{{ request('precio_max') }}">
    </div>

    <div class="col-md-2 d-flex gap-2">
        <button type="submit" class="btn btn-success">
            Filtrar
        </button>

        <a href="{{ route('productos.index') }}" class="btn btn-secondary">
            Limpiar
        </a>
    </div>

    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->marca }}</td>
                <td>{{ $producto->categoria }}</td>
                <td>{{ $producto->precio }}</td>
                <td>
                    <a href="{{ route('productos.edit', $producto) }}"
                       class="btn btn-warning btn-sm">
                       Editar
                    </a>

                    <form action="{{ route('productos.destroy', $producto) }}"
                          method="POST"
                          style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $productos->links() }}
</div>
@endsection
