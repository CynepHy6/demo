<?php
declare(strict_types=1);

namespace App\Patterns\Builder;

use App\Patterns\Builder\VO\BuildVO;

abstract class AbstractBuilder implements BuilderInterface
{
    protected BuildVO $vo;
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
    /** @var false|int */
    protected $textColor;

    public function __construct(BuildVO $build)
    {
        $this->vo = $build;
    }

    public function build(): string
    {
        $this->prepareImage();
        $this->drawRoof();
        $this->drawWall();
        $this->drawWindows();
        $this->drawDoor();
        $this->drawBasement();
        $this->saveImage();

        return $this->vo->fileName;
    }

    protected function prepareImage(): void
    {
        $this->image = imagecreatetruecolor($this->vo->width, $this->vo->height);

        $this->roofColor = imagecolorallocatealpha($this->image, ...$this->vo->roofColor);
        $this->wallColor = imagecolorallocatealpha($this->image, ...$this->vo->wallColor);
        $this->windowColor = imagecolorallocatealpha($this->image, ...$this->vo->windowColor);
        $this->doorColor = imagecolorallocatealpha($this->image, ...$this->vo->doorColor);
        $this->basementColor = imagecolorallocatealpha($this->image, ...$this->vo->basementColor);
        $this->backgroundColor = imagecolorallocatealpha($this->image, ...$this->vo->backgroundColor);
        $this->textColor = imagecolorallocatealpha($this->image, ...$this->vo->textColor);

        imagesavealpha($this->image, true);
        imagefill($this->image, 0, 0, $this->backgroundColor);
    }

    protected function saveImage(): void
    {
        imagestring($this->image, 2, 0, 0, $this->vo->fileName, $this->textColor);
        imagepng($this->image, $this->vo->fileName);
        chmod($this->vo->fileName, 0644);
    }

    abstract protected function drawRoof(): void;

    abstract protected function drawWall(): void;

    abstract protected function drawDoor(): void;

    abstract protected function drawWindows(): void;

    abstract protected function drawBasement(): void;
}