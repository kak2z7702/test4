<?php

namespace App\Http\Responses\Statuses;

use Illuminate\Http\Response;

class ValidationErrorStatus implements Status
{
    private const DEFAULT_ERROR_CODE = Response::HTTP_BAD_REQUEST;

    public function toString(): string
    {
        return 'validationError';
    }

    public function httpCode(): int
    {
        return self::DEFAULT_ERROR_CODE;
    }
}
