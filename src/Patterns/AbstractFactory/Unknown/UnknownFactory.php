<?php
declare(strict_types=1);

namespace App\Patterns\AbstractFactory\Unknown;

use App\Patterns\AbstractFactory\ButtonInterface;
use App\Patterns\AbstractFactory\GuiFactoryInterface;

class UnknownFactory implements GuiFactoryInterface
{
    public function createButton(): ButtonInterface
    {
        return new UnknownButton();
    }

    public function getOsName(): string
    {
        return 'XZ';
    }
}
