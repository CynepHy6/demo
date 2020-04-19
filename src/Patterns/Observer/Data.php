<?php
declare(strict_types=1);

namespace App\Patterns\Observer;

interface Data
{
    public function getData1(): int;

    public function getData2(): string;

    public function getData3(): float;
}