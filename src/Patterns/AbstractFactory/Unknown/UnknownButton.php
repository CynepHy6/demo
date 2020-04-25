<?php
declare(strict_types=1);

namespace App\Patterns\AbstractFactory\Unknown;

use App\Patterns\AbstractFactory\ButtonInterface;

class UnknownButton implements ButtonInterface
{
    public function render(): string
    {
        return '<button>Unknown button</button>';
    }
}