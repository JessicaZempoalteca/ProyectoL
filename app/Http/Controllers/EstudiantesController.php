<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estudiante;
use App\Grupo;
use App\Http\Requests\EstudianteRequest;

class EstudiantesController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::with('grupo')->get();
        return view('estudiantes.index',  compact('estudiantes'));
    }

    public function create()
    {
        $grupos = Grupo::all();
        return view('estudiantes.create', compact('grupos'));
    }

    public function store(EstudianteRequest $request)
    {
        $estudiante = new Estudiante();
        $estudiante->nombre = $request->input('nombre');
        $estudiante->apellidos = $request->input('apellidos');
        $estudiante->edad = $request->input('edad');
        $estudiante->email = $request->input('email');
        $estudiante->telefono = $request->input('telefono');
        $estudiante->grupo_id = $request->input('grupo_id');
        $estudiante->save();
        return redirect()->route('estudiantes.index');
    }

    public function edit($id)
    {
        $grupos = Grupo::all();
        $estudiante = Estudiante::with('grupo')->find($id);
        return view('estudiantes.edit', compact('estudiante', 'grupos'));
    }

    public function update(EstudianteRequest $request, $id)
    {
        $estudiante = Estudiante::find($id);
        $estudiante->nombre = $request->input('nombre');
        $estudiante->apellidos = $request->input('apellidos');
        $estudiante->edad = $request->input('edad');
        $estudiante->email = $request->input('email');
        $estudiante->telefono = $request->input('telefono');
        $estudiante->grupo_id = $request->input('grupo_id');
        $estudiante->save();
        return redirect()->route('estudiantes.index');
    }

    public function destroy($id)
    {
        $estudiante = Estudiante::find($id);
        $estudiante->delete();
        return redirect()->route('estudiantes.index');
    }
}
