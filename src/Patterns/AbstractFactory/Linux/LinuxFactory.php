<?php
declare(strict_types=1);

namespace App\Patterns\AbstractFactory\Linux;

use App\Patterns\AbstractFactory\ButtonInterface;
use App\Patterns\AbstractFactory\GuiFactoryInterface;

class LinuxFactory implements GuiFactoryInterface
{
    public function createButton(): ButtonInterface
    {
        return new LinuxButton();
    }

    public function getOsName(): string
    {
        return 'Linux';
    }
}