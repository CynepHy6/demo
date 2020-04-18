<?php
declare(strict_types=1);

namespace App\Patterns\AbstractFactory;

interface GuiFactory
{
    public function createButton(): Button;

    public function getOsName(): string;
}