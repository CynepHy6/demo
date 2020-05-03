<?php
declare(strict_types=1);

namespace App\Patterns\Builder;

use App\Patterns\Builder\DTO\BuildDTO;

abstract class AbstractBuilder implements BuilderInterface
{
    protected BuildDTO $dto;
    /** @var false|resource */
    protected $image;
    /** @var false|int */
    protected $roofColor;
    /** @var false|int */
    protected $wallColor;
    /** @var false|int */
    protected $backgroundColor;
    /** @var false|int */
    protected $windowColor;
    /** @var false|int */
    protected $doorColor;
    /** @var false|int */
    protected $basementColor;

    public function __construct(BuildDTO $build)
    {
        $this->dto = $build;
    }

    public function build(): string
    {
        $this->create();
        $this->drawRoof();
        $this->drawWall();
        $this->drawWindows();
        $this->drawDoor();
        $this->drawBasement();
        $this->save();

        return $this->dto->fileName;
    }

    protected function create(): void
    {
        $this->image = imagecreatetruecolor($this->dto->width, $this->dto->height);

        $this->roofColor = imagecolorallocatealpha($this->image, ...$this->dto->roofColor);
        $this->wallColor = imagecolorallocatealpha($this->image, ...$this->dto->wallColor);
        $this->windowColor = imagecolorallocatealpha($this->image, ...$this->dto->windowColor);
        $this->doorColor = imagecolorallocatealpha($this->image, ...$this->dto->doorColor);
        $this->basementColor = imagecolorallocatealpha($this->image, ...$this->dto->basementColor);
        $this->backgroundColor = imagecolorallocatealpha($this->image, ...$this->dto->backgroundColor);

        imagesavealpha($this->image, true);
        imagefill($this->image, 0, 0, $this->backgroundColor);
    }

    protected function save(): void
    {
        imagepng($this->image, $this->dto->fileName);
        chmod($this->dto->fileName, 0644);
    }

    public function drawRoof(): void
    {
        $points = [
            // x1y1
            0,
            $this->dto->height / 3,
            // x2y2
            $this->dto->width / 2,
            0,
            // x3y3
            $this->dto->width, // x3
            $this->dto->height / 3, // y3
        ];
        imagepolygon(
            $this->image,
            $points,
            count($points) / 2,
            $this->roofColor
        );
        imagefill($this->image, $this->dto->width / 2, 4, $this->roofColor);
    }

    public function drawWall(): void
    {
        $this->drawRect(100, 202, 600, 200, $this->wallColor);
        imagefill($this->image, 101, 203, $this->wallColor);
    }

    public function drawDoor(): void
    {
        $this->drawRect(200, 250, 100, 150, $this->doorColor);
    }

    public function drawWindows(): void
    {
        $this->drawRect(400, 250, 100, 100, $this->windowColor);
    }

    public function drawBasement(): void
    {
        $this->drawRect(100, 404, $this->dto->width - 200, 200, $this->basementColor);
        imagefill($this->image, 150, 450, $this->basementColor);
    }

    protected function drawRect(int $x, int $y, int $width, int $height, int $color): void
    {
        $points = [$x, $y, $x + $width, $y, $x + $width, $y + $height, $x, $y + $height];
        imagepolygon($this->image, $points, count($points) / 2, $color);
    }
}