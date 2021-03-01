<?php

namespace App\Http\Requests\Play;

use App\Http\Requests\ApiRequest;

class DeleteRequest extends ApiRequest
{

    public function rules()
    {
        return [
            'id' => 'required|numeric|exists:plays,id'
        ];
    }

    public function id(): int
    {
        return (int)$this->route('id');
    }

    /**
     * @param  null  $keys
     * @return array|null
     */
    public function all($keys = null)
    {
        return array_replace_recursive(
            parent::all(),
            $this->route()->parameters()
        );
    }

}