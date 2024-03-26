<?php

namespace App\Http\Controllers;

use App\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index()
    {
        // Obtener todos los libros y mostrarlos en la vista
        $libros = Libro::all();
        return view('libros.index', compact('libros'));
    }

    public function create()
    {
        // Mostrar el formulario para crear un nuevo libro
        return view('libros.create');
    }

    public function store(Request $request)
    {
        // Validar y almacenar el nuevo libro en la base de datos
        $request->validate([
            'titulo' => 'required',
            'autor_id' => 'required',
            'anio' => 'required',
            'categoria_id' => 'required',
        ]);

        Libro::create($request->all());
        return redirect()->route('libros.index')->with('success', 'Libro creado exitosamente.');
    }

    public function show(Libro $libro)
    {
        // Mostrar los detalles de un libro específico
        return view('libros.show', compact('libro'));
    }

    public function edit(Libro $libro)
    {
        // Mostrar el formulario para editar un libro
        return view('libros.edit', compact('libro'));
    }

    public function update(Request $request, Libro $libro)
    {
        // Validar y actualizar la información de un libro en la base de datos
        $request->validate([
            'titulo' => 'required',
            'autor_id' => 'required',
            'anio' => 'required',
            'categoria_id' => 'required',
        ]);

        $libro->update($request->all());
        return redirect()->route('libros.index')->with('success', 'Libro actualizado exitosamente.');
    }

    public function destroy(Libro $libro)
    {
        // Eliminar un libro de la base de datos
        $libro->delete();
        return redirect()->route('libros.index')->with('success', 'Libro eliminado exitosamente.');
    }
}

