@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <!-- Título -->
    <h2 class="text-center fw-bold mb-4" style="color:#7b2cbf;">
         Listado de Productos
    </h2>

    <!-- Filtros -->
    <div class="card shadow-sm border-0 mb-4" style="background-color:#f8f4ff; border-radius:12px;">
        <div class="card-body">
            <form method="GET" action="{{ route('productos.index') }}" class="row g-2 align-items-center">
                <div class="col-md-4">
                    <input type="text" name="nombre" value="{{ request('nombre') }}"
                        class="form-control" placeholder="🔍 Buscar por nombre...">
                </div>
                <div class="col-md-3">
                    <select name="categoria_id" class="form-select">
                        <option value="">📂 Todas las categorías</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ request('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="stock" class="form-select">
                        <option value="">📦 Filtro de stock</option>
                        <option value="bajo" {{ request('stock') == 'bajo' ? 'selected' : '' }}>Stock Bajo</option>
                        <option value="alto" {{ request('stock') == 'alto' ? 'selected' : '' }}>Stock Alto</option>
                    </select>
                </div>
                <div class="col-md-2 text-end">
                    <button type="submit" class="btn text-white w-100" style="background-color:#b75cff;">Buscar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Botón nuevo producto -->
    <div class="text-end mb-3">
        <a href="{{ route('productos.create') }}" class="btn text-white fw-semibold shadow-sm"
           style="background-color:#d291ff; border:none; border-radius:8px;">
           ➕ Nuevo Producto
        </a>
    </div>

    <!-- Tabla de productos -->
    <div class="card shadow-sm border-0" style="border-radius:15px;">
        <div class="card-header text-white fw-bold" style="background-color:#7b2cbf;">
            🛍️ Productos Registrados
        </div>

        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0 text-center">
                <thead style="background-color:#e9d8fd; color:#4a148c;">
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Activo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($productos) && count($productos) > 0)
                        @foreach($productos as $producto)
                            <tr>
                                <td>{{ $producto->id }}</td>
                                <td>
                                    <img src="{{ $producto->imagen ?? 'https://via.placeholder.com/60x60?text=Sin+Imagen' }}"
                                         alt="imagen"
                                         style="width:60px; height:60px; border-radius:10px; object-fit:cover;">
                                </td>
                                <td>{{ $producto->nombre }}</td>
                                <td>{{ $producto->categoria->nombre ?? 'Sin categoría' }}</td>
                                <td>${{ number_format($producto->precio, 2) }}</td>
                                <td>
                                    @if($producto->stock < 5)
                                        <span class="badge bg-danger">{{ $producto->stock }}</span>
                                    @elseif($producto->stock < 10)
                                        <span class="badge bg-warning text-dark">{{ $producto->stock }}</span>
                                    @else
                                        <span class="badge bg-success">{{ $producto->stock }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if($producto->activo)
                                        <span class="badge" style="background-color:#b983ff;">Activo</span>
                                    @else
                                        <span class="badge bg-secondary">Inactivo</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-sm text-white"
                                       style="background-color:#ccc8d1;">✏️</a>
                                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm text-white"
                                                style="background-color:#1c040a;"
                                                onclick="return confirm('¿Seguro que deseas eliminar este producto?')">
                                            🗑️
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">
                                No hay productos registrados 🛒
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
