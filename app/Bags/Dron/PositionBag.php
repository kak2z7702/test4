<?php

namespace App\Bags\Dron;

use App\Bags\IDataBag;
use App\DTO\Dron\Position;
use Iterator;

class PositionBag implements IDataBag, Iterator
{
    private int $position = 0;

    /** @var array|Position[] */
    protected array $items = [];

    public function __construct()
    {
        $this->position = 0;
    }

    public function add(Position $item): void
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

    public function current(): Position
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

}