<?php
declare(strict_types=1);

namespace App\Patterns\Builder\Cottege;

use App\Patterns\Builder\AbstractBuilder;
use App\Patterns\Builder\DTO\BuildDTO;

class CottegeBuilder extends AbstractBuilder
{

    public function __construct()
    {
        $dto = new BuildDTO();
        $dto->fileName = 'img/cottege_design.png';
        parent::__construct($dto);
    }
}