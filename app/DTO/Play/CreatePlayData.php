<?php

namespace App\DTO\Play;

use App\Http\Requests\Play\CreateRequest;
use Belamov\PostgresRange\Ranges\DateRange;
use Carbon\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

class CreatePlayData extends DataTransferObject
{
    public string $name;
    public DateRange $playDates;

    public static function fromRequest(CreateRequest $request): self
    {
        return new self([
            'name' => $request->post('name'),
            'playDates' => new DateRange(
                Carbon::createFromTimestamp($request->post('start_at')),
                Carbon::createFromTimestamp($request->post('end_at')),
            )
        ]);
    }

}