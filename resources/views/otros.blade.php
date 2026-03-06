@extends('layouts.panel')

@section('title', 'Zapatoflex | Otros')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Otros Productos</h1>

    <div class="row">
        @forelse($productos as $producto)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 shadow-sm">

                    @if($producto->imagen)
                        <img src="{{ asset('storage/'.$producto->imagen) }}"
                             class="card-img-top"
                             alt="{{ $producto->nombre }}">
                    @endif

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title mb-1">
                            {{ $producto->marca }} {{ $producto->nombre }}
                        </h5>

                        <p class="text-muted mb-2">
                            {{ ucfirst($producto->categoria) }}
                            @if($producto->tecnologia)
                                · {{ $producto->tecnologia }}
                            @endif
                        </p>

                        <p class="card-text flex-grow-1">
                            {{ $producto->descripcion }}
                        </p>

                        <div class="mt-2">
                            <span class="badge bg-primary fs-6">
                                {{ number_format($producto->precio, 0, ',', '.') }} COP
                            </span>
                        </div>

                        <form action="{{ route('carrito.agregar') }}" method="POST" class="mt-2">
                            @csrf
                            <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                            <button type="submit" class="btn btn-success w-100">
                                Agregar al carrito
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        @empty
            <p>No hay productos registrados en esta categoría.</p>
        @endforelse
    </div>
</div>
@endsection
