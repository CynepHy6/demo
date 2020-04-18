<?php
declare(strict_types=1);

namespace App\Patterns\Decorator\PizzaBottom;

use App\Patterns\Decorator\PizzaBase;

class PizzaSlim extends PizzaBase
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