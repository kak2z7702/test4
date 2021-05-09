<?php

namespace App\Core\Exceptions\Business;

class EnumIncorrectTypeException extends BusinessException
{
    protected $code = 422;
    protected $message = "Incorrect type enum";
}
