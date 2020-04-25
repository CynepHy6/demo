<?php
declare(strict_types=1);

namespace App\Patterns\AbstractFactory\Mac;


use App\Patterns\AbstractFactory\ButtonInterface;
use App\Patterns\AbstractFactory\GuiFactoryInterface;

class MacFactory implements GuiFactoryInterface
{
    public function createButton(): ButtonInterface
    {
        return new MacButton();
    }

    public function getOsName(): string
    {
        return 'Mac OS';
    }
}