<?php
declare(strict_types=1);

namespace App\Patterns\Decorator\Decorators;

use App\Patterns\Decorator\Pizza;

class PizzaCheese extends Pizza
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