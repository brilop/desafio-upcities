<?php

namespace App\Repositories;

use App\Models\Person;
use App\Repositories\Interfaces\PersonRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PersonRepository implements PersonRepositoryInterface
{

    public function __construct(protected Person $person) {}

    public function all(): Collection
    {
        return $this->person->all();
    }

    public function create(array $data): Person
    {
        return $this->person->create($data);
    }

    public function update(int $id, array $data): Person
    {
        $person = $this->person->findOrFail($id);

        $person->update($data);

        return $person;
    }

    public function delete(int $id): bool
    {
        $person = $this->person->findOrFail($id);

        return $person->delete();
    }

    public function find(int $id): Person
    {
        return $this->person->findOrFail($id);
    }
}
