<?php
declare(strict_types=1);

namespace App\Managers;

namespace App\Patterns\Observer;

use App\Patterns\Observer\ConcreteObserver\Observer1;
use App\Patterns\Observer\ConcreteObserver\Observer2;
use App\Patterns\Observer\ConcreteObserver\Observer3;
use App\Patterns\Observer\Producer\Producer;
use Exception;

class ProducerService
{
    /** @var Producer */
    private Producer $producer;

    public function __construct(Producer $producer)
    {
        $this->producer = $producer;
    }

    public function run(): void
    {
        $logFile = '/tmp/observer.log';
        file_put_contents($logFile, '');
        $o1 = new Observer1($logFile);
        $o2 = new Observer2($logFile);
        $o3 = new Observer3($logFile);
        $randomInt = 0;
        for ($i = 0; $i < 10; $i++) {
            try {
                $randomInt = random_int(2, 4);
            } catch (Exception $e) {
                // ignored
            }
            if ($randomInt % 2 === 0) {
                $this->producer->registerObserver($o1);
            } else {
                $this->producer->removeObserver($o1);
            }
            try {
                $randomInt = random_int(3, 6);
            } catch (Exception $e) {
                // ignored
            }
            if ($randomInt % 3 === 0) {
                $this->producer->registerObserver($o2);
            } else {
                $this->producer->removeObserver($o2);
            }
            try {
                $randomInt = random_int(4, 8);
            } catch (Exception $e) {
                // ignored
            }
            if ($randomInt % 4 === 0) {
                $this->producer->registerObserver($o3);
            } else {
                $this->producer->removeObserver($o3);
            }

            $this->producer->mainMethod();
        }
    }
}
