<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Painel de Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .hover-item:hover {
            background-color: rgba(0, 191, 255, 0.1);
        }

        .hover-item:hover span {
            color: #007BFF;
            cursor: default;
        }

        .bt-search-size {
            width: 40px;
            height: 40px;
        }
    </style>
</head>
<body>

    <div class="container w-50 mx-auto mt-5">
        {{-- CABEÇALHO --}}
        <div class="row mb-3">
            <div class="col">
                <h3>Tarefas Concluídas</h3>
            </div>
            <div class="col d-flex justify-content-end">
                <button class="btn btn-primary me-2 bt-search-size" title="Pesquisar tarefa">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
                <a href="{{ route('tarefas.create') }}" title="Criar Nova Tarefa">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
                    </svg>
                </a>
            </div>
        </div>
        {{-- LISTAGEM --}}
        <div class="row">
            <ul class="list-group">
                @foreach ($tarefas as $tarefa)
                    <li class="list-group-item d-flex justify-content-between align-items-start hover-item">
                        {{-- <div class="">
                            <input class="form-check-input border-black" type="checkbox" value="" id="concluido">
                        </div> --}}
                        <div class="ms-2 me-auto">
                        <div class="fw-bold"><span>{{ ucfirst($tarefa->titulo) }}</span></div>
                        <small style="cursor:default;"><i>{{ $tarefa->descricao }}</i></small>
                        </div>
                        <div>
                            <div class="">
                                <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger" title="Deletar tarefa concluída">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        {{-- PAGINAÇÃO --}}
        <div class="d-flex justify-content-between mt-3">
            <div>
                <a href="{{ route('tarefas.index') }}" class="btn btn-dark me-2">Voltar</a>
            </div>
            <div class="d-flex justify-content align-items-center gap-3">
                @if ($qtd_tarefas > 1)
                    <small><b>Quantidade:</b> {{ $qtd_tarefas }} tarefas</small>
                @else
                    <small><b>Quantidade:</b> {{ $qtd_tarefas }} tarefa</small>
                @endif
                {{ $tarefas->links() }}
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
