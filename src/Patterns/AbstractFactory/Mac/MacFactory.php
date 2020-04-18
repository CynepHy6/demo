<?php
declare(strict_types=1);

namespace App\Patterns\AbstractFactory\Mac;


use App\Patterns\AbstractFactory\Button;
use App\Patterns\AbstractFactory\GuiFactory;

class MacFactory implements GuiFactory
{
    public function createButton(): Button
    {
        return new MacButton();
    }

    public function getOsName(): string
    {
        return 'Mac OS';
    }
}