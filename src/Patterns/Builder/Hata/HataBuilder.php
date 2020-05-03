<?php
declare(strict_types=1);

namespace App\Patterns\Builder\Hata;

use App\Patterns\Builder\AbstractBuilder;

class HataBuilder extends AbstractBuilder
{
    public function __construct()
    {
        $this->fileName = 'img/hata_design.png';
    }
}