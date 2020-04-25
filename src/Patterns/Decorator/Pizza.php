<?php
declare(strict_types=1);

namespace App\Patterns\Decorator;

class Pizza implements PizzaInterface
{
    protected PizzaInterface $pizza;

    public function __construct(?PizzaInterface $pizza = null)
    {
        $this->pizza = $pizza ?? $this;
    }

    public function getDescription(): string
    {
        return 'Вкусная пицца';
    }

    public function getCost(): int
    {
        return 100;
    }
}