<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grupo;
use App\Http\Requests\GrupoRequest;

class GruposController extends Controller
{
    public function index()
    {
        $grupos = Grupo::all();
        return view('grupos.index', compact('grupos'));
    }

    public function create()
    {
        return view('grupos.create');
    }

    public function store(GrupoRequest $request)
    {
        $grupo = new Grupo();
        $grupo->semestre = $request->input('semestre');
        $grupo->grupo = $request->input('grupo');
        $grupo->turno = $request->input('turno');
        $grupo->save();
        return redirect()->route('grupos.index');
    }

    public function edit($id)
    {
        $grupo = Grupo::find($id);
        return view('grupos.edit', compact('grupo'));
    }

    public function update(GrupoRequest $request, $id)
    {
        $grupo = Grupo::find($id);
        $grupo->semestre = $request->input('semestre');
        $grupo->grupo = $request->input('grupo');
        $grupo->turno = $request->input('turno');
        $grupo->save();
        return redirect()->route('grupos.index');
    }

    public function destroy($id)
    {
        $grupo = Grupo::find($id);
        $grupo->delete();
        return redirect()->route('grupos.index');
    }
}
