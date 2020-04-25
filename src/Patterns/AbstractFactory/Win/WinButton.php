<?php
declare(strict_types=1);

namespace App\Patterns\AbstractFactory\Win;


use App\Patterns\AbstractFactory\ButtonInterface;

class WinButton implements ButtonInterface
{
    public function render(): string
    {
        return '<button>Windows button</button>';
    }
}