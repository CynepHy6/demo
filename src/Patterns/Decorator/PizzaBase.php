<?php
declare(strict_types=1);

namespace App\Patterns\Decorator;

class PizzaBase implements Pizza
{
    public function getDescription(): string
    {
        return 'Вкусная пицца. ';
    }

    public function getCost(): int
    {
        return 0;
    }
}