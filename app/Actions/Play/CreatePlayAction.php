<?php

namespace App\Actions\Play;

use App\DTO\Play\CreatePlayData;
use App\Exceptions\Business\Play\PlayTimeOverlapsException;
use App\Models\Play;
use App\Repositories\PlayRepository;

class CreatePlayAction
{
    private PlayRepository $playRepository;

    public function __construct(PlayRepository $playRepository)
    {
        $this->playRepository = $playRepository;
    }

    /**
     * @param  CreatePlayData  $data
     * @return Play
     * @throws PlayTimeOverlapsException
     */
    public function execute(CreatePlayData $data): Play
    {
        if($this->playRepository->isOverlaps($data->playDates)){
            throw new PlayTimeOverlapsException();
        }
        return $this->playRepository->create($data);
    }
}