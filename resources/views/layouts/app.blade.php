<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestión de Productos')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Inventario</a>
            <div>
                <a href="{{ route('productos.index') }}" class="btn btn-outline-light btn-sm me-2">Productos</a>
                <a href="{{ route('categorias.index') }}" class="btn btn-outline-light btn-sm">Categorías</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <style>
    .btn-morado {
        background-color: #6f42c1;
        color: white;
        border: none;
        padding: 8px 15px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        transition: background 0.2s;
    }

    .btn-morado:hover {
        background-color: #5a32a3;
    }

    .form-control,
    .form-select {
        border-radius: 6px;
        border: 1px solid #ccc;
        padding: 8px;
    }
</style>

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
