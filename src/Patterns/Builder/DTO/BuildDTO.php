<?php
declare(strict_types=1);

namespace App\Patterns\Builder\DTO;

class BuildDTO
{
    public string $fileName = 'img/design.png';
    public int $width = 800;
    public int $height = 600;
    public int $windowCount = 0;
    public array $roofColor = [255, 0, 0, 0];
    public array $wallColor = [24, 100, 8, 0];
    public array $windowColor = [0, 0, 8, 0];
    public array $doorColor = [0, 0, 8, 0];
    public array $basementColor = [0, 0, 255, 0];
    public array $backgroundColor = [0, 0, 0, 127];
}