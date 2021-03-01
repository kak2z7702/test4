<?php


namespace App\Http\Responses;

use App\Exceptions\Http\ResponseCantBeCreatedException;
use App\Http\Responses\Statuses\ErrorStatus;
use App\Http\Responses\Statuses\Status;
use App\Http\Responses\Statuses\SuccessStatus;
use App\Http\Responses\Statuses\ValidationErrorStatus;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class ApiResponse extends JsonResponse
{
    public function __construct(?JsonResource $data, Status $status, $headers = [], $options = 0)
    {
        $headers['Content-Type'] = 'application/json';
        parent::__construct($this->wrap($data, $status), $status->httpCode(), $headers, $options);
    }

    /**
     * @param JsonResource $data
     * @param int $httpCode
     * @return ApiResponse
     * @throws ResponseCantBeCreatedException
     */
    public static function success(JsonResource $data, int $httpCode = Response::HTTP_OK): ApiResponse
    {
        return new ApiResponse($data, new SuccessStatus($httpCode));
    }

    /**
     * @param int $httpCode
     * @return ApiResponse
     * @throws ResponseCantBeCreatedException
     */
    public static function null(int $httpCode = Response::HTTP_OK): ApiResponse
    {
        return new ApiResponse(null, new SuccessStatus($httpCode));
    }

    /**
     * @param JsonResource $data
     * @param int $httpCode
     * @return ApiResponse
     * @throws ResponseCantBeCreatedException
     */
    public static function error(JsonResource $data, int $httpCode = Response::HTTP_INTERNAL_SERVER_ERROR): ApiResponse
    {
        return new ApiResponse($data, new ErrorStatus($httpCode));
    }

    /**
     * @param JsonResource $data
     * @return ApiResponse
     */
    public static function validationError(JsonResource $data) : ApiResponse
    {
        return new ApiResponse($data, new ValidationErrorStatus());
    }

    private function wrap($data, Status $status)
    {
        return [
            'status' => $status->toString(),
            'result' => $data
        ];
    }

    public function toArray(): array
    {
        return json_decode($this->getContent(), true);
    }
}
