<?php

namespace App\Models;

use App\DTO\Dron\Position;

class Territory
{

    private int $xMax;
    private int $yMax;
    private int $xMin;
    private int $yMin;

    public function __construct(int $xMax, int $yMax, int $xMin, int $yMin)
    {
        $this->xMax = $xMax;
        $this->yMax = $yMax;
        $this->xMin = $xMin;
        $this->yMin = $yMin;
    }

    public function getXMax(): int
    {
        return $this->xMax;
    }

    public function getYMax(): int
    {
        return $this->yMax;
    }

    public function getXMin(): int
    {
        return $this->xMin;
    }

    public function getYMin(): int
    {
        return $this->yMin;
    }

    public function defaultX(): int
    {
        return 0;
    }

    public function defaultY(): int
    {
        return 0;
    }


}