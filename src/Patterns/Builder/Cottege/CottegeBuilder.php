<?php
declare(strict_types=1);

namespace App\Patterns\Builder\Cottege;

use App\Patterns\Builder\AbstractBuilder;

class CottegeBuilder extends AbstractBuilder
{

    public function __construct()
    {
        $this->fileName = 'img/cottege_design.png';
    }
}