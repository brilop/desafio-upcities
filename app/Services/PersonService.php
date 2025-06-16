<?php

namespace App\Services;

use App\Models\Person;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Interfaces\PersonRepositoryInterface;

class PersonService
{

    public function __construct(protected PersonRepositoryInterface $personRepository) {}

    public function all(): Collection
    {
        return $this->personRepository->all();
    }

    public function store(array $data): Person
    {
        return $this->personRepository->create($data);
    }

    public function update(int $id, array $data): Person
    {
        return $this->personRepository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->personRepository->delete($id);
    }

    public function find(int $id): Person
    {
        return $this->personRepository->find($id);
    }
}
