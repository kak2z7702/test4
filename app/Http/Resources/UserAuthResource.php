<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class UserResource
 * @package App\Http\Resources
 * @mixin User
 */
class UserAuthResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'api_token' => $this->api_token,
        ];
    }
}
