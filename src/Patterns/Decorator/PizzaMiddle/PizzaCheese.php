<?php
declare(strict_types=1);

namespace App\Patterns\Decorator\PizzaMiddle;

use App\Patterns\Decorator\PizzaBase;

class PizzaCheese extends PizzaBase
{
    public function getDescription(): string
    {
        return "{$this->pizza->getDescription()}, c сыром";
    }

    public function getCost(): int
    {
        return $this->pizza->getCost() + 70;
    }
}