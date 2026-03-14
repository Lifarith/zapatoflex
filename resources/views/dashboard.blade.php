@extends('layouts.panel')

@section('title','Dashboard')

@section('content')

<div class="container-fluid">

<div class="row">

<!-- Total productos -->
<div class="col-lg-3 col-6">
<div class="small-box bg-info">
<div class="inner">
<h3>{{ $totalProductos }}</h3>
<p>Total productos</p>
</div>
<div class="icon">
<i class="fas fa-shoe-prints"></i>
</div>
</div>
</div>

<!-- Total stock -->
<div class="col-lg-3 col-6">
<div class="small-box bg-success">
<div class="inner">
<h3>{{ $totalStock }}</h3>
<p>Total stock</p>
</div>
<div class="icon">
<i class="fas fa-box"></i>
</div>
</div>
</div>

<!-- Deportivos -->
<div class="col-lg-3 col-6">
<div class="small-box bg-warning">
<div class="inner">
<h3>{{ $deportivos }}</h3>
<p>Deportivos</p>
</div>
<div class="icon">
<i class="fas fa-running"></i>
</div>
</div>
</div>

<!-- Casuales -->
<div class="col-lg-3 col-6">
<div class="small-box bg-danger">
<div class="inner">
<h3>{{ $casuales }}</h3>
<p>Casuales</p>
</div>
<div class="icon">
<i class="fas fa-walking"></i>
</div>
</div>
</div>

</div>


<div class="row">

<!-- Valor inventario -->
<div class="col-md-6">
<div class="card">
<div class="card-header">
<h3 class="card-title">Valor total del inventario</h3>
</div>

<div class="card-body">
<h2>$ {{ number_format($valorInventario) }}</h2>
</div>

</div>
</div>


<!-- Producto con menor stock -->
<div class="col-md-6">
<div class="card">
<div class="card-header">
<h3 class="card-title">Alerta de inventario</h3>
</div>

<div class="card-body">

@if($stockBajo)

<div class="alert alert-warning">

Producto con menor stock:
<strong>{{ $stockBajo->nombre }}</strong>

<br>

Stock disponible: {{ $stockBajo->stock }}

</div>

@endif

</div>
</div>
</div>

</div>


<div class="row">

<!-- Producto más caro -->
<div class="col-md-6">
<div class="card">

<div class="card-header">
<h3 class="card-title">Producto más caro</h3>
</div>

<div class="card-body">

@if($productoCaro)

<strong>{{ $productoCaro->nombre }}</strong>

<br>

Precio: ${{ $productoCaro->precio }}

@endif

</div>

</div>
</div>


<!-- Productos recientes -->
<div class="col-md-6">

<div class="card">

<div class="card-header">
<h3 class="card-title">Productos recientes</h3>
</div>

<div class="card-body">

<table class="table table-striped">

<thead>

<tr>
<th>Producto</th>
<th>Precio</th>
</tr>

</thead>

<tbody>

@foreach($productosRecientes as $producto)

<tr>
<td>{{ $producto->nombre }}</td>
<td>${{ $producto->precio }}</td>
</tr>

@endforeach

</tbody>

</table>

</div>

</div>

</div>

</div>


<div class="row">

<div class="col-md-12">

<div class="card">

<div class="card-header">
<h3 class="card-title">Productos por categoría</h3>
</div>

<div class="card-body">

<canvas id="graficaCategorias"></canvas>

</div>

</div>

</div>

</div>


</div>

@endsection


@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('graficaCategorias');

new Chart(ctx, {

type: 'bar',

data: {

labels: ['Deportivos','Casuales','Formales','Otros'],

datasets: [{

label: 'Cantidad de productos',

data: [
{{ $deportivos }},
{{ $casuales }},
{{ $formales }},
{{ $otros }}
]

}]

}

});

</script>

@endsection
