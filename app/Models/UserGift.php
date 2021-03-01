<?php

namespace App\Models;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Collection;

/**
 * Class UserGift
 * @package App\Models
 * @mixin Eloquent
 *
 * @property int $id
 * @property int $user_id
 * @property int $status
 *
 * @property int $giftable_id
 * @property string $giftable_type
 *
 * @property-read GiftMoney|GiftPoint|GiftThing $giftable
 * @property-read User $user
 * @property-read Collection|DeliveryLog[] $deliveryLogs
 * @property-read Collection|PayoutLog[] $payoutLogs
 * @property-read PointLog $pointLog
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class UserGift extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $table = 'user_gifts';
    protected $fillable = [
        'user_id',
        'status',
        'giftable_id',
        'giftable_type',
    ];

    public function giftable(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'giftable_type', 'giftable_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function pointLog(): HasOne
    {
        return $this->hasOne(PointLog::class);
    }

    public function deliveryLogs(): HasMany
    {
        return $this->hasMany(DeliveryLog::class);
    }

    public function payoutLogs(): HasMany
    {

        return $this->hasMany(DeliveryLog::class);
    }

}
