<?php
declare(strict_types=1);

namespace App\Patterns\AbstractFactory\Win;

use App\Patterns\AbstractFactory\Button;
use App\Patterns\AbstractFactory\GuiFactory;

class WinFactory implements GuiFactory
{
    public function createButton(): Button
    {
        return new WinButton();
    }

    public function getOsName(): string
    {
        return 'Windows';
    }
}