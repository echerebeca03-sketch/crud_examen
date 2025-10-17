<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario Tienda</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <style>
        body {
            background: linear-gradient(135deg, #f8f0ff, #fff);
            font-family: 'Poppins', sans-serif;
            color: #333;
        }

        /* Navbar */
        nav.navbar {
            background-color: #7b2cbf !important;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        }

        nav .navbar-brand {
            color: #fff !important;
            font-weight: 600;
        }

        nav .nav-link {
            color: #f3e8ff !important;
            font-weight: 500;
        }

        nav .nav-link:hover {
            color: #ffb3ec !important;
        }

        /* Contenedor principal */
        .container {
            margin-top: 40px;
        }

        /* Card */
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .card-header {
            background-color: #9d4edd;
            color: white;
            font-weight: 600;
            font-size: 1.2rem;
            border-top-left-radius: 16px !important;
            border-top-right-radius: 16px !important;
        }

        /* Tabla */
        table {
            border-radius: 12px;
            overflow: hidden;
        }

        th {
            background-color: #e9d5ff;
            color: #4a148c;
            text-align: center;
            vertical-align: middle;
        }

        td {
            text-align: center;
            vertical-align: middle;
        }

        /* Botones */
        .btn-primary {
            background-color: #9d4edd;
            border: none;
        }

        .btn-primary:hover {
            background-color: #b96eff;
        }

        .btn-success {
            background-color: #d68cff;
            border: none;
        }

        .btn-success:hover {
            background-color: #e0aaff;
        }

        .btn-danger {
            background-color: #ff5c8d;
            border: none;
        }

        .btn-danger:hover {
            background-color: #ff85a1;
        }

        /* Footer */
        footer {
            margin-top: 40px;
            text-align: center;
            color: #777;
            font-size: 0.9rem;
        }

        /* Inputs y formularios */
        input, select, textarea {
            border-radius: 10px !important;
            border: 1px solid #cbb2fe !important;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #9d4edd !important;
            box-shadow: 0 0 6px #c77dff !important;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Inventario Tienda </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('productos.index') }}">Productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('categorias.index') }}">Categorías</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        <p>💗 Sistema de Inventario | Laravel 10</
