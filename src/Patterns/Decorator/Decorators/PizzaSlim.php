<?php
declare(strict_types=1);

namespace App\Patterns\Decorator\Decorators;

use App\Patterns\Decorator\Pizza;

class PizzaSlim extends Pizza
{
    public function getDescription(): string
    {
        return "{$this->pizza->getDescription()}, на тонкой основе";
    }

    public function getCost(): int
    {
        return $this->pizza->getCost() + 50;
    }
}