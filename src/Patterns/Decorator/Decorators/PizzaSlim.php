<?php
declare(strict_types=1);

namespace App\Patterns\Decorator\Decorators;

use App\Patterns\Decorator\PizzaInterfaceBase;

class PizzaSlim extends PizzaInterfaceBase
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