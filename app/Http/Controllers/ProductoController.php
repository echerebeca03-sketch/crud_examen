<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
   public function index(Request $request)
{
    $query = Producto::query()->with('categoria');

    if ($request->filled('nombre')) {
        $query->where('nombre', 'like', '%' . $request->nombre . '%');
    }

    if ($request->filled('categoria_id')) {
        $query->where('categoria_id', $request->categoria_id);
    }

    if ($request->filled('stock')) {
        if ($request->stock == 'bajo') {
            $query->where('stock', '<', 5);
        } elseif ($request->stock == 'alto') {
            $query->where('stock', '>=', 5);
        }
    }

    $productos = $query->get();
    $categorias = \App\Models\Categoria::all();

    return view('productos.index', compact('productos', 'categorias'));
}


   public function create()
{
    $categorias = \App\Models\Categoria::all();
    return view('productos.create', compact('categorias'));
}


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'categoria_id' => 'required',
            'codigo_barras' => 'required|unique:productos,codigo_barras',
            'imagen' => 'nullable',
            'activo' => 'boolean'
        ]);

        Producto::create($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado exitosamente.');
    }

    public function edit(Producto $producto)
{
    $categorias = \App\Models\Categoria::all();
    return view('productos.edit', compact('producto', 'categorias'));
}

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'codigo_barras' => 'required|string|max:50|unique:productos,codigo_barras' . (isset($producto) ? ',' . $producto->id : ''),
            'imagen' => 'nullable|string|max:255',
            'activo' => 'boolean'
        ]);

        $producto->update($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado exitosamente.');
    }
}
