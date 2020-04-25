<?php
declare(strict_types=1);

namespace App\Patterns\AbstractFactory\Android;

use App\Patterns\AbstractFactory\ButtonInterface;
use App\Patterns\AbstractFactory\GuiFactoryInterface;

class AndroidFactory implements GuiFactoryInterface
{
    public function createButton(): ButtonInterface
    {
        return new AndroidButton();
    }

    public function getOsName(): string
    {
        return 'Android';
    }
}