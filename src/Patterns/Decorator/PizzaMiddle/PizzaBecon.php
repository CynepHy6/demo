<?php
declare(strict_types=1);

namespace App\Patterns\Decorator\PizzaMiddle;

use App\Patterns\Decorator\PizzaBase;

class PizzaBecon extends PizzaBase
{
    public function getDescription(): string
    {
        return "{$this->pizza->getDescription()}, c ветчиной";
    }

    public function getCost(): int
    {
        return $this->pizza->getCost() + 80;
    }
}