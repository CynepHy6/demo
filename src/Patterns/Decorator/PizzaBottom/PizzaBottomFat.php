<?php
declare(strict_types=1);

namespace App\Patterns\Decorator\PizzaBottom;


use App\Patterns\Decorator\Pizza;

class PizzaBottomFat implements Pizza
{
    /** @var Pizza */
    private Pizza $pizza;

    public function __construct(Pizza $pizza)
    {
        $this->pizza = $pizza;
    }

    public function getDescription(): string
    {
        return $this->pizza->getDescription() . 'На толстой основе. ';
    }

    public function getCost(): int
    {
        return $this->pizza->getCost() + 80;
    }
}