<?php
declare(strict_types=1);

namespace App\Patterns\Builder\Hata;

use App\Patterns\Builder\AbstractBuilder;
use App\Patterns\Builder\VO\BuildVO;
use Cynephy6\DrawHelperBundle\Services\DrawService;

class HataBuilder extends AbstractBuilder
{
    public function __construct()
    {
        $vo = new BuildVO();
        $vo->fileName = "img/hata.png";
        $vo->width = 200;
        $vo->height = 200;
        $vo->heightRoof = 100;
        $vo->heightWall = 100;
        $vo->heightBasement = 0;
        $vo->windowCount = 0;
        $vo->roofColor = [121, 85, 72, 0];
        $vo->wallColor = [255, 255, 255, 0];
        parent::__construct($vo);
    }

    public function drawRoof(): void
    {
        DrawService::triangleIso(
            $this->image,
            0,
            $this->vo->heightRoof,
            $this->vo->width,
            -100,
            $this->roofColor,
            $this->roofColor
        );
    }

    public function drawWall(): void
    {
        DrawService::rect(
            $this->image,
            0,
            $this->vo->calcOffsetWall(),
            $this->vo->width-1,
            $this->vo->heightWall-1,
            $this->textColor,
            $this->wallColor
        );
    }

    public function drawDoor(): void
    {
        DrawService::rect(
            $this->image,
            60,
            $this->vo->calcOffsetWall() + 20,
            80,
            $this->vo->heightWall - 20,
            $this->doorColor,
            $this->doorColor
        );
    }

    public function build(): string
    {
        $this->prepareImage();
        $this->drawRoof();
        $this->drawWall();
        $this->drawDoor();
        $this->saveImage();

        return $this->vo->fileName;
    }

    protected function drawWindows(): void
    {
        // ignored
    }

    protected function drawBasement(): void
    {
        // ignored
    }
}