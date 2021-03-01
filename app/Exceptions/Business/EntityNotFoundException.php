<?php

namespace App\Exceptions\Business;

class EntityNotFoundException extends BusinessException
{
    protected $message = "Entity is not existed.";
}
