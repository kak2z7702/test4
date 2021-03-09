<?php

namespace App\Http\Resources\Dron;

use App\DTO\Dron\Position;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class PositionResource
 * @package App\Http\Resources\Dron
 * @mixin Position
 */
class PositionResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'x' => $this->xPos,
            'y' => $this->yPos,
        ];
    }
}