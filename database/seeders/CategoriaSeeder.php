<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            ['nombre' => 'Smartphones', 'descripcion' => 'Teléfonos móviles avanzados'],
            ['nombre' => 'Laptops', 'descripcion' => 'Portátiles de alto rendimiento'],
            ['nombre' => 'Accesorios', 'descripcion' => 'Periféricos y complementos'],
        ];

        foreach ($categorias as $cat) {
            Categoria::create($cat);
        }
    }
}
