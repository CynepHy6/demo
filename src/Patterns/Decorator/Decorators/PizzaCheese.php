<?php
declare(strict_types=1);

namespace App\Patterns\Decorator\Decorators;

use App\Patterns\Decorator\PizzaInterfaceBase;

class PizzaCheese extends PizzaInterfaceBase
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