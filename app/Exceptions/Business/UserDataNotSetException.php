<?php

namespace App\Exceptions\Business;

use Exception;

class UserDataNotSetException extends Exception
{
    protected $code = 404;

}
