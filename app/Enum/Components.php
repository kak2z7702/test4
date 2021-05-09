<?php
declare(strict_types=1);

namespace App\Enum;

use App\Enum\Base\Enum;
use App\Enum\Base\EnumBase;
use App\Enum\Base\EnumValue;
use App\Enum\Components\Bread;
use App\Enum\Components\Butter;
use App\Enum\Components\Component;

class Components extends EnumBase implements Enum
{

    public static function all(): array
    {
        return [
            self::butter(),
            self::butter(),
        ];
    }

    public static function default(): EnumValue
    {
        //
    }

    /**
     * @return Component|EnumValue
     */
    public static function bread(): Component
    {
        return new Bread();
    }

    /**
     * @return Component|EnumValue
     */
    public static function butter(): Component
    {
        return new Butter();
    }

}
