<?php
declare(strict_types=1);

namespace App\Patterns\AbstractFactory\Linux;

use App\Patterns\AbstractFactory\Button;
use App\Patterns\AbstractFactory\GuiFactory;

class LinuxFactory implements GuiFactory
{
    public function createButton(): Button
    {
        return new LinuxButton();
    }

    public function getOsName(): string
    {
        return 'Linux';
    }
}