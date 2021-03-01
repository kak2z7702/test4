<?php

namespace App\Models;

use Belamov\PostgresRange\Casts\DateRangeCast;
use Belamov\PostgresRange\Ranges\DateRange;
use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Play
 * @package App\Models
 * @mixin Eloquent
 *
 * @property int $id
 * @property string $name
 * @property DateRange $play_dates
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Play extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'play_range_at',
    ];

    protected $casts = [
        'play_dates' => DateRangeCast::class,
    ];


}