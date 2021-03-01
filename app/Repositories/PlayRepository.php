<?php

namespace App\Repositories;

use App\DTO\Play\CreatePlayData;
use App\Exceptions\Business\EntityNotFoundException;
use App\Models\Play;
use Belamov\PostgresRange\Ranges\DateRange;
use Exception;
use Illuminate\Database\Eloquent\Collection;

interface PlayRepository
{

    /**
     * @return Collection|Play[]
     */
    public function all(): Collection;

    /**
     * @param  int  $id
     * @return Play
     * @throws EntityNotFoundException
     */
    public function findById(int $id): Play;

    /**
     * @param  int  $id
     * @throws EntityNotFoundException
     * @throws Exception
     */
    public function delete(int $id): void;

    public function create(CreatePlayData $dto): Play;

    public function isOverlaps(DateRange $range): bool;

}