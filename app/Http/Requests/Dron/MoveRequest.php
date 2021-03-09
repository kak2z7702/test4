<?php

namespace App\Http\Requests\Dron;

use App\Bags\Dron\MoveBag;
use App\Enum\Dron\DronMoves;
use App\Exceptions\Business\EnumValueNotFoundException;
use App\Http\Requests\ApiRequest;
use Illuminate\Validation\Rules\In;

class MoveRequest extends ApiRequest
{

    public function rules()
    {
        return [
            'commands' => ['array', 'required', new In(DronMoves::asNameFormatted())],
        ];
    }


    /**
     * @return MoveBag
     * @throws EnumValueNotFoundException
     */
    public function bag(): MoveBag
    {
        return MoveBag::fromMoveRequest($this);
    }

    protected function prepareForValidation(): void
    {
        $this->replace(['commands' => explode(',', $this->post('commands'))]);
    }

}