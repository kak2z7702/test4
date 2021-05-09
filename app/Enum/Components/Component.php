<?php
declare(strict_types=1);

namespace App\Enum\Components;

use App\Enum\Base\EnumValue;

interface Component
{
    public function label(): string;

}
