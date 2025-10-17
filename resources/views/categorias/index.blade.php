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
        background-color: #d4191f;
        border: none;
    }

    .btn-danger:hover {
        background-color: #411fda;
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
    <h2>Lista de Categorías</h2>

    <a href="{{ route('categorias.create') }}" class="btn btn-primary mb-3">Nueva Categoría</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->nombre }}</td>
                <td>{{ $categoria->descripcion }}</td>
                <td>
                    <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar categoría?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
