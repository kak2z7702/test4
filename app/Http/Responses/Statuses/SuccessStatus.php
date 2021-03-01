<?php

namespace App\Http\Responses\Statuses;

use App\Exceptions\Http\ResponseCantBeCreatedException;

class SuccessStatus implements Status
{
    private const DEFAULT_SUCCESS_CODE = 200;

    private int $httpCode;

    /**
     * SuccessStatus constructor.
     * @param int $httpCode
     * @throws ResponseCantBeCreatedException
     */
    public function __construct(int $httpCode = self::DEFAULT_SUCCESS_CODE)
    {
        if ($httpCode < 200 || $httpCode > 204 ) {
            throw new ResponseCantBeCreatedException("Status code for success response can't be less 200 and more 204.");
        }

        $this->httpCode = $httpCode;
    }

    public function toString(): string
    {
        return 'success';
    }

    public function httpCode(): int
    {
        return 200;
    }
}
