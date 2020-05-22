<?php
declare(strict_types=1);

namespace App\Patterns\Decorator;

interface PizzaInterface
{
    public function getDescription(): string;

    public function getCost(): int;
}
