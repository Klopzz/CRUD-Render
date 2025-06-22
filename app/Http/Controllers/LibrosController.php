<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libros; // Importamos el modelo Libros
use App\Models\Autor; // Importamos el modelo Autor

class LibrosController extends Controller
{
    public function crear() 
    {
        return view('libros.crear');
    }

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
        ->orderBy('nombre', 'asc') // <-- Ordena alfabéticamente por nombre
        ->get();
        return view('libros.leer', compact('libros'));      // Pasamos los libros a la vista
    }

    public function eliminar() 
    {
        $libros = Libros::all();                             
        return view('libros.eliminar', compact('libros'));
    }

    public function actualizar(Request $request, Libros $libro) 
    {   
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string|max:200',
            'autor' => 'required|string|max:100',
        ]);

        // Capitaliza los nombres
        $nombreLibro = mb_convert_case($request->nombre, MB_CASE_TITLE, "UTF-8");
        $nombreAutor = mb_convert_case($request->autor, MB_CASE_TITLE, "UTF-8");

        // Normaliza el nombre del autor y busca ignorando mayúsculas/minúsculas
        $autorNombre = trim(mb_strtolower($nombreAutor));
        $autor = Autor::whereRaw('LOWER(nombre) = ?', [$autorNombre])->first();
        if (!$autor) {
            $autor = Autor::create(['nombre' => $nombreAutor]);
        }

        // Actualizar el libro
        $libro->nombre = $nombreLibro;
        $libro->descripcion = $request->descripcion;
        $libro->autor_id = $autor->id;
        $libro->save();
        // Elimina el autor anterior si ya no tiene libros asociados
        $autorAnteriorId = $request->input('autor_anterior_id');
        if ($autorAnteriorId && $autorAnteriorId != $autor->id) {
            $librosConEseAutor = Libros::where('autor_id', $autorAnteriorId)->count();
            if ($librosConEseAutor == 0) {
                Autor::where('id', $autorAnteriorId)->delete();
            }
        }
        return redirect()->back()->with('success', 'Libro actualizado exitosamente.'); 
    }

    public function guardar(Request $request){

        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string|max:200',
            'autor' => 'required|string|max:100',
        ]);
        
         // Capitaliza los nombres
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

    public function borrar(Libros $libro){
        $autorId = $libro->autor_id; // Guarda el autor antes de eliminar el libro
        $libro->delete();
        // Verifica si el autor quedó huérfano
        $librosConEseAutor = Libros::where('autor_id', $autorId)->count();
        if ($librosConEseAutor == 0) {
            Autor::where('id', $autorId)->delete();
        }
        return redirect()->back()->with('success', 'Libro borrado exitosamente.');    
    }
}

