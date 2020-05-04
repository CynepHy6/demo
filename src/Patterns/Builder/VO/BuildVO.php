<?php
declare(strict_types=1);

namespace App\Patterns\Builder\VO;

class BuildVO
{
    public string $fileName = 'img/design.png';
    public int $width;
    public int $height;
    public int $heightRoof;
    public int $heightWall;
    public int $heightBasement;
    public int $windowCount;
    public array $roofColor = [255, 0, 0, 0];
    public array $wallColor = [24, 100, 8, 0];
    public array $windowColor = [0, 0, 208, 0];
    public array $doorColor = [0, 0, 8, 0];
    public array $basementColor = [0, 0, 255, 0];
    public array $backgroundColor = [0, 0, 0, 127];
    public array $textColor = [0, 0, 0, 0];

    public function calcOffsetWall(): int
    {
        return $this->heightRoof;
    }

    public function calcOffsetRoof(): int
    {
        return 0;
    }

    public function calcOffsetBasement(): int
    {
        return $this->heightRoof + $this->heightWall;
    }
}