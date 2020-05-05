<?php
declare(strict_types=1);

namespace App\Patterns\Decorator\Decorators;

use App\Patterns\Decorator\Enum\PizzaTypeEnum;
use App\Patterns\Decorator\Pizza;
use App\Patterns\Decorator\PizzaNotFoundException;

class PizzaCheese extends Pizza
{
    public function getDescription(): string
    {
        return "{$this->pizza->getDescription()}, c сыром";
    }

    public function getCost(): int
    {
        if (null === $pizzaPrice = $this->repository->findByType(PizzaTypeEnum::CHEESE)) {
            throw new PizzaNotFoundException('Ингридиент не найден');
        }
        return $this->pizza->getCost() + $pizzaPrice->getPrice();
    }
}