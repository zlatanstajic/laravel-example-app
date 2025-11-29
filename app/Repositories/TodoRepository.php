<?php

namespace App\Repositories;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Collection;

/**
 * Todo Repository
 *
 * @package App\Repositories
 */
class TodoRepository
{
    /**
     * Get all todos.
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Todo::all();
    }

    /**
     * Find todo by ID.
     *
     * @param int $id
     *
     * @return Todo
     */
    public function findById(int $id): Todo
    {
        return Todo::findOrFail($id);
    }

    /**
     * Create a new todo.
     *
     * @param array $data
     *
     * @return Todo
     */
    public function create(array $data): Todo
    {
        return Todo::create($data);
    }

    /**
     * Update a todo.
     *
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
     * Delete a todo.
     *
     * @param int $id
     *
     * @return int
     */
    public function delete(int $id): int
    {
        return Todo::destroy($id);
    }
}
