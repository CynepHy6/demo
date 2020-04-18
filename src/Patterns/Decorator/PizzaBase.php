<?php
declare(strict_types=1);

namespace App\Patterns\Decorator;

class PizzaBase implements Pizza
{
    protected Pizza $pizza;

    public function __construct(?Pizza $pizza = null)
    {
        $this->pizza = $pizza ?? $this;
    }

    public function getDescription(): string
    {
        return 'Вкусная пицца';
    }

    public function getCost(): int
    {
        return 0;
    }
}