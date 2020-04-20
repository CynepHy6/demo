<?php
declare(strict_types=1);

namespace App\Patterns\Builder;

interface Builder
{
    public function step1();
    public function step2();
    public function step3();
}