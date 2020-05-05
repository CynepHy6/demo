<?php
declare(strict_types=1);

namespace App\Patterns\Decorator\Decorators;

use App\Patterns\Decorator\Enum\PizzaTypeEnum;
use App\Patterns\Decorator\Pizza;
use App\Patterns\Decorator\PizzaNotFoundException;

class PizzaBecon extends Pizza
{
    public function getDescription(): string
    {
        return "{$this->pizza->getDescription()}, c ветчиной";
    }

    public function getCost(): int
    {
        if (null === $pizzaPrice = $this->repository->findByType(PizzaTypeEnum::BECON)) {
            throw new PizzaNotFoundException('Ингридиент не найден');
        }
        return $this->pizza->getCost() + $pizzaPrice->getPrice();
    }
}