@extends('layouts.app')

@section('content')
<style>
    .form-card {
        background-color: #f9f6ff;
        border: 1px solid #d4b8ff;
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 4px 8px rgba(128, 0, 128, 0.1);
        max-width: 600px;
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
    <h2 class="titulo-form">Editar Categoría</h2>

    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $categoria->nombre) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control">{{ old('descripcion', $categoria->descripcion) }}</textarea>
        </div>

        <button type="submit" class="btn btn-morado">Actualizar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection
