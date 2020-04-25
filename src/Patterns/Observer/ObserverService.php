<?php
declare(strict_types=1);

namespace App\Managers;

namespace App\Patterns\Observer;

use App\Patterns\Observer\ConcreteObserver\ObserverInterface1;
use App\Patterns\Observer\ConcreteObserver\ObserverInterface2;
use App\Patterns\Observer\ConcreteObserver\ObserverInterface3;
use App\Patterns\Observer\ConcreteObserver\SomeProducer;

class ObserverService
{
    /** @var SomeProducer */
    private SomeProducer $producer;

    public function __construct(SomeProducer $producer)
    {
        $this->producer = $producer;
    }

    public function run(): void
    {
        $logFile = __DIR__ . '/../../../public/observer.log';
        file_put_contents($logFile, '');
        $o1 = new ObserverInterface1($logFile);
        $o2 = new ObserverInterface2($logFile);
        $o3 = new ObserverInterface3($logFile);
        for ($i = 0; $i < 10; $i++) {
            $count = random_int(2, 4);
            if ($count % 2 === 0) {
                $this->producer->registerObserver($o1);
            } else {
                $this->producer->removeObserver($o1);
            }
            $count = random_int(3, 6);
            if ($count % 3 === 0) {
                $this->producer->registerObserver($o2);
            } else {
                $this->producer->removeObserver($o2);
            }
            $count = random_int(4, 8);
            if ($count % 4 === 0) {
                $this->producer->registerObserver($o3);
            } else {
                $this->producer->removeObserver($o3);
            }
            $this->producer->mainMethod();
        }
    }
}