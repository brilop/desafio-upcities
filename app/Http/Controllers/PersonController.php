<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Services\PersonService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PersonController extends Controller
{

    public function __construct(private PersonService $personService) {}


    public function index()
    {
        $people = $this->personService->all();

        return view('people.index', compact('people'));
    }

    public function create()
    {
        return view('people.create');
    }

    public function store(StorePersonRequest $request)
    {
        $person = $this->personService->store($request->validated());

        return redirect()
            ->route('people.show', $person->id)
            ->with('success', 'Pessoa cadastrada com sucesso!');
    }

    public function show(int $id)
    {
        $person = $this->personService->find($id);

        return view('people.show', compact('person'));
    }

    public function edit(int $id)
    {
        $person = $this->personService->find($id);

        return view('people.create', compact('person'));
    }

    public function update(UpdatePersonRequest $request, int $id)
    {
        $person = $this->personService->update($id, $request->validated());

        return redirect()
            ->route('people.show', $person->id)
            ->with('success', 'Pessoa atualizada com sucesso!');
    }

    public function destroy(int $id)
    {
        $this->personService->delete($id);

        return redirect()
            ->route('people.index')
            ->with('success', 'Pessoa deletada com sucesso!');
    }
}
