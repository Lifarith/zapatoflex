<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Zapatoflex | Comodidad y Estilo</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>

  <header class="header">
    <div class="logo-container">
        <div class="logo">Zapatoflex</div>
        <span class="navbar-brand"><b>Zapatoflex</b></span>
    </div>

    <div class="auth-buttons">
        @guest
            <a href="{{ route('login') }}" class="btn-login">
                <i class="fas fa-sign-in-alt"></i> Ingresar
            </a>

            <a href="{{ route('register') }}" class="btn-register">
                <i class="fas fa-user-plus"></i> Registrar
            </a>
        @else
            <span class="user-name">{{ Auth::user()->name }}</span>

            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();"
               class="btn-logout">
                Cerrar sesión
            </a>

            <form id="logout-form"
                  action="{{ route('logout') }}"
                  method="POST"
                  style="display: none;">
                @csrf
            </form>
        @endguest
    </div>
</header>
    <!-- HERO -->
    <section class="hero">
        <div class="hero-content">
            <h1>Comodidad que se siente, estilo que se nota</h1>
            <p>Descubre nuestra nueva colección 2026</p>
            <a href="#" class="btn">Registrate y accede a descuentos</a>
        </div>
    </section>

    <!-- PRODUCTOS DESTACADOS -->
    <section class="productos">
        <h2>Productos Destacados</h2>

        <div class="grid-productos">

            <div class="card">
                <img src="{{ asset('img/deportivos.jpg') }}" alt="Zapato 1">
                <h3>Zapato Deportivo</h3>
                <p class="precio">Desde $120.000</p>
                </div>

            <div class="card">
                <img src="{{ asset('img/casuales.jpg') }}" alt="Zapato 2">
                <h3>Zapato Casual</h3>
                <p class="precio">Desde $95.000</p>
                </div>

            <div class="card">
                <img src="{{ asset('img/formales.jpg') }}" alt="Zapato 3">
                <h3>Zapato Formal</h3>
                <p class="precio">Desde $150.000</p>
                </div>

            <div class="card">
                <img src="{{ asset('img/otros.jpg') }}" alt="Zapato 4">
                <h3>Otros modelos</h3>
                <p class="precio">Desde $85.000</p>
                </div>

        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <p>© 2026 Zapatoflex - Desarrollado por Lifarith Ortega M.</p>
    </footer>

</body>
</html>
