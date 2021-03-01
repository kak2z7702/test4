<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class MessageResource
 * @package App\Core\Http\Resources
 * @property string $message
 */
class MessageResource extends JsonResource
{
    public function __construct(string $message)
    {
        parent::__construct((object) [
            'message' => $message
        ]);
    }

    public function toArray($request)
    {
        return [
            'message' => $this->message,
        ];
    }
}
