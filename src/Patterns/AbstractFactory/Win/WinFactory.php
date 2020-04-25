<?php
declare(strict_types=1);

namespace App\Patterns\AbstractFactory\Win;

use App\Patterns\AbstractFactory\ButtonInterface;
use App\Patterns\AbstractFactory\GuiFactoryInterface;

class WinFactory implements GuiFactoryInterface
{
    public function createButton(): ButtonInterface
    {
        return new WinButton();
    }

    public function getOsName(): string
    {
        return 'Windows';
    }
}