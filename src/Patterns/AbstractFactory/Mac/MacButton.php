<?php
declare(strict_types=1);

namespace App\Patterns\AbstractFactory\Mac;

use App\Patterns\AbstractFactory\Button;

class MacButton implements Button
{

    public function render(): string
    {
        return '<button>Mac button</button>';
    }
}