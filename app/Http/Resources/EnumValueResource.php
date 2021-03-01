<?php

namespace App\Http\Resources;

use App\Enum\Base\EnumValue;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class EnumValueResource
 * @package App\Http\Resources
 *
 * @property EnumValue $resource
 */
class EnumValueResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'value' => $this->resource->value(),
            'name' => $this->resource->name(),
        ];
    }

}
