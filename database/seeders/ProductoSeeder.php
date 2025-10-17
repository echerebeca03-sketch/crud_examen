<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        $productos = [
            [
                'nombre' => 'iPhone 15 Pro',
                'descripcion' => 'Smartphone de gama alta con chip A17 Pro',
                'precio' => 6499.00,
                'stock' => 10,
                'categoria_id' => 1,
                'codigo_barras' => 'IP15PRO123',
            ],
            [
                'nombre' => 'Samsung Galaxy S24',
                'descripcion' => 'Teléfono con pantalla AMOLED y cámara avanzada',
                'precio' => 5899.00,
                'stock' => 8,
                'categoria_id' => 1,
                'codigo_barras' => 'SGS24123',
            ],
            [
                'nombre' => 'MacBook Air M2',
                'descripcion' => 'Laptop Apple ultraligera con chip M2',
                'precio' => 7999.00,
                'stock' => 6,
                'categoria_id' => 2,
                'codigo_barras' => 'MBAIRM2123',
            ],
            [
                'nombre' => 'Dell XPS 13',
                'descripcion' => 'Portátil premium con pantalla InfinityEdge',
                'precio' => 7599.00,
                'stock' => 5,
                'categoria_id' => 2,
                'codigo_barras' => 'DXPS13123',
            ],
            [
                'nombre' => 'AirPods Pro',
                'descripcion' => 'Auriculares inalámbricos con cancelación de ruido',
                'precio' => 1099.00,
                'stock' => 12,
                'categoria_id' => 3,
                'codigo_barras' => 'APPRO123',
            ],
            [
                'nombre' => 'Logitech MX Master 3',
                'descripcion' => 'Ratón inalámbrico ergonómico de alto rendimiento',
                'precio' => 499.00,
                'stock' => 15,
                'categoria_id' => 3,
                'codigo_barras' => 'LMM3123',
            ],
        ];

        foreach ($productos as $p) {
            Producto::create($p);
        }
    }
}
