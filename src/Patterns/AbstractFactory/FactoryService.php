<?php
declare(strict_types=1);

namespace App\Managers;

namespace App\Patterns\AbstractFactory;

use App\Patterns\AbstractFactory\Android\AndroidFactory;
use App\Patterns\AbstractFactory\Linux\LinuxFactory;
use App\Patterns\AbstractFactory\Mac\MacFactory;
use App\Patterns\AbstractFactory\Unknown\UnknownFactory;
use App\Patterns\AbstractFactory\Win\WinFactory;

class FactoryService
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
}