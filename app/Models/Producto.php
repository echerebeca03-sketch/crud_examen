<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
    'nombre',
    'descripcion',
    'precio',
    'stock',
    'categoria_id',
    'codigo_barras',
    'imagen',
    'activo'
];
// Esto te dice Una categoría tiene muchos productos.
public function categoria()
{
    return $this->belongsTo(Categoria::class);
}
}