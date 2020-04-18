<?php
declare(strict_types=1);

namespace App\Managers;

namespace App\Patterns\Decorator;

use App\Patterns\Decorator\PizzaBottom\PizzaFat;
use App\Patterns\Decorator\PizzaBottom\PizzaSlim;
use App\Patterns\Decorator\PizzaMiddle\PizzaBecon;
use App\Patterns\Decorator\PizzaMiddle\PizzaCheese;

class PizzaService
{

    public function getPizza(int $type): ?Pizza
    {
        $pizza = null;
        switch ($type) {
            case PizzaEnum::FAT_BECON:
                $pizza = new PizzaFat(new PizzaBase());
                $pizza = new PizzaBecon($pizza);
                break;
            case PizzaEnum::FAT_CHEESE:
                $pizza = new PizzaFat(new PizzaBase());
                $pizza = new PizzaCheese($pizza);
                break;
            case PizzaEnum::SLIM_BECON:
                $pizza = new PizzaSlim(new PizzaBase());
                $pizza = new PizzaBecon($pizza);
                break;
            case PizzaEnum::SLIM_CHEESE:
                $pizza = new PizzaSlim(new PizzaBase());
                $pizza = new PizzaCheese($pizza);
                break;
            case PizzaEnum::DOUBLE_FAT_BECON:
                $pizza = new PizzaFat(new PizzaBase());
                $pizza = new PizzaBecon($pizza);
                $pizza = new PizzaBecon($pizza);
                break;
            case PizzaEnum::DOUBLE_FAT_CHEESE:
                $pizza = new PizzaFat(new PizzaBase());
                $pizza = new PizzaCheese($pizza);
                $pizza = new PizzaCheese($pizza);
                break;
            case PizzaEnum::DOUBLE_SLIM_BECON:
                $pizza = new PizzaSlim(new PizzaBase());
                $pizza = new PizzaBecon($pizza);
                $pizza = new PizzaBecon($pizza);
                break;
            case PizzaEnum::DOUBLE_SLIM_CHEESE:
                $pizza = new PizzaSlim(new PizzaBase());
                $pizza = new PizzaCheese($pizza);
                $pizza = new PizzaCheese($pizza);
                break;
        }

        return $pizza;
    }
}