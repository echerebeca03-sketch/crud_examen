<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        $productos = [
            ['nombre' => 'iPhone 15 Pro', 'descripcion' => 'Última generación de Apple', 'precio' => 1299.99, 'stock' => 10, 'categoria_id' => 1, 'codigo_barras' => 'IP15PRO001', 'activo' => true],
            ['nombre' => 'Samsung Galaxy S24', 'descripcion' => 'Smartphone Samsung con IA', 'precio' => 999.99, 'stock' => 8, 'categoria_id' => 1, 'codigo_barras' => 'SGS24001', 'activo' => true],
            ['nombre' => 'MacBook Air M2', 'descripcion' => 'Portátil ultraligero', 'precio' => 1499.99, 'stock' => 5, 'categoria_id' => 2, 'codigo_barras' => 'MBAIR2025', 'activo' => true],
            ['nombre' => 'Dell XPS 13', 'descripcion' => 'Laptop compacta y potente', 'precio' => 1399.99, 'stock' => 7, 'categoria_id' => 2, 'codigo_barras' => 'DELLXPS13', 'activo' => true],
            ['nombre' => 'AirPods Pro', 'descripcion' => 'Auriculares inalámbricos Apple', 'precio' => 249.99, 'stock' => 15, 'categoria_id' => 3, 'codigo_barras' => 'APPRO001', 'activo' => true],
            ['nombre' => 'Logitech MX Master 3', 'descripcion' => 'Ratón ergonómico', 'precio' => 99.99, 'stock' => 12, 'categoria_id' => 3, 'codigo_barras' => 'LOGMXM3', 'activo' => true],
        ];

        foreach ($productos as $p) {
            Producto::create($p);
        }
    }
}
