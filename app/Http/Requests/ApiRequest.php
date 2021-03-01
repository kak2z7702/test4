<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Http\Resources\ValidationErrorResource;
use App\Http\Responses\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class ApiRequest extends FormRequest
{
    /**
     * Determine if user authorized to make this request
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @param null $guard
     * @return User
     */
    public function user($guard = null): User
    {
        /** @var User $user */
        $user = parent::user($guard);

        return $user;
    }

    /**
     * If validator fails return the exception in json form
     * @param Validator $validator
     * @return void
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            ApiResponse::validationError(
                new ValidationErrorResource($validator->errors()
                )
            )
        );
    }

    abstract public function rules();
}

