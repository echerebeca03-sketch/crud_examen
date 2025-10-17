<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCategorias = Categoria::count();
        $totalProductos = Producto::count();
        $stockTotal = Producto::sum('stock');
        $stockBajo = Producto::where('stock', '<', 5)->count();

        $categorias = Categoria::all();
        $productos = Producto::with('categoria')->get();

        return view('dashboard', compact(
            'totalCategorias',
            'totalProductos',
            'stockTotal',
            'stockBajo',
            'categorias',
            'productos'
        ));
    }
}
