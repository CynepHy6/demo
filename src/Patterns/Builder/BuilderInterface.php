<?php
declare(strict_types=1);

namespace App\Patterns\Builder;

interface BuilderInterface
{
    public function build(): string;
}