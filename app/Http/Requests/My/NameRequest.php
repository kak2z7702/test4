<?php

namespace App\Http\Requests\My;

use App\Http\Requests\ApiRequest;

class NameRequest extends ApiRequest
{
    public function nameRequest()
    {
        return [
            'name' => ['string'],
        ];
    }
}

/*class NameRequest extends ApiRequest
{
    public function nameRequest()
    {
        return [
            'name' => ['string'],
            'id' => ['string'],
        ];
    }
}*/
