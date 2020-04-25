<?php
declare(strict_types=1);

namespace App\Patterns\AbstractFactory;

interface ButtonInterface
{
    public function render(): string;
}