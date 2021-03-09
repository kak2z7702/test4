<?php

namespace App\DTO\Dron;

use Spatie\DataTransferObject\DataTransferObject;

class Position extends DataTransferObject
{
    public int $xPos;
    public int $yPos;


}