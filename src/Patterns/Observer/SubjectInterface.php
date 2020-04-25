<?php
declare(strict_types=1);

namespace App\Patterns\Observer;

interface SubjectInterface
{
    public function registerObserver(ObserverInterface $o): void;

    public function removeObserver(ObserverInterface $o): void;

    public function notifyObservers(): void;
}