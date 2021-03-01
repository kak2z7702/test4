<?php

namespace App\Repositories\Eloquent;

use App\DTO\Play\CreatePlayData;
use App\Exceptions\Business\EntityNotFoundException;
use App\Models\Play;
use App\Repositories\PlayRepository;
use Belamov\PostgresRange\Ranges\DateRange;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Class EloquentPlayRepository
 * @package App\Repositories\Eloquent
 *
 * Примечание для ревьювера)
 * в данном репозитории метод create размещен преднамеренно.
 * Laravel как таковой не предусматривает создание репозиториев и сервисного слоя для создания сущностей,
 * но мне нравится когда вся работа с БД в одном месте. Поэтому я в ларке делаю что то похожее не репозиторий)
 * плюс в тестах если что можно замокать..
 */
class EloquentPlayRepository implements PlayRepository
{

    /**
     * @return Collection|Play[]
     */
    public function all(): Collection
    {
        return Play::all();
    }

    /**
     * @param  int  $id
     * @throws EntityNotFoundException
     * @throws Exception
     */
    public function delete(int $id): void
    {
        $play = Play::find($id);
        if ($play === null) {
            throw new EntityNotFoundException('Play not found');
        }
        $play->delete();
    }

    public function create(CreatePlayData $dto): Play
    {
        $play = new Play();
        $play->name = $dto->name;
        $play->play_dates = $dto->playDates;
        $play->save();
        return $play;
    }

    public function isOverlaps(DateRange $range): bool
    {
        return Play::whereRaw("play_dates && ?::daterange", [$range])->exists();
    }

    /**
     * @param  int  $id
     * @return Play
     * @throws EntityNotFoundException
     */
    public function findById(int $id): Play
    {
        $play = Play::find($id);
        if($play === null){
            throw new EntityNotFoundException();
        }
        return $play;
    }
}