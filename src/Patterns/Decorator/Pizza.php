<?php
declare(strict_types=1);

namespace App\Patterns\Decorator;


interface Pizza
{
    public function getDescription(): string;

    public function getCost(): int;
}