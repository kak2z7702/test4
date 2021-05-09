<?php


namespace App\Models;


use App\Enum\ComponentEnum;
use Belamov\PostgresRange\Casts\DateRangeCast;
use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Component
 * @package App\Models
 * @mixin Eloquent
 *
 * @property int $id
 * @property ComponentEnum $type
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */

class Component extends Model
{
    // TODO прочитать документацию создание моделей https://laravel.su/docs/6.x/eloquent
    // TODO carbon (data, time)
    protected $fillable = [
        'type',
    ];

    //TODO https://laravel.su/docs/8.x/eloquent-mutators
    protected $casts = [
        'type' => ComponentEnum::class,
    ];

    public function test(){

    }
}


