<?php
declare(strict_types=1);

namespace App\Patterns\AbstractFactory\Mac;

use App\Patterns\AbstractFactory\ButtonInterface;

class MacButton implements ButtonInterface
{

    public function render(): string
    {
        return '<button>Mac button</button>';
    }
}