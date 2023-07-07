<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Tarefa $tarefas)
    {
        $tarefas = $tarefas->where('concluido', false)->orderBy('created_at' , 'desc')->paginate(6);

        return view('tarefas.index', compact('tarefas'));
    }

    public function completedList(Tarefa $tarefas)
    {
        $tarefas = $tarefas->where('concluido', true)->orderBy('created_at' , 'desc')->paginate(6);

        return view('tarefas.completed', compact('tarefas'));
    }

    public function completed(Tarefa $tarefa, $id) {
        $tarefa->where('id', $id)->update(['concluido' => true]);

        return redirect()->route('tarefas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tarefas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Tarefa $tarefa)
    {
        $validar = $request->validate([
            'titulo' => 'required|max:60',
            'descricao' => 'max:100'
        ]);

        $tarefa->create($validar);

        return redirect()->route('tarefas.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Tarefa $tarefas)
    {
        $tarefa = $tarefas->find($id);

        if(!$tarefa) {
            return redirect()->route('tarefas.index');
        }

        return view('tarefas.edit', compact('tarefa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request, Tarefa $tarefas)
    {
        $tarefa = $tarefas->find($id);

        $validar = $request->validate([
            'titulo' => 'required|max:30',
            'descricao' => 'max:100'
        ]);

        if(!$tarefa) {
            return redirect()->route('tarefas.index');
        }

        $tarefa->titulo = $request->input('titulo');
        $tarefa->descricao = $request->input('descricao');
        $tarefa->save($validar);

        return redirect()->route('tarefas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarefa $tarefas, $id)
    {
        $tarefa = $tarefas->find($id);

        if(!$tarefa) {
            return redirect()->route('tarefas.index');
        }

        $tarefa->delete();

        return redirect()->route('tarefas.index');
    }
}
