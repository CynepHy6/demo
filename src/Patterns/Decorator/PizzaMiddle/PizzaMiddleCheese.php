<?php
declare(strict_types=1);

namespace App\Patterns\Decorator\PizzaMiddle;


use App\Patterns\Decorator\Pizza;

class PizzaMiddleCheese implements Pizza
{
    /** @var Pizza */
    private Pizza $pizza;

    public function __construct(Pizza $pizza)
    {
        $this->pizza = $pizza;
    }

    public function getDescription(): string
    {
        return $this->pizza->getDescription() . 'С сыром. ';
    }

    public function getCost(): int
    {
        return $this->pizza->getCost() + 30;
    }
}