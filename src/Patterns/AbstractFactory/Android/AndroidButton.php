<?php
declare(strict_types=1);

namespace App\Patterns\AbstractFactory\Android;

use App\Patterns\AbstractFactory\Button;

class AndroidButton implements Button
{
    public function render(): string
    {
        return '<button>Android button</button>';
    }
}