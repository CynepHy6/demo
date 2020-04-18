<?php
declare(strict_types=1);

namespace App\Patterns\AbstractFactory\Unknown;

use App\Patterns\AbstractFactory\Button;

class UnknownButton implements Button
{
    public function render(): string
    {
        return '<button>Unknown button</button>';
    }
}