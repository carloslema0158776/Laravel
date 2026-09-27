<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Interes;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function create()
    {
        $intereses = Interes::all();

        return view('personas.create', compact('intereses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:personas',
            'intereses' => 'array',
        ]);

        $persona = Persona::create(
            $request->only('nombre', 'email')
        );

        if ($request->has('intereses')) {
            $persona->intereses()->attach($request->intereses);
        }

        return redirect()->route('personas.create')
            ->with('success', 'Persona creada exitosamente.');
    }
}
