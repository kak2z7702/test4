<?php

namespace App\Http\Resources\Play;

use App\Models\Play;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class PlayResource
 * @package App\Http\Resources\Play
 * @mixin Play
 */
class PlayResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'start_at' => $this->play_dates->from()->timestamp,
            'end_at' => $this->play_dates->to()->timestamp,
        ];
    }
}