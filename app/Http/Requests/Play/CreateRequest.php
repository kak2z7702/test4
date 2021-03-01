<?php

namespace App\Http\Requests\Play;

use App\DTO\Play\CreatePlayData;
use App\Http\Requests\ApiRequest;

class CreateRequest extends ApiRequest
{

    public function rules()
    {
        return [
            'name' => 'required|string',
            'start_at' => 'required|digits:10',
            'end_at' => 'required|digits:10|gt:start_at',
        ];
    }

    public function dto(): CreatePlayData
    {
        return CreatePlayData::fromRequest($this);
    }

}