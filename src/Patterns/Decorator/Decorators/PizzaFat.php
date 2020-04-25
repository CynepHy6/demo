<?php
declare(strict_types=1);

namespace App\Patterns\Decorator\Decorators;

use App\Patterns\Decorator\PizzaInterfaceBase;

class PizzaFat extends PizzaInterfaceBase
{
    public function getDescription(): string
    {
        return "{$this->pizza->getDescription()}, на толстой основе";
    }

    public function getCost(): int
    {
        return $this->pizza->getCost() + 40;
    }
}