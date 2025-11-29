<?php

namespace App\Http\Controllers;

use App\Enums\HttpStatusCode;
use App\Http\Resources\TodoResource;
use App\Services\TodoService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Todo Controller
 *
 * @package App\Http\Controllers
 */
class TodoController extends BaseController
{
    /**
     * @param TodoService $todoService
     */
    public function __construct(readonly TodoService $todoService)
    {
        //
    }

    /**
     * Get all todos.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->sendSuccessResponse(
            TodoResource::collection($this->todoService->getAllTodos())
        );
    }

    /**
     * Get a specific todo by ID.
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return $this->sendSuccessResponse(
            new TodoResource($this->todoService->getTodoById($id))
        );
    }

    /**
     * Create a new todo.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $data = $request->validate([
                'title'       => 'required|string|max:255',
                'description' => 'nullable|string',
                'completed'   => 'boolean',
            ]);

            return $this->sendSuccessResponse(
                new TodoResource($this->todoService->createTodo($data)),
                '',
                HttpStatusCode::CREATED->value
            );
        } catch (Exception $e) {
            return $this->sendErrorResponse(
                $e->getMessage(),
                HttpStatusCode::INTERNAL_SERVER_ERROR->value
            );
        }
    }

    /**
     * Update an existing todo.
     *
     * @param Request $request
     * @param int $id
     *
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $data = $request->validate([
                'title'       => 'sometimes|required|string|max:255',
                'description' => 'nullable|string',
                'completed'   => 'boolean',
            ]);

            return $this->sendSuccessResponse(
                new TodoResource($this->todoService->updateTodo($id, $data))
            );
        } catch (Exception $e) {
            return $this->sendErrorResponse(
                $e->getMessage(),
                HttpStatusCode::INTERNAL_SERVER_ERROR->value
            );
        }
    }

    /**
     * Delete a todo.
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $this->todoService->deleteTodo($id);
            return $this->sendSuccessResponse();
        } catch (Exception $e) {
            return $this->sendErrorResponse(
                $e->getMessage(),
                HttpStatusCode::INTERNAL_SERVER_ERROR->value
            );
        }
    }
}
