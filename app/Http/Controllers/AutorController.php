<?php

namespace App\Http\Controllers;

use App\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index()
    {
        // Obtener todos los autores y mostrarlos en la vista
        $autores = Autor::all();
        return view('autores.index', compact('autores'));
    }

    public function create()
    {
        // Mostrar el formulario para crear un nuevo autor
        return view('autores.create');
    }

    public function store(Request $request)
    {
        // Validar y almacenar el nuevo autor en la base de datos
        $request->validate([
            'nombre' => 'required',
        ]);

        Autor::create($request->all());
        return redirect()->route('autores.index')->with('success', 'Autor creado exitosamente.');
    }

    public function show(Autor $autor)
    {
        // Mostrar los detalles de un autor específico
        return view('autores.show', compact('autor'));
    }

    public function edit(Autor $autor)
    {
        // Mostrar el formulario para editar un autor
        return view('autores.edit', compact('autor'));
    }

    public function update(Request $request, Autor $autor)
    {
        // Validar y actualizar la información de un autor en la base de datos
        $request->validate([
            'nombre' => 'required',
        ]);

        $autor->update($request->all());
        return redirect()->route('autores.index')->with('success', 'Autor actualizado exitosamente.');
    }

    public function destroy(Autor $autor)
    {
        // Eliminar un autor de la base de datos
        $autor->delete();
        return redirect()->route('autores.index')->with('success', 'Autor eliminado exitosamente.');
    }
}
