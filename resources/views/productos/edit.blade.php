@extends('layouts.app')

@section('content')
<style>
    .form-card {
        background-color: #f9f6ff;
        border: 1px solid #d4b8ff;
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 4px 8px rgba(128, 0, 128, 0.1);
        max-width: 700px;
        margin: 0 auto;
    }

    .titulo-form {
        color: #5a32a3;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
    }

    .form-label {
        color: #5e2b91;
        font-weight: 600;
    }

    .btn-morado {
        background-color: #6f42c1;
        color: white;
        border: none;
    }

    .btn-morado:hover {
        background-color: #5a32a3;
    }

    .btn-secondary {
        background-color: #aaa;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #888;
    }
</style>

<div class="form-card">
    <h2 class="titulo-form">Editar Producto</h2>

    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $producto->nombre) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control">{{ old('descripcion', $producto->descripcion) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" name="precio" id="precio" value="{{ old('precio', $producto->precio) }}" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock', $producto->stock) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoría</label>
            <select name="categoria_id" id="categoria_id" class="form-select" required>
                <option value="">Seleccione una categoría</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="codigo_barras" class="form-label">Código de Barras</label>
            <input type="text" name="codigo_barras" id="codigo_barras" value="{{ old('codigo_barras', $producto->codigo_barras) }}" class="form-control" required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="activo" id="activo" class="form-check-input" {{ $producto->activo ? 'checked' : '' }}>
            <label for="activo" class="form-check-label">Activo</label>
        </div>

        <button type="submit" class="btn btn-morado">Actualizar</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection
