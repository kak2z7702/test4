<?php

namespace App\Exceptions\Business\Play;

use App\Exceptions\Business\BusinessException;

class PlayTimeOverlapsException extends BusinessException
{
    protected $code = 422;
    protected $message = 'The time of the play match with the other play.';

}