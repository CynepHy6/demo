<?php
declare(strict_types=1);

namespace App\Patterns\Observer\ConcreteObserver;

use App\Patterns\Observer\Observer;
use App\Patterns\Observer\Subject;
use Exception;

class SomeProducer implements Subject
{
    private \SplObjectStorage $observers;
    private int $someData1;
    private string $someData2;
    private float $someData3;
    private bool $changed;

    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
        $this->changed = false;
    }

    public function registerObserver(Observer $o): void
    {
        $this->observers->attach($o);
    }

    public function removeObserver(Observer $o): void
    {
        if ($this->observers->contains($o)) {
            $this->observers->detach($o);
        }
    }

    public function notifyObservers(): void
    {
        if (!$this->changed) {
            return;
        }
        foreach ($this->observers as $o) {
            $o->update(new DataDTO($this->someData1, $this->someData2, $this->someData3));
        }
        $this->changed = false;
    }

    public function mainMethod(): void
    {
        try {
            $this->someData1 = random_int(-1000, 1000);
            $this->someData2 = random_bytes(20);
            $this->someData3 = random_int(-1000, 1000) / random_int(1, 1000);
            $this->changed = true;
        } catch (Exception $e) {
            // ignore
        }
        $this->notifyObservers();
    }
}