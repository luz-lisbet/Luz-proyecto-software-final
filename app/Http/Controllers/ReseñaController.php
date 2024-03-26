<?php

namespace App\Http\Controllers;

use App\Reseña;
use Illuminate\Http\Request;

class ReseñaController extends Controller
{
    public function index()
    {
        // Obtener todas las reseñas y mostrarlas en la vista
        $reseñas = Reseña::all();
        return view('reseñas.index', compact('reseñas'));
    }

    public function create()
    {
        // Mostrar el formulario para crear una nueva reseña
        return view('reseñas.create');
    }

    public function store(Request $request)
    {
        // Validar y almacenar la nueva reseña en la base de datos
        $request->validate([
            'contenido' => 'required',
            'usuario_id' => 'required',
            'libro_id' => 'required',
        ]);

        Reseña::create($request->all());
        return redirect()->route('reseñas.index')->with('success', 'Reseña creada exitosamente.');
    }

    public function show(Reseña $reseña)
    {
        // Mostrar los detalles de una reseña específica
        return view('reseñas.show', compact('reseña'));
    }

    public function edit(Reseña $reseña)
    {
        // Mostrar el formulario para editar una reseña
        return view('reseñas.edit', compact('reseña'));
    }

    public function update(Request $request, Reseña $reseña)
    {
        // Validar y actualizar la información de una reseña en la base de datos
        $request->validate([
            'contenido' => 'required',
            'usuario_id' => 'required',
            'libro_id' => 'required',
        ]);

        $reseña->update($request->all());
        return redirect()->route('reseñas.index')->with('success', 'Reseña actualizada exitosamente.');
    }

    public function destroy(Reseña $reseña)
    {
        // Eliminar una reseña de la base de datos
        $reseña->delete();
        return redirect()->route('reseñas.index')->with('success', 'Reseña eliminada exitosamente.');
    }
}
