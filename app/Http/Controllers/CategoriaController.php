<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        // Obtener todas las categorías y mostrarlas en la vista
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        // Mostrar el formulario para crear una nueva categoría
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        // Validar y almacenar la nueva categoría en la base de datos
        $request->validate([
            'nombre' => 'required',
        ]);

        Categoria::create($request->all());
        return redirect()->route('categorias.index')->with('success', 'Categoría creada exitosamente.');
    }

    public function show(Categoria $categoria)
    {
        // Mostrar los detalles de una categoría específica
        return view('categorias.show', compact('categoria'));
    }

    public function edit(Categoria $categoria)
    {
        // Mostrar el formulario para editar una categoría
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        // Validar y actualizar la información de una categoría en la base de datos
        $request->validate([
            'nombre' => 'required',
        ]);

        $categoria->update($request->all());
        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada exitosamente.');
    }

    public function destroy(Categoria $categoria)
    {
        // Eliminar una categoría de la base de datos
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada exitosamente.');
    }
}
