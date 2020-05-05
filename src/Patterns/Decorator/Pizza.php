<?php
declare(strict_types=1);

namespace App\Patterns\Decorator;

use App\Patterns\Decorator\Enum\PizzaTypeEnum;
use App\Repository\PizzaRepository;

class Pizza implements PizzaInterface
{
    protected PizzaInterface $pizza;
    protected PizzaRepository $repository;

    public function __construct(?PizzaInterface $pizza, PizzaRepository $repository)
    {
        $this->pizza = $pizza ?? $this;
        $this->repository = $repository;
    }

    public function getDescription(): string
    {
        return 'Вкусная пицца';
    }

    /**
     * @return int
     * @throws PizzaNotFoundException
     */
    public function getCost(): int
    {
        if (null === $pizzaPrice = $this->repository->findByType(PizzaTypeEnum::BASE)) {
            throw new PizzaNotFoundException('Ингридиент не найден');
        }
        return $pizzaPrice->getPrice();
    }
}