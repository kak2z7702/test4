<?php
declare(strict_types=1);

namespace App\Exceptions\Business;

class ObjectNotExistsException extends BusinessException
{
    protected $code = 404;
}
