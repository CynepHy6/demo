<?php
declare(strict_types=1);

namespace App\Aspect;

use Go\Aop\Aspect;
use Go\Aop\Intercept\MethodInvocation;
use Go\Lang\Annotation\Before;
use Psr\Log\LoggerInterface;

class LoggingAspect implements Aspect
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        print "ASPECT INIT\n";
        $this->logger = $logger;
    }

    /**
     * Writes a log info before method execution
     *
     * @param MethodInvocation $invocation
     * @Before("@execution(public *->*(*))")
     */
    public function beforeMethod(MethodInvocation $invocation)
    {
        print "ASPECT FIRED in " . get_class($this) . "\n";
        $this->logger->info($invocation, $invocation->getArguments());
    }
}
