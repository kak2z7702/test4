<?php

namespace App\Exceptions\Business;

use Exception;

class EnumValueNotFoundException extends Exception
{
    protected $message = 'Enum value not found';
}
