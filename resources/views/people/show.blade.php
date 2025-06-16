<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Detalhes da Pessoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="p-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Detalhes</h1>
            <a href="{{ route('people.index') }}" class="btn btn-secondary">Voltar</a>
        </div>

        <ul class="list-group mb-4">
            <li class="list-group-item"><strong>Nome:</strong> {{ $person->name }}</li>
            <li class="list-group-item"><strong>CPF:</strong> {{ $person->cpf }}</li>
            <li class="list-group-item"><strong>E-mail:</strong> {{ $person->email }}</li>
            <li class="list-group-item"><strong>Telefone:</strong> {{ $person->phone }}</li>
            <li class="list-group-item"><strong>Data de Nascimento:</strong>
                {{ \Carbon\Carbon::parse($person->birth_date)->format('d-m-Y') }}</li>
            <li class="list-group-item"><strong>Logradouro:</strong> {{ $person->public_space }}</li>
            <li class="list-group-item"><strong>Cidade:</strong> {{ $person->city }}</li>
            <li class="list-group-item"><strong>Estado:</strong> {{ $person->state }}</li>
        </ul>

        <a href="{{ route('people.edit', $person->id) }}" class="btn btn-warning">Editar</a>

        <form action="{{ route('people.delete', $person->id) }}" method="POST" class="d-inline"
            onsubmit="return confirm('Tem certeza que deseja deletar esta pessoa?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Deletar</button>
        </form>
    </div>
</body>

</html>
