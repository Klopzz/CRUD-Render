# 📚 Proyecto Laravel: Gestión de Libros

Este proyecto permite **crear, leer, actualizar y eliminar libros**, asociando cada uno a su respectivo autor.

---

## 🧠 Funciones del Controlador `LibrosController.php`

### ✅ `leer(Request $request)`
###
```php
public function leer(Request $request) 
{
    $busqueda = $request->input('busqueda');
    $libros = Libros::with('autor')
        ->when($busqueda, function($query, $busqueda) {
            $query->where('nombre', 'ILIKE', "%{$busqueda}%")
                  ->orWhereHas('autor', function($q) use ($busqueda) {
                      $q->where('nombre', 'ILIKE', "%{$busqueda}%");
                  });
        })
        ->orderBy('nombre', 'asc')
        ->get();
    return view('libros.leer', compact('libros'));
}
```
### 📝 `guardar(Request $request)`
###
```php
public function guardar(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:100',
        'descripcion' => 'required|string|max:200',
        'autor' => 'required|string|max:100',
    ]);
    
    $nombreLibro = mb_convert_case($request->nombre, MB_CASE_TITLE, "UTF-8");
    $nombreAutor = mb_convert_case($request->autor, MB_CASE_TITLE, "UTF-8");
    $autorNombre = trim(mb_strtolower($nombreAutor));
    $autor = Autor::whereRaw('LOWER(nombre) = ?', [$autorNombre])->first();
    if (!$autor) {
        $autor = Autor::create(['nombre' => $nombreAutor]);
    }

    $libro = new Libros();
    $libro->nombre = $nombreLibro;
    $libro->descripcion = $request->descripcion;
    $libro->autor_id = $autor->id;
    $libro->save();

    return redirect()->back()->with('success', 'Libro creado exitosamente.');
}
```
### 🌐 `Rutas web (routes/web.php)`
###
```php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibrosController;

Route::get('/', [LibrosController::class, 'leer'])->name('inicio');

Route::get('/libros/crear', [LibrosController::class, 'crear'])->name('libros.crear');   

Route::post('/libros/guardar', [LibrosController::class, 'guardar'])->name('libros.guardar');   

Route::get('/libros/leer', [LibrosController::class, 'leer'])->name('libros.leer');   

Route::put('/libros/{libro}', [LibrosController::class, 'actualizar'])->name('libros.actualizar');   

Route::delete('/libros/{libro}', [LibrosController::class, 'borrar'])->name('libros.borrar');
```

### ⚙️ Tecnologías utilizadas
###

#### Laravel 10.x

#### PHP 8.x

#### Blade (motor de plantillas)

#### PostgreSQL o MySQL

### 📂 Estructura base del proyecto
###

Copiar
Editar
app/
├── Http/
│   └── Controllers/
│       └── LibrosController.php
resources/
├── views/
│   └── libros/
│       ├── crear.blade.php
│       ├── leer.blade.php
│       └── eliminar.blade.php
routes/
└── web.php

### 📌 Notas

Este archivo es solo un ejemplo inicial de cómo documentar tu código con resaltado de sintaxis en Markdown. Podés seguir agregando fragmentos conforme avances en el proyecto.