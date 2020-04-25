<?php
declare(strict_types=1);

namespace App\Patterns\AbstractFactory\Linux;

use App\Patterns\AbstractFactory\ButtonInterface;

class LinuxButton implements ButtonInterface
{
    public function render(): string
    {
        return '<button>Linux button</button>';
    }
}