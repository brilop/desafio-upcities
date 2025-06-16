<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pessoas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Pessoas</h1>
            <a href="{{ route('people.create') }}" class="btn btn-primary">Adicionar pessoa</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($people as $person)
                    <tr>
                        <td>{{ $person->name }}</td>
                        <td>{{ $person->email }}</td>
                        <td>{{ $person->phone }}</td>
                        <td>
                            <a href="{{ route('people.show', $person->id) }}" class="btn btn-sm btn-info">Detalhes</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Nenhuma pessoa encontrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>


</body>

</html>
