<?php
declare(strict_types=1);

namespace App\Patterns\Observer\ConcreteObserver;

namespace App\Patterns\Observer\ConcreteObserver;

use App\Patterns\Observer\Data;
use App\Patterns\Observer\Observer;

class Observer3 implements Observer
{
    private string $logFile;

    public function __construct(string $log)
    {
        $this->logFile = $log;
    }

    public function update(Data $data): void
    {
        $name = __METHOD__;
        file_put_contents($this->logFile, "$name: {$data->getData3()}<br>\n", FILE_APPEND);
    }
}