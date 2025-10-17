@extends('layouts.app')

@section('content')
<style>
    /*Estilos personalizados del panel */
    body {
        background-color: #f9f6ff;
    }

    h1, h2 {
        color: #5a32a3;
        font-weight: bold;
    }

    .panel-card {
        background-color: #fff;
        border: 1px solid #d4b8ff;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 4px 8px rgba(128, 0, 128, 0.08);
        margin-bottom: 30px;
    }

    .table-custom {
        background-color: #faf6ff;
        border: 1px solid #e1c9ff;
        border-radius: 10px;
        overflow: hidden;
        width: 100%;
    }

    .table-custom th {
        background-color: #6f42c1;
        color: white;
    }

    .table-custom td {
        background-color: #fff;
        vertical-align: middle;
    }

    .table-custom tr:hover td {
        background-color: #f3e8ff;
    }
</style>

<div class="container">
    <h1 class="mb-4">Panel de Inventario</h1>
     <!-- esto muestra las estadísticas en tarjetas de colores. -->
     <div class="row mb-4 text-center">
    <div class="col-md-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5>Total Categorías</h5>
                <h3>{{ $totalCategorias }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5>Total Productos</h5>
                <h3>{{ $totalProductos }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-info">
            <div class="card-body">
                <h5>Stock Total</h5>
                <h3>{{ $stockTotal }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-danger">
            <div class="card-body">
                <h5>Stock Bajo</h5>
                <h3>{{ $stockBajo }}</h3>
            </div>
        </div>
    </div>
</div>


    <!-- CATEGORÍAS -->
    <div class="panel-card">
        <h2>Categorías</h2>
        <table class="table table-bordered table-custom mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nombre }}</td>
                        <td>{{ $categoria->descripcion }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- PRODUCTOS -->
    <div class="panel-card">
        <h2>Productos</h2>
        <table class="table table-bordered table-custom mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Categoría</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>S/ {{ number_format($producto->precio, 2) }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>{{ $producto->categoria->nombre ?? 'Sin categoría' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
