<?php
declare(strict_types=1);

namespace App\Patterns\Builder\Hata;

use App\Patterns\Builder\AbstractBuilder;
use App\Patterns\Builder\DTO\BuildDTO;

class HataBuilder extends AbstractBuilder
{
    public function __construct()
    {
        $dto = new BuildDTO();
        $dto->fileName = 'img/hata_design.png';
        $dto->windowNumber = 1;
        parent::__construct($dto);
    }
}