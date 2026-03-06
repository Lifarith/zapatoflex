@extends('layouts.panel')

@section('title', 'Carrito de Compras')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Mi Carrito</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count($carrito) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($carrito as $id => $item)
                    @php $subtotal = $item['precio'] * $item['cantidad']; $total += $subtotal; @endphp
                    <tr>
                        <td>
                            <img src="{{ asset('storage/'.$item['imagen']) }}" width="50" alt="{{ $item['nombre'] }}">
                            {{ $item['nombre'] }}
                        </td>
                        <td>{{ number_format($item['precio'],0,',','.') }} COP</td>
                        <td>{{ $item['cantidad'] }}</td>
                        <td>{{ number_format($subtotal,0,',','.') }} COP</td>
                        <td>
                            <form action="{{ route('carrito.eliminar') }}" method="POST">
                                @csrf
                                <input type="hidden" name="producto_id" value="{{ $id }}">
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3"><strong>Total:</strong></td>
                    <td colspan="2"><strong>{{ number_format($total,0,',','.') }} COP</strong></td>
                </tr>
                <tr>
                    <td colspan="5" class="text-end">
                        <a href="{{ route('checkout.index') }}" class="btn btn-success">
                            Proceder al Pago
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    @else
        <p>Tu carrito está vacío.</p>
    @endif
</div>
@endsection
