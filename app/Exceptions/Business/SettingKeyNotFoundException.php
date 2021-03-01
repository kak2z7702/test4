<?php

namespace App\Exceptions\Business;

use Exception;

class SettingKeyNotFoundException extends Exception
{
    protected $code = 404;

}
