<?php

namespace App\Http\Responses\Statuses;

interface Status
{
    public function toString(): string;
    public function httpCode(): int;
}
