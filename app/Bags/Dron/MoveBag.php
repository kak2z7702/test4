<?php

namespace App\Bags\Dron;

use App\Bags\IDataBag;
use App\Enum\Base\EnumValue;
use App\Enum\Dron\DronMoves;
use App\Enum\Dron\Move\DronMove;
use App\Exceptions\Business\EnumValueNotFoundException;
use App\Http\Requests\Dron\MoveRequest;
use Iterator;

class MoveBag implements IDataBag, Iterator
{
    private int $position = 0;

    /** @var array|DronMove[] */
    protected array $items = [];

    public function __construct()
    {
        $this->position = 0;
    }

    /**
     * @param  DronMove|EnumValue  $item
     */
    public function add(DronMove $item): void
    {
        $this->items[] = $item;
    }

    public function formatted(): array
    {
        $result = [];
        foreach ($this->items as $item) {
            $result[] = (object) $item->formatted();
        }
        return $result;
    }

    public function current(): DronMove
    {
        return $this->items[$this->position];
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function key(): int
    {
        return $this->position;
    }

    public function valid(): bool
    {
        return isset($this->items[$this->position]);
    }

    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * @param  MoveRequest  $moveRequest
     * @return static
     * @throws EnumValueNotFoundException
     */
    public static function fromMoveRequest(MoveRequest $moveRequest): self
    {
        $bag = new self();

        foreach ($moveRequest->post('commands') as $move){
            $bag->add(DronMoves::searchByName($move));
        }
        return $bag;
    }

}