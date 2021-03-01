<?php

namespace App\Exceptions\Business;

class InvalidLoginOrPassword extends BusinessException
{
    protected $code = '401';
    protected $message = 'Invalid login or password';
}
