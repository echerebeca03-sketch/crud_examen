<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f7fd;
            font-family: 'Segoe UI', sans-serif;
        }
        .navbar {
            background-color: #5e17eb;
        }
        .navbar-brand, .nav-link, .navbar-text {
            color: white !important;
            font-weight: 600;
        }
        .card-stat {
            border-radius: 1rem;
            color: white;
            font-weight: 600;
            padding: 1rem;
        }
        .card-blue { background: #3b82f6; }
        .card-green { background: #10b981; }
        .card-cyan { background: #06b6d4; }
        .card-red { background: #ef4444; }
        .card-purple { background: #8b5cf6; }
        .table th {
            background-color: #8b5cf6;
            color: white;
        }
        .box {
            border-radius: 1rem;
            background-color: #fff;
            padding: 1.5rem;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        }
        .title {
            color: #5e17eb;
            font-weight: bold;
        }
        footer {
            text-align: center;
            padding: 1rem;
            color: #777;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard') }}">Inventario</a>
            <div class="d-flex">
                <a href="{{ route('productos.index') }}" class="btn btn-outline-light me-2">Productos</a>
                <a href="{{ route('categorias.index') }}" class="btn btn-outline-light">Categorías</a>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        @yield('content')
    </div>

    <footer>
        <p>© 2025 - Sistema de Inventario | Desarrollado por <strong>Tú 💜</strong></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
