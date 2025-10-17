# INFORME TÉCNICO

## 1. Arquitectura MVC Implementada

El proyecto sigue el patrón **Modelo - Vista - Controlador (MVC)** de Laravel:

- **Modelos (`app/Models`)**
  - `Producto.php`: representa los productos del inventario. Contiene las relaciones y validaciones.
  - `Categoria.php`: representa las categorías de los productos.  
    Cada producto pertenece a una categoría, y una categoría puede tener muchos productos.

- **Controladores (`app/Http/Controllers`)**
  - `DashboardController`: muestra el resumen general del inventario.
  - `ProductoController`: maneja todo el CRUD de productos (crear, leer, actualizar, eliminar).
  - `CategoriaController`: maneja el CRUD básico de categorías.

- **Vistas (`resources/views`)**
  - `layouts/app.blade.php`: plantilla base con el encabezado y el menú.
  - `productos/`: contiene las vistas del CRUD de productos (`index`, `create`, `edit`).
  - `categorias/`: vistas del CRUD de categorías (`index`, `create`, `edit`).
  - `dashboard.blade.php`: muestra estadísticas generales y tablas resumen.

Laravel se encarga de la conexión entre las capas, recibiendo peticiones, ejecutando lógica en los controladores y mostrando resultados en las vistas.

---

## 2. Diagrama de Base de Datos con Relaciones

**Tablas principales:**

**categorias**
| Campo | Tipo | Descripción |
|-------|------|--------------|
| id | int | Identificador único |
| nombre | varchar | Nombre de la categoría |
| descripcion | text | Descripción breve |
| created_at / updated_at | timestamps | Fechas automáticas |

**productos**
| Campo | Tipo | Descripción |
|-------|------|--------------|
| id | int | Identificador del producto |
| nombre | varchar | Nombre del producto |
| descripcion | text | Descripción |
| precio | decimal | Precio del producto |
| stock | int | Cantidad disponible |
| categoria_id | int | Relación con la categoría |
| codigo_barras | varchar | Código único |
| activo | boolean | Indica si está activo |
| created_at / updated_at | timestamps | Fechas automáticas |

**Relaciones:**
- 1 Categoría → muchos Productos
  - `Categoria` tiene varios `Producto`
  - `Producto` pertenece a una `Categoria`

**Diagrama (relacional):**

```
+-------------+        1    ───────<   +-------------+
| CATEGORIAS  |------------------------|  PRODUCTOS  |
+-------------+                        +-------------+
| id          |                        | id          |
| nombre      |                        | nombre      |
| descripcion |                        | descripcion |
+-------------+                        | precio      |
                                       | stock       |
                                       | categoria_id|
                                       +-------------+
```

---

## 3. Rutas y Controladores Desarrollados

**Archivo `routes/web.php`:**
```php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('productos', ProductoController::class);
Route::resource('categorias', CategoriaController::class);
```

**Controladores:**
- `DashboardController`: muestra estadísticas (total de productos, categorías y stock).
- `ProductoController`: CRUD completo con validaciones.
- `CategoriaController`: CRUD básico para categorías.

---

## 4. Capturas de Pantalla

Se incluyen las siguientes imágenes como evidencia de funcionamiento:

1. Dashboard (resumen general de categorías y productos)
2. Listado de Productos
3. Formulario Crear Producto
4. Editar Producto
5. Listado de Categorías
6. Formulario Crear Categoría
7. Filtros y búsqueda
8. Reporte de stock bajo

---

## 5. Instrucciones de Instalación y Configuración

1. Clonar o copiar el proyecto:
   ```bash
   git clone https://github.com/usuario/crud_examen.git
   cd crud_examen
   ```

2. Instalar dependencias:
   ```bash
   composer install
   npm install
   ```

3. Copiar el archivo `.env.example` y renombrarlo a `.env`:
   ```bash
   cp .env.example .env
   ```

4. Configurar la base de datos en `.env`:
   ```
   DB_DATABASE=crud_examen
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. Generar la clave de la aplicación:
   ```bash
   php artisan key:generate
   ```

6. Ejecutar migraciones y seeders:
   ```bash
   php artisan migrate:fresh --seed
   ```

7. Levantar el servidor:
   ```bash
   php artisan serve
   ```

8. Acceder desde el navegador:
   ```
   http://127.0.0.1:8000
   ```

---

## 6. Problemas Encontrados y Soluciones

| Problema | Solución Implementada |
|-----------|------------------------|
| Error: “View [categorias.index] not found” | Se creó la vista `resources/views/categorias/index.blade.php`. |
| No aparecía la descripción del producto | Se corrigió el `ProductoController` y las vistas para mostrar el campo `descripcion`. |
| Error de variable `$categorias` indefinida en el formulario de productos | Se envió la variable correctamente desde el controlador (`create` y `edit`). |
| Formularios sin estilo | Se agregó CSS personalizado con colores morados y estilos básicos en las vistas `create` y `edit`. |
| Falta de filtros | Se implementó una barra de búsqueda y selectores en `productos.index`. |
| Error en dashboard | Se corrigió el controlador `DashboardController` y se añadió `compact()` correctamente. |

---

## 7. Conclusión

El sistema cumple con las funcionalidades principales solicitadas:

- CRUD completo de productos y categorías.
- Dashboard con estadísticas.
- Búsqueda y filtros.
- Diseño simple pero funcional.
- Validaciones y mensajes de confirmación.

El proyecto demuestra la aplicación del patrón MVC, el uso de migraciones, controladores, vistas y rutas en Laravel.
