<?php
declare(strict_types=1);

namespace App\Patterns\Builder\Cottege;

use App\Patterns\Builder\AbstractBuilder;
use App\Patterns\Builder\VO\BuildVO;
use Cynephy6\DrawHelperBundle\Services\DrawService;

class CottegeBuilder extends AbstractBuilder
{
    public function __construct()
    {
        $vo = new BuildVO();
        $vo->fileName = "img/cottege.png";
        $vo->width = 800;
        $vo->height = 600;
        $vo->heightRoof = 300;
        $vo->heightWall = 200;
        $vo->heightBasement = 100;
        $vo->windowCount = 3;
        $vo->basementColor = [121, 85, 72, 0];
        $vo->wallColor = [129, 135, 129, 0];
        $vo->windowColor = [144, 203, 255, 0];
        $vo->roofColor = [160, 143, 0, 50];
        parent::__construct($vo);
    }

    public function drawRoof(): void
    {
        $widthSection = (int) ($this->vo->width / 2);
        for ($i = 0; $i < 3; $i++) {
            DrawService::triangleIso(
                $this->image,
                $i * (int) ($widthSection / 2),
                $this->vo->heightRoof,
                $widthSection,
                -$this->vo->heightRoof,
                $this->roofColor,
                $this->roofColor
            );
        }
    }

    public function drawWall(): void
    {
        DrawService::rect(
            $this->image,
            0,
            $this->vo->calcOffsetWall(),
            $this->vo->width,
            $this->vo->heightWall,
            $this->wallColor,
            $this->wallColor
        );
    }

    public function drawDoor(): void
    {
        DrawService::rect(
            $this->image,
            10,
            $this->vo->calcOffsetWall() + 50,
            100,
            $this->vo->heightWall - 50,
            $this->doorColor,
            $this->doorColor
        );
    }

    public function drawWindows(): void
    {
        $windowHeight = 100;
        $windowWidth = 100;
        $windowHorizontalOffset = 100;
        for ($i = 0; $i < $this->vo->windowCount; $i++) {
            DrawService::rect(
                $this->image,
                150 + $i * ($windowWidth + $windowHorizontalOffset),
                $this->vo->calcOffsetWall() + 50,
                $windowWidth,
                $windowHeight,
                $this->windowColor,
                $this->windowColor
            );
        }
    }

    public function drawBasement(): void
    {
        DrawService::rect(
            $this->image,
            0,
            $this->vo->calcOffsetBasement(),
            $this->vo->width,
            $this->vo->heightBasement,
            $this->basementColor,
            $this->basementColor
        );
    }
}
