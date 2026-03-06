@extends('layouts.panel')

@section('title', 'Finalizar Compra')

@section('content')
<div class="container">
    <h2>Resumen de Compra</h2>

    @php $total = 0; @endphp

    <ul class="list-group mb-4">
        @foreach($carrito as $item)
            @php
                $subtotal = $item['precio'] * $item['cantidad'];
                $total += $subtotal;
            @endphp

            <li class="list-group-item d-flex justify-content-between">
                {{ $item['nombre'] }} (x{{ $item['cantidad'] }})
                <span>{{ number_format($subtotal,0,',','.') }} COP</span>
            </li>
        @endforeach
    </ul>

    <h4>Total a pagar: {{ number_format($total,0,',','.') }} COP</h4>

    <hr>

    <h5>Simulación de Pago</h5>

    <form action="{{ route('checkout.pagar') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Número de Tarjeta</label>
            <input type="text" class="form-control" placeholder="1234 5678 9012 3456" required>
        </div>

        <div class="mb-3">
            <label>Nombre del Titular</label>
            <input type="text" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>CVV</label>
            <input type="text" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">
            Confirmar Pago
        </button>
    </form>
</div>
@endsection
