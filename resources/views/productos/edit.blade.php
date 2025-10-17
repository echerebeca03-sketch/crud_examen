@extends('layouts.app')

@section('content')
    <h2 class="title mb-3">Editar Producto</h2>

    <div class="box">
        <form method="POST" action="{{ route('productos.update', $producto) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="{{ $producto->nombre }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Código de Barras</label>
                    <input type="text" name="codigo_barras" class="form-control" value="{{ $producto->codigo_barras }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Precio</label>
                    <input type="number" name="precio" step="0.01" class="form-control" value="{{ $producto->precio }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Stock</label>
                    <input type="number" name="stock" class="form-control" value="{{ $producto->stock }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Categoría</label>
                    <select name="categoria_id" class="form-select" required>
                        @foreach($categorias as $cat)
                            <option value="{{ $cat->id }}" {{ $producto->categoria_id == $cat->id ? 'selected' : '' }}>
                                {{ $cat->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Imagen</label>
                    <input type="file" name="imagen" class="form-control">
                    @if($producto->imagen)
                        <img src="{{ asset('storage/' . $producto->imagen) }}" width="80" class="mt-2 rounded">
                    @endif
                </div>
                <div class="col-12">
                    <label class="form-label">Descripción</label>
                    <textarea name="descripcion" rows="3" class="form-control">{{ $producto->descripcion }}</textarea>
                </div>
                <div class="col-12 text-end">
                    <button class="btn btn-purple">Actualizar</button>
                    <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary">Volver</a>
                </div>
            </div>
        </form>
    </div>
@endsection
