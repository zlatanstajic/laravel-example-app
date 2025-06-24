<?php

namespace App\Http\Controllers;

use App\Enums\HttpStatusCode;
use Illuminate\Http\JsonResponse;

class BaseController extends Controller
{
    /**
     * Send a success response
     *
     * @param mixed $data
     * @param string $message
     * @param int    $code
     *
     * @return JsonResponse
     */
    protected function sendSuccessResponse(
        mixed $data = [],
        string $message = '',
        int $code = HttpStatusCode::OK->value
    ): JsonResponse {
        if (empty($message)) {
            $message = __('messages.default.success');
        }

        return response()->json([
            'data' => $data,
        ], $code);
    }

    /**
     * Send an error response
     *
     * @param string $message
     * @param int    $code
     *
     * @return JsonResponse
     */
    protected function sendErrorResponse(
        string $message,
        int $code = HttpStatusCode::BAD_REQUEST->value
    ): JsonResponse {
        return response()->json([
            'error' => $message,
        ], $code);
    }
}
