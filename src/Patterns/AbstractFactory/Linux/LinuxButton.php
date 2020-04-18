<?php
declare(strict_types=1);

namespace App\Patterns\AbstractFactory\Linux;

use App\Patterns\AbstractFactory\Button;

class LinuxButton implements Button
{
    public function render(): string
    {
        return '<button>Linux button</button>';
    }
}