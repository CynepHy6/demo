<?php
declare(strict_types=1);

namespace App\Patterns\AbstractFactory\Unknown;


use App\Patterns\AbstractFactory\Button;
use App\Patterns\AbstractFactory\GuiFactory;

class UnknownFactory implements GuiFactory
{
    public function createButton(): Button
    {
        return new UnknownButton();
    }

    public function getOsName(): string
    {
        return 'XZ';
    }
}