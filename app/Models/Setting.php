<?php

namespace App\Models;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Setting
 * @package App\Models
 * @mixin Eloquent
 *
 * @property int $id
 * @property string $key
 * @property string $value
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 */
class Setting extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $table = 'settings';
    protected $fillable = [
        'key',
        'value',
    ];

}
