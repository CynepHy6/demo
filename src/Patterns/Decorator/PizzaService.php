<?php
declare(strict_types=1);

namespace App\Managers;

namespace App\Patterns\Decorator;

use App\Patterns\Decorator\Decorators\PizzaBecon;
use App\Patterns\Decorator\Decorators\PizzaCheese;
use App\Patterns\Decorator\Decorators\PizzaFat;
use App\Patterns\Decorator\Decorators\PizzaSlim;

class PizzaService
{

    public function getPizza(int $type): ?PizzaInterface
    {
        $pizza = null;
        switch ($type) {
            case PizzaEnum::FAT_BECON:
                $pizza = new PizzaFat(new PizzaInterfaceBase());
                $pizza = new PizzaBecon($pizza);
                break;
            case PizzaEnum::FAT_CHEESE:
                $pizza = new PizzaFat(new PizzaInterfaceBase());
                $pizza = new PizzaCheese($pizza);
                break;
            case PizzaEnum::SLIM_BECON:
                $pizza = new PizzaSlim(new PizzaInterfaceBase());
                $pizza = new PizzaBecon($pizza);
                break;
            case PizzaEnum::SLIM_CHEESE:
                $pizza = new PizzaSlim(new PizzaInterfaceBase());
                $pizza = new PizzaCheese($pizza);
                break;
            case PizzaEnum::DOUBLE_FAT_BECON:
                $pizza = new PizzaFat(new PizzaInterfaceBase());
                $pizza = new PizzaBecon($pizza);
                $pizza = new PizzaBecon($pizza);
                break;
            case PizzaEnum::DOUBLE_FAT_CHEESE:
                $pizza = new PizzaFat(new PizzaInterfaceBase());
                $pizza = new PizzaCheese($pizza);
                $pizza = new PizzaCheese($pizza);
                break;
            case PizzaEnum::DOUBLE_SLIM_BECON:
                $pizza = new PizzaSlim(new PizzaInterfaceBase());
                $pizza = new PizzaBecon($pizza);
                $pizza = new PizzaBecon($pizza);
                break;
            case PizzaEnum::DOUBLE_SLIM_CHEESE:
                $pizza = new PizzaSlim(new PizzaInterfaceBase());
                $pizza = new PizzaCheese($pizza);
                $pizza = new PizzaCheese($pizza);
                break;
        }

        return $pizza;
    }
}