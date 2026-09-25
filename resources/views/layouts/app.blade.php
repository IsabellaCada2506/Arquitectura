<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        crossorigin="anonymous"
    >

    <link
        href="{{ asset('css/app.css') }}"
        rel="stylesheet"
    >

    <title>@yield('title', 'Tienda en línea')</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">
                Tienda en línea
            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Abrir navegación"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div
                class="collapse navbar-collapse"
                id="navbarNavAltMarkup"
            >
                <div class="navbar-nav ms-auto">
                    <a
                        class="nav-link"
                        href="{{ route('home.index') }}"
                    >
                        Inicio
                    </a>

                    <a
                        class="nav-link"
                        href="{{ route('home.about') }}"
                    >
                        Acerca de
                    </a>

                    <a
                        class="nav-link"
                        href="{{ route('product.index') }}"
                    >
                        Productos
                    </a>

                    <a
                        class="nav-link"
                        href="{{ route('cart.index') }}"
                    >
                        Carrito
                    </a>

                    <div class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="humanDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            Humanos
                        </a>

                        <ul
                            class="dropdown-menu"
                            aria-labelledby="humanDropdown"
                        >
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="{{ route('human.create') }}"
                                >
                                    Registrar humanos
                                </a>
                            </li>

                            <li>
                                <a
                                    class="dropdown-item"
                                    href="{{ route('human.index') }}"
                                >
                                    Listar humanos
                                </a>
                            </li>

                            <li>
                                <a
                                    class="dropdown-item"
                                    href="{{ route('human.battle') }}"
                                >
                                    Batalla de humanos
                                </a>
                            </li>
                        </ul>
                    </div>

                    <a
                        class="nav-link"
                        href="{{ route('home.contact') }}"
                    >
                        Contacto
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <header class="masthead bg-primary text-white text-center py-4">
        <div class="container d-flex align-items-center flex-column">
            <h2>@yield('subtitle', 'Aplicación Laravel EAFIT')</h2>
        </div>
    </header>

    <main class="container my-4">
        @yield('content')
    </main>

    <footer class="copyright py-4 text-center text-white">
        <div class="container">
            <small>
                Derechos reservados - Isabella Cadavid Posada
            </small>
        </div>
    </footer>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"
    ></script>
</body>
</html>