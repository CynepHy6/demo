<?php
declare(strict_types=1);

namespace App\Patterns\Builder;

abstract class AbstractBuilder implements BuilderInterface
{

    protected int $width = 800;
    protected int $height = 600;
    protected string $fileName = 'img/design.png';
    /** @var false|resource */
    protected $image;

    public function build(): string
    {
        $this->createImage();
        $this->drawRoof();
        $this->drawWall();
        $this->drawWindows();
        $this->drawBasement();
        $this->saveImage();

        return $this->fileName;
    }

    protected  function createImage(): void
    {
        $this->image = imagecreatetruecolor($this->width, $this->height);
    }

    protected function saveImage(): void
    {
        imagepng($this->image, $this->fileName);
        chmod($this->fileName, 0644);
    }

    protected  function drawRoof()
    {
    }

    protected  function drawWall()
    {

    }

    protected  function drawWindows()
    {

    }

    protected  function drawBasement()
    {

    }
}