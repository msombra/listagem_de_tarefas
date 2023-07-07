<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Tarefa $tarefa)
    {
        $tarefas = $tarefa->where('concluido', false)->orderBy('created_at' , 'desc')->paginate(6);

        $qtd_tarefas = $tarefa->where('concluido', false)->get()->count();

        return view('tarefas.index', compact('tarefas', 'qtd_tarefas'));
    }

    public function completedList(Tarefa $tarefa)
    {
        $tarefas = $tarefa->where('concluido', true)->orderBy('created_at' , 'desc')->paginate(6);

        $qtd_tarefas = $tarefa->where('concluido', true)->get()->count();

        return view('tarefas.completed', compact('tarefas', 'qtd_tarefas'));
    }

    public function completed(Tarefa $tarefa, $id) {
        $tarefa->where('id', $id)->update(['concluido' => true]);

        return redirect()->route('tarefas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Tarefa $tarefa)
    {
        return view('tarefas.create', compact('tarefa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Tarefa $tarefa)
    {
        $regras = [
            'titulo' => 'required|max:60',
            'descricao' => 'max:100'
        ];

        $mensagens = [
            'titulo.required' => 'Campo de preenchimento obrigatório',
            'titulo.max' => 'O campo não pode ter mais de 60 caracteres',
            'descricao' => 'O campo não pode ter mais de 100 caracteres'
        ];

        $validar = $request->validate($regras, $mensagens);

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
