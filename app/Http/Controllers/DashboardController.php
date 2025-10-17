<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;

class DashboardController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        $productos = Producto::with('categoria')->get();

        // Estadísticas
        $totalCategorias = $categorias->count();
        $totalProductos = $productos->count();
        $stockTotal = $productos->sum('stock');
        $stockBajo = $productos->where('stock', '<', 5)->count();

        return view('dashboard', compact(
            'categorias',
            'productos',
            'totalCategorias',
            'totalProductos',
            'stockTotal',
            'stockBajo'
        ));
    }
}
