@extends('layouts.app')

@section('content')
    <h2 class="title mb-4">Panel de Inventario</h2>

    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card-stat card-blue text-center">
                <h5>Total Categorías</h5>
                <h2>{{ $totalCategorias }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-stat card-green text-center">
                <h5>Total Productos</h5>
                <h2>{{ $totalProductos }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-stat card-cyan text-center">
                <h5>Stock Total</h5>
                <h2>{{ $stockTotal }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-stat card-red text-center">
                <h5>Stock Bajo</h5>
                <h2>{{ $stockBajo }}</h2>
            </div>
        </div>
    </div>

    <div class="box mb-4">
        <h4 class="title">Categorías</h4>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nombre }}</td>
                        <td>{{ $categoria->descripcion }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="box">
        <h4 class="title">Productos</h4>
        <table class="table mt-3">
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
                @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>S/ {{ number_format($producto->precio, 2) }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>{{ $producto->categoria->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
