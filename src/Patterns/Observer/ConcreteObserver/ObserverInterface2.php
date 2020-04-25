<?php
declare(strict_types=1);

namespace App\Patterns\Observer\ConcreteObserver;

namespace App\Patterns\Observer\ConcreteObserver;

use App\Patterns\Observer\DataInterface;
use App\Patterns\Observer\ObserverInterface;

class ObserverInterface2 implements ObserverInterface
{
    private string $logFile;

    public function __construct(string $log)
    {
        $this->logFile = $log;
    }

    public function update(DataInterface $data): void
    {
        $name = __METHOD__;
        file_put_contents($this->logFile, "$name: {$data->getData2()}<br>\n", FILE_APPEND);
    }
}