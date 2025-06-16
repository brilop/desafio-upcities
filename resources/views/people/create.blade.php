<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ isset($person) ? 'Editar Pessoa' : 'Criar Pessoa' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="p-4">
    <div class="container">
        <h1>{{ isset($person) ? 'Editar Pessoa' : 'Cadastrar Pessoa' }}</h1>

        <form id="personForm" method="POST"
            action="{{ isset($person) ? route('people.update', $person->id) : route('people.store') }}">
            @csrf
            @if (isset($person))
                @method('PUT')
                <input type="hidden" id="personId" value="{{ $person->id }}">
            @endif
            <div class="mb-3">
                <label>Nome</label>
                <input type="text" name="name" class="form-control" id="name"
                    value="{{ old('name', $person->name ?? '') }}" required />
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label>CPF</label>
                <input type="text" name="cpf" class="form-control" id="cpf"
                    value="{{ old('cpf', $person->cpf ?? '') }}" required />
                @error('cpf')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label>Data de nascimento</label>
                <input type="date" name="birth_date" class="form-control" id="birth_date"
                    value="{{ old('birth_date', $person->birth_date ?? '') }}" required />
                @error('birth_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label>E-mail</label>
                <input type="email" name="email" class="form-control" id="email"
                    value="{{ old('email', $person->email ?? '') }}" required />
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label>Telefone</label>
                <input type="text" name="phone" class="form-control" id="phone"
                    value="{{ old('phone', $person->phone ?? '') }}" required />
                @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label>Estado</label>
                <select name="state" id="state" class="form-control" required></select>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label>Cidade</label>
                <select name="city" id="city" class="form-control" required></select>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label>Logradouro</label>
                <input type="text" name="public_space" class="form-control" id="public_space"
                    value="{{ old('public_space', $person->public_space ?? '') }}" required />
                @error('public_space')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>

        </form>
    </div>

    <script>
        const selectedState = @json(old('state', $person->state ?? ''));
        const selectedCity = @json(old('city', $person->city ?? ''));
        const API_BASE = "{{ url('/api') }}";

        const stateSelect = document.getElementById('state');
        const citySelect = document.getElementById('city');

        async function loadStates(selected = null) {
            try {
                const res = await fetch(`${API_BASE}/states`);
                const states = await res.json();

                stateSelect.innerHTML = '<option value="">Selecione o Estado</option>';
                states.forEach(state => {
                    const option = document.createElement("option");
                    option.value = state.sigla;
                    option.textContent = state.nome;
                    stateSelect.appendChild(option);
                });

                if (selected) {
                    stateSelect.value = selected;
                    await loadCities(selected, selectedCity);
                }
            } catch (e) {
                alert('Erro ao carregar estados');
            }
        }

        async function loadCities(uf, selected = null) {
            if (!uf) return citySelect.innerHTML = '<option value="">Selecione a Cidade</option>';
            try {
                const res = await fetch(`${API_BASE}/states/${uf}/cities`);
                const cities = await res.json();

                citySelect.innerHTML = '<option value="">Selecione a Cidade</option>';
                cities.forEach(city => {
                    const option = document.createElement("option");
                    option.value = city.nome;
                    option.textContent = city.nome;
                    citySelect.appendChild(option);
                });

                if (selected) citySelect.value = selected;
            } catch (e) {
                alert('Erro ao carregar cidades');
            }
        }

        stateSelect.addEventListener('change', () => {
            const uf = stateSelect.value;
            loadCities(uf);
        });

        loadStates(selectedState);
    </script>
</body>

</html>
