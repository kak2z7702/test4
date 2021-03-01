<?php

namespace App\Exceptions\Business;

use Exception;

class LogicValidationException extends Exception
{
    protected $code = 422;
}
