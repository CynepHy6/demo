<?php
declare(strict_types=1);

namespace App\Managers;

namespace App\Managers;

use App\Patterns\AbstractFactory\Android\AndroidFactory;
use App\Patterns\AbstractFactory\GuiFactory;
use App\Patterns\AbstractFactory\Linux\LinuxFactory;
use App\Patterns\AbstractFactory\Mac\MacFactory;
use App\Patterns\AbstractFactory\Unknown\UnknownFactory;
use App\Patterns\AbstractFactory\Win\WinFactory;
use App\Patterns\Decorator\Pizza;
use App\Patterns\Decorator\PizzaBase;

class PatternManager
{
    /**
     * Фабричный метод возвращающий соответствующую фабрику
     *
     * @return GuiFactory
     */
    public function getFactory(): GuiFactory
    {
        $agent = $_SERVER['HTTP_USER_AGENT'];

        if (false !== stripos($agent, 'windows')) {
            return new WinFactory();
        }
        if (false !== stripos($agent, 'android')) {
            return new AndroidFactory();
        }
        if (false !== stripos($agent, 'linux')) {
            return new LinuxFactory();
        }
        if (false !== stripos($agent, 'safari')
            || false !== stripos($agent, 'Mac OS')) {
            return new MacFactory();
        }
        return new UnknownFactory();
    }

    public function getPizza(): Pizza
    {
        return new PizzaBase();
    }
}