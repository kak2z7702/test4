<?php

namespace App\Enum\Dron;

use App\Enum\Base\Enum;
use App\Enum\Base\EnumBase;
use App\Enum\Base\EnumValue;
use App\Enum\Dron\Move\Down;
use App\Enum\Dron\Move\DronMove;
use App\Enum\Dron\Move\Left;
use App\Enum\Dron\Move\Right;
use App\Enum\Dron\Move\Up;
use App\Exceptions\Business\BusinessException;

class DronMoves extends EnumBase implements Enum
{

    public static function all(): array
    {
        return [
            self::down(),
            self::left(),
            self::right(),
            self::up(),
        ];
    }

    /**
     * @return EnumValue
     * @throws BusinessException
     */
    public static function default(): EnumValue
    {
        throw new BusinessException('No movement by default.');
    }

    public static function down(): DronMove
    {
        return new Down();
    }

    public static function up(): DronMove
    {
        return new Up();
    }

    public static function left(): DronMove
    {
        return new Left();
    }

    public static function right(): DronMove
    {
        return new Right();
    }

    public static function asNameFormatted(): array
    {
        $names = [];
        foreach (self::all() as $move){
            $names[] = $move->name();
        }
        return $names;
    }

}