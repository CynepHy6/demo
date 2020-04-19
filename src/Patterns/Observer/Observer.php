<?php
declare(strict_types=1);

namespace App\Patterns\Observer;

interface Observer
{
    public function update(Data $data): void;
}