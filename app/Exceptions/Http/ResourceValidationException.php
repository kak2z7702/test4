<?php

namespace App\Exceptions\Http;

use Exception;
use Illuminate\Validation\ValidationException;

class ResourceValidationException extends Exception
{
    public function __construct(ValidationException $exception, $called)
    {
        parent::__construct($this->makeMessage($exception, $called), 422);
    }

    protected function makeMessage(ValidationException $exception, $called): string
    {
        $called = $called === false ? 'Unknown resource' : $called;
        $exceptionMessage = sprintf('%s validation error : ', $called);
        foreach ($exception->validator->getMessageBag()->getMessages() as $errorKey => $messages) {
            $exceptionMessage .= sprintf('%s => %s ',
                $errorKey,
                implode(', ', $messages)
            );

        }
        return $exceptionMessage;
    }
}
