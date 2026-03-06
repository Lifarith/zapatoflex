<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Zapatoflex | Panel')</title>

    {{-- Bootstrap 4 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- AdminLTE --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    @stack('styles')
</head>

{{-- Importante: clases del body para que funcione el pushmenu y el layout --}}
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    {{-- Navbar --}}
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <span class="navbar-brand ml-3"><b>Zapatoflex</b></span>
    </nav>

    {{-- Sidebar --}}
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{ url('/') }}" class="brand-link text-center">
            <span class="brand-text font-weight-light">Zapatoflex</span>
        </a>

        <div class="sidebar">
            <nav>
                <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-globe"></i>
                            <p>Volver a nuestra web</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('inicio') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Volver al inicio</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/productos') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-store"></i>
                            <p>Ver Catalogo</p>
                        </a>
                    </li>
                                        <li class="nav-item">
                        <a href="{{ url('/inventario') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-warehouse"></i>
                            <p>Inventario</p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route('deportivos.index') }}" class="nav-link {{ request()->routeIs('deportivos.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-running"></i>
                            <p>Deportivos</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('casuales.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-walking"></i>
                            <p>Casuales</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('formales.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-tie"></i>
                            <p>Formales</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('otros.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Otros</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('carrito.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>Pedidos</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    {{-- Contenido dinámico --}}
    <div class="content-wrapper p-4">
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>

    <footer class="main-footer text-center">
        <strong>© Desarrollado por Lifarith Ortega M.</strong>
    </footer>
</div>

{{-- Scripts --}}
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

@stack('scripts')
</body>
</html>
