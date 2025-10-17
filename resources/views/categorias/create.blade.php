@extends('layouts.app')

@section('content')
<style>
    /* 🎨 Estilos simples en tonos morados */
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
        color: white;
    }

    .btn-gris {
        background-color: #6c757d;
        color: white;
        border: none;
    }

    .btn-gris:hover {
        background-color: #5a6268;
        color: white;
    }
</style>

<div class="form-card mt-5">
    <h2 class="titulo-form">Nueva Categoría</h2>

    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-morado px-4">Guardar</button>
            <a href="{{ route('categorias.index') }}" class="btn btn-gris px-4">Volver</a>
        </div>
    </form>
</div>
@endsection
