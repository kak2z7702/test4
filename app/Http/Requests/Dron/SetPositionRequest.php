<?php

namespace App\Http\Requests\Dron;

use App\DTO\Dron\Position;
use App\Http\Requests\ApiRequest;

class SetPositionRequest extends ApiRequest
{

    public function rules()
    {
        return [
            'x' => 'integer|required',
            'y' => 'integer|required',
        ];
    }

    public function position(): Position
    {
        return new Position([
            'xPos' => $this->post('x'),
            'yPos' => $this->post('y'),
        ]);
    }

}