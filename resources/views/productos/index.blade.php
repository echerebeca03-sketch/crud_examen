@extends('layouts.app')

@section('content')
<style>
    .table-custom {
        background-color: #faf6ff;
        border: 1px solid #e1c9ff;
        border-radius: 10px;
        overflow: hidden;
    }

    .table-custom th {
        background-color: #6f42c1;
        color: white;
    }

    .table-custom td {
        vertical-align: middle;
    }

    .btn-edit {
        background-color: #a46bff;
        color: white;
        border: none;
    }

    .btn-edit:hover {
        background-color: #864ed8;
    }

    .btn-danger {
        background-color: #e74c3c;
        border: none;
    }

    .btn-danger:hover {
        background-color: #c0392b;
    }

    h1, h2 {
        color: #5a32a3;
        font-weight: bold;
    }

    .btn-primary {
        background-color: #6f42c1;
        border: none;
    }

    .btn-primary:hover {
        background-color: #5a32a3;
    }
</style>

<div class="container mt-4">
    <h2>Productos</h2>

    <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">+ Nuevo Producto</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
   <form method="GET" action="{{ route('productos.index') }}" class="mb-3 d-flex gap-2">
    <input type="text" name="search" placeholder="Buscar producto" class="form-control" value="{{ request('search') }}">
    <select name="categoria" class="form-select">
        <option value="">Todas las categorías</option>
        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
        @endforeach
    </select>
    <select name="stock" class="form-select">
        <option value="">Todos los stocks</option>
        <option value="bajo">Stock bajo</option>
        <option value="alto">Stock alto</option>
    </select>
    <button type="submit" class="btn-morado">Buscar</button>
</form>



    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th> {{-- ← Añadido --}}
                <th>Precio</th>
                <th>Stock</th>
                <th>Categoría</th>
                <th>Código Barras</th>
                <th>Activo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->descripcion }}</td> {{-- ← Añadido --}}
                <td>S/ {{ number_format($producto->precio, 2) }}</td>
                <td>{{ $producto->stock }}</td>
                <td>{{ $producto->categoria->nombre ?? 'Sin categoría' }}</td>
                <td>{{ $producto->codigo_barras }}</td>
                <td>{{ $producto->activo ? 'Sí' : 'No' }}</td>
                <td>
                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar producto?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
</div>
@endsection
