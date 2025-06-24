<?php

namespace App\Services;

use App\Models\Todo;
use App\Repositories\TodoRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TodoService
{
    /**
     * @var TodoRepository
     */
    protected $todoRepository;

    /**
     * @param TodoRepository $todoRepository
     */
    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    /**
     * @return Collection
     */
    public function getAllTodos()
    {
        return $this->todoRepository->getAll();
    }

    /**
     * @param int $id
     *
     * @return Todo
     *
     * @throws ModelNotFoundException
     */
    public function getTodoById(int $id): Todo
    {
        return $this->todoRepository->findById($id);
    }

    /**
     * @param array $data
     *
     * @return Todo
     */
    public function createTodo(array $data): Todo
    {
        return $this->todoRepository->create($data);
    }

    /**
     * @param int $id
     * @param array $data
     *
     * @return Todo
     *
     * @throws ModelNotFoundException
     */
    public function updateTodo(int $id, array $data): Todo
    {
        return $this->todoRepository->update($id, $data);
    }

    /**
     * @param int $id
     *
     * @return bool
     *
     * @throws ModelNotFoundException
     */
    public function deleteTodo(int $id): bool
    {
        return (bool) $this->todoRepository->delete($id);
    }
}
