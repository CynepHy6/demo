<?php
declare(strict_types=1);

namespace App\Patterns\AbstractFactory\Android;

use App\Patterns\AbstractFactory\ButtonInterface;

class AndroidButton implements ButtonInterface
{
    public function render(): string
    {
        return '<button>Android button</button>';
    }
}