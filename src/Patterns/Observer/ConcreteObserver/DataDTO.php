<?php
declare(strict_types=1);

namespace App\Patterns\Observer\ConcreteObserver;

use App\Patterns\Observer\Data;

class DataDTO implements Data
{
    public int $someData1;
    public string $someData2;
    public float $someData3;

    public function __construct(int $someData1, string $someData2, float $someData3)
    {
        $this->someData1 = $someData1;
        $this->someData2 = $someData2;
        $this->someData3 = $someData3;
    }

    public function getData1(): int
    {
        return $this->someData1;
    }

    public function getData2(): string
    {
        return $this->someData2;
    }

    public function getData3(): float
    {
        return $this->someData3;
    }
}