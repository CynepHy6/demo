<?php
declare(strict_types=1);

namespace App\Patterns\AbstractFactory;

interface Button
{
    public function render(): string;
}