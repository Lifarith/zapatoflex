@extends('layouts.panel')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Zapatoflex | Panel</title>

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <span class="navbar-brand ml-3"><b>Zapatoflex</b></span>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="#" class="brand-link text-center">
            <span class="brand-text font-weight-light">Zapatoflex</span>
        </a>

        <div class="sidebar">
            <nav>
                <ul class="nav nav-pills nav-sidebar flex-column">

                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Volver a nuestra web</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/productos') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Ver Catalogo</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('deportivos.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-shoe-prints"></i>
                            <p>Deportivos</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('casuales.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-shoe-prints"></i>
                            <p>Casuales</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('formales.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-shoe-prints"></i>
                            <p>Formales</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('otros.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-shoe-prints"></i>
                            <p>Otros</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>Pedidos</p>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content -->
    <div class="content-wrapper p-4">

        <section class="content">
            <div class="container-fluid">

                <h1 class="mb-4">Bienvenido a Zapatoflex</h1>

                <div class="row">

                    <div class="col-lg-4 col-6">

                         <a href="{{ route('deportivos.index') }}" class="small-box bg-info text-white text-decoration-none" aria-label="Ir a modelos deportivos">
                        <div class="small-box bg-info">
                            <div class="inner">
                                @php
                                    $totalDeportivos = \App\Models\Producto::where('categoria','deportivos')->count();
                                @endphp

                                <h3>{{ $totalDeportivos }}</h3>
                            <p>Diferentes Modelos Deportivos</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shoe-prints"></i>
                            </div>
                        </div>
                         </a>

                    </div>

                    <div class="col-lg-4 col-6">
                        <a href="{{ route('casuales.index') }}" class="small-box bg-info text-white text-decoration-none" aria-label="Ir a modelos deportivos">
                        <div class="small-box bg-info">
                            <div class="inner">
                                @php
                                    $totalCasuales = \App\Models\Producto::where('categoria','casuales')->count();
                                @endphp

                                <h3>{{ $totalCasuales }}</h3>
                                <p>Diferentes Modelos Casuales</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shoe-prints"></i>
                            </div>
                        </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-6">
                        <a href="{{ route('formales.index') }}" class="small-box bg-info text-white text-decoration-none" aria-label="Ir a modelos deportivos">
                        <div class="small-box bg-info">
                            <div class="inner">
                                @php
                                    $totalFormales = \App\Models\Producto::where('categoria','formales')->count();
                                @endphp

                                <h3>{{ $totalFormales }}</h3>
                                <p>Diferentes Modelos Formales</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shoe-prints"></i>
                            </div>
                        </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-6">
                        <a href="{{ route('otros.index') }}" class="small-box bg-info text-white text-decoration-none" aria-label="Ir a modelos deportivos">
                        <div class="small-box bg-info">
                            <div class="inner">
                                @php
                                    $totalOtros = \App\Models\Producto::where('categoria','otros')->count();
                                @endphp

                                <h3>{{ $totalOtros }}</h3>
                                <p>Otros Modelos</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shoe-prints"></i>
                            </div>
                        </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-6">
                        <a href="{{ route('carrito.index') }}" class="small-box bg-info text-white text-decoration-none" aria-label="Ir a modelos deportivos">
                        <div class="small-box bg-success">
                            <div class="inner">
                                @php
                                $totalCantidad = collect(session('carrito', []))->sum('cantidad');
                                @endphp

                                <h3>{{ $totalCantidad }}</h3>
                                <p>Productos en tu carrito</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                        </div>
                        </a>
                    </div>

                </div>

            </div>
        </section>

    </div>

    <footer class="main-footer text-center">
        <strong>© Desarrollado por Lifarith Ortega M.</strong>
    </footer>

</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

</body>
</html>
