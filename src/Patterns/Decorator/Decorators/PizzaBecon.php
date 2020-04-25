<?php
declare(strict_types=1);

namespace App\Patterns\Decorator\Decorators;

use App\Patterns\Decorator\Pizza;

class PizzaBecon extends Pizza
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