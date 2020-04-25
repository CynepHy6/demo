<?php
declare(strict_types=1);

namespace App\Patterns\Observer;

interface ObserverInterface
{
    public function update(DataInterface $data): void;
}