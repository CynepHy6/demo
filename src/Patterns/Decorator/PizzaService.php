<?php
declare(strict_types=1);

namespace App\Managers;

namespace App\Patterns\Decorator;

use App\Patterns\Decorator\Decorators\PizzaBecon;
use App\Patterns\Decorator\Decorators\PizzaCheese;
use App\Patterns\Decorator\Decorators\PizzaFat;
use App\Patterns\Decorator\Decorators\PizzaSlim;
use App\Patterns\Decorator\Enum\PizzaEnum;
use App\Repository\PizzaRepository;

class PizzaService
{
    private PizzaRepository $repository;

    public function __construct(PizzaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getPizza(int $type): ?PizzaInterface
    {
        $pizza = new Pizza(null, $this->repository);
        switch ($type) {
            case PizzaEnum::FAT_BECON:
                $pizza = new PizzaFat($pizza, $this->repository);
                $pizza = new PizzaBecon($pizza, $this->repository);
                break;
            case PizzaEnum::FAT_CHEESE:
                $pizza = new PizzaFat($pizza, $this->repository);
                $pizza = new PizzaCheese($pizza, $this->repository);
                break;
            case PizzaEnum::SLIM_BECON:
                $pizza = new PizzaSlim($pizza, $this->repository);
                $pizza = new PizzaBecon($pizza, $this->repository);
                break;
            case PizzaEnum::SLIM_CHEESE:
                $pizza = new PizzaSlim($pizza, $this->repository);
                $pizza = new PizzaCheese($pizza, $this->repository);
                break;
            case PizzaEnum::DOUBLE_BECON_FAT:
                $pizza = new PizzaFat($pizza, $this->repository);
                $pizza = new PizzaBecon($pizza, $this->repository);
                $pizza = new PizzaBecon($pizza, $this->repository);
                break;
            case PizzaEnum::DOUBLE_CHEESE_FAT:
                $pizza = new PizzaFat($pizza, $this->repository);
                $pizza = new PizzaCheese($pizza, $this->repository);
                $pizza = new PizzaCheese($pizza, $this->repository);
                break;
            case PizzaEnum::DOUBLE_BECON_SLIM:
                $pizza = new PizzaSlim($pizza, $this->repository);
                $pizza = new PizzaBecon($pizza, $this->repository);
                $pizza = new PizzaBecon($pizza, $this->repository);
                break;
            case PizzaEnum::DOUBLE_CHEESE_SLIM:
                $pizza = new PizzaSlim($pizza, $this->repository);
                $pizza = new PizzaCheese($pizza, $this->repository);
                $pizza = new PizzaCheese($pizza, $this->repository);
                break;
            default:
                $pizza = null;
        }
        return $pizza;
    }
}