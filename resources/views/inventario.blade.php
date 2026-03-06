@extends('layouts.panel')
@section('title', 'Inventario')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Inventario de Productos</h2>
    </div>

    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover align-middle">

                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Producto</th>
                            <th>Categoría</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Estado</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($productos as $producto)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="fw-semibold">{{ $producto->nombre }}</td>
                            <td>{{ $producto->categoria }}</td>
                            <td>${{ number_format($producto->precio, 0, ',', '.') }}</td>

                            <td>
                                <span class="badge
                                    @if($producto->stock > 10) bg-success
                                    @elseif($producto->stock > 0) bg-warning text-dark
                                    @else bg-danger
                                    @endif
                                ">
                                    {{ $producto->stock }} unidades
                                </span>
                            </td>

                            <td>
                                @if($producto->stock > 10)
                                    <span class="text-success fw-bold">Disponible</span>
                                @elseif($producto->stock > 0)
                                    <span class="text-warning fw-bold">Stock Bajo</span>
                                @else
                                    <span class="text-danger fw-bold">Agotado</span>
                                @endif
                            </td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

@endsection
