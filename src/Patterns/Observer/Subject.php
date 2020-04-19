<?php
declare(strict_types=1);

namespace App\Patterns\Observer;

interface Subject
{
    public function registerObserver(Observer $o): void;

    public function removeObserver(Observer $o): void;

    public function notifyObservers(): void;
}