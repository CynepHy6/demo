<?php
declare(strict_types=1);

namespace App\Patterns\AbstractFactory\Android;

use App\Patterns\AbstractFactory\Button;
use App\Patterns\AbstractFactory\GuiFactory;

class AndroidFactory implements GuiFactory
{
    public function createButton(): Button
    {
        return new AndroidButton();
    }

    public function getOsName(): string
    {
        return 'Android';
    }
}