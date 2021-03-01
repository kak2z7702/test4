<?php


namespace App\Http\Resources;

use App\Exceptions\Business\BusinessException;
use Exception;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ErrorResource
 * @package App\Core\Http\Resources
 *
 * @mixin Exception
 */
class ErrorResource extends JsonResource
{
    public function toArray($request)
    {

        return [
            'message' => $this->getMessage(),
            'code' => $this->getCode(),
            'level' => $this->resource instanceof BusinessException ? 'business' : 'service'
        ];
    }
}
