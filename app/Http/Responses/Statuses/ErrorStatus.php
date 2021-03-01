<?php

namespace App\Http\Responses\Statuses;

use App\Exceptions\Http\ResponseCantBeCreatedException;

class ErrorStatus implements Status
{
    private const DEFAULT_ERROR_CODE = 500;

    private int $httpCode;

    /**
     * ErrorStatus constructor.
     * @param int $httpCode
     * @throws ResponseCantBeCreatedException
     */
    public function __construct(int $httpCode = self::DEFAULT_ERROR_CODE)
    {
        if ($httpCode >= 200 && $httpCode < 300 ) {
            throw new ResponseCantBeCreatedException("Status code for error response can't be 2xx.");
        }

        $this->httpCode = $httpCode;
    }

    public function toString(): string
    {
        return 'error';
    }

    public function httpCode(): int
    {
        return $this->httpCode;
    }
}
