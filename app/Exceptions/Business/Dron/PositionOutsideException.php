<?php

namespace App\Exceptions\Business\Dron;

use App\Exceptions\Business\BusinessException;

class PositionOutsideException extends BusinessException
{
    protected $message = 'Position is outside';
    protected $code = 422;

}