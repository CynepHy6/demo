<?php
declare(strict_types=1);

namespace App\Patterns\Builder;

use App\Patterns\Builder\Cottege\CottegeBuilder;
use App\Patterns\Builder\Hata\HataBuilder;

class BuilderService
{
    public const TYPE_HATA = 1;
    public const TYPE_COTTEGE = 2;

    /**
     * @param int $type
     *
     * @return BuilderInterface
     * @throws BuilderException
     */
    public function getBuilder(int $type): BuilderInterface
    {
        switch ($type) {
            case self::TYPE_HATA:
                return new HataBuilder();
            case self::TYPE_COTTEGE:
                return new CottegeBuilder();
            default:
                throw new BuilderException("Builder type not supported");
        }
    }
}