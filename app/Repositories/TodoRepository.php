<?php

namespace App\Repositories;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Collection;

class TodoRepository
{
    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Todo::all();
    }

    /**
     * @param int $id
     *
     * @return Todo
     */
    public function findById(int $id): Todo
    {
        return Todo::findOrFail($id);
    }

    /**
     * @param array $data
     *
     * @return Todo
     */
    public function create(array $data): Todo
    {
        return Todo::create($data);
    }

    /**
     * @param int $id
     * @param array $data
     *
     * @return Todo
     */
    public function update(int $id, array $data): Todo
    {
        $todo = $this->findById($id);
        $todo->update($data);

        return $todo;
    }

    /**
     * @param int $id
     *
     * @return int
     */
    public function delete(int $id): int
    {
        return Todo::destroy($id);
    }
}
