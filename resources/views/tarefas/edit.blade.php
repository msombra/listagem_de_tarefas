<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Painel de Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

    <div class="container w-50 mx-auto mt-5 bg-dark bg-opacity-10 bg-gradient border rounded">
        <div class="mt-3 text-center">
            <h3>Editar Tarefa #{{ $tarefa->id }}</h3>
            <hr>
        </div>
        <form action="{{ route('tarefas.update', $tarefa->id) }}" method="post">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="titulo" class="form-label fw-bold">Título</label>
                <input type="text" name="titulo" class="form-control border-primary" id="titulo" value="{{ $tarefa->titulo }}" placeholder="">
                @if ($errors->has('titulo'))
                    <small class="text-danger"><i>Campo de preenchimento obrigatório</i></small>
                @endif
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label fw-bold">Descrição</label>
                <textarea class="form-control border-primary" name="descricao" id="descricao" rows="3">{{ $tarefa->descricao }}</textarea>
            </div>
            <div class="mb-3 d-flex justify-content-end">
                <a href="{{ route('tarefas.index') }}" class="btn btn-dark me-2">Voltar</a>
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
