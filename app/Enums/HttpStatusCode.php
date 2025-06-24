<?php

namespace App\Enums;

enum HttpStatusCode: int
{
    /**
     * OK - Request succeeded
     */
    case OK = 200;

    /**
     * Created - Resource successfully created
     */
    case CREATED = 201;

    /**
     * No Content - Request succeeded, no response body
     */
    case NO_CONTENT = 204;


    /**
     * Bad Request - Invalid input or validation failed
     */
    case BAD_REQUEST = 400;

    /**
     * Unauthorized - Authentication required or failed
     */
    case UNAUTHORIZED = 401;

    /**
     * Forbidden - User does not have permission
     */
    case FORBIDDEN = 403;

    /**
     * Not Found - Resource does not exist
     */
    case NOT_FOUND = 404;

    /**
     * Conflict - Resource already exists or logical conflict
     */
    case CONFLICT = 409;

    /**
     * Unprocessable Entity - Validation failed, semantically incorrect
     */
    case UNPROCESSABLE_ENTITY = 422;


    /**
     * Internal Server Error - Generic server failure
     */
    case INTERNAL_SERVER_ERROR = 500;

    /**
     * Service Unavailable - External dependency or service is down
     */
    case SERVICE_UNAVAILABLE = 503;
}
