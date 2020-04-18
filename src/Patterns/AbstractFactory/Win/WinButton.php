<?php
declare(strict_types=1);

namespace App\Patterns\AbstractFactory\Win;


use App\Patterns\AbstractFactory\Button;

class WinButton implements Button
{
    public function render(): string
    {
        return '<button>Windows button</button>';
    }
}