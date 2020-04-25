<?php
declare(strict_types=1);

namespace App\Patterns\AbstractFactory;

interface GuiFactoryInterface
{
    public function createButton(): ButtonInterface;

    public function getOsName(): string;
}