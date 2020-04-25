<?php
declare(strict_types=1);

namespace App\Controller;

use App\Patterns\AbstractFactory\FactoryService;
use App\Patterns\Decorator\PizzaEnum;
use App\Patterns\Decorator\PizzaService;
use App\Patterns\Observer\ProducerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private FactoryService $factoryService;
    private PizzaService $pizzaService;
    private ProducerService $observerService;

    public function __construct(
        FactoryService $factoryService,
        PizzaService $pizzaService,
        ProducerService $observerService
    ) {
        $this->factoryService = $factoryService;
        $this->pizzaService = $pizzaService;
        $this->observerService = $observerService;
    }

    /**
     * @Route("/builder", name="builder")
     *
     * @return Response
     */
    public function indexBuilder(): Response
    {

        return $this->render('pattern/builder.twig');
    }

    /**
     * @Route("/observer", name="observer")
     *
     * @return Response
     */
    public function indexObserver(): Response
    {
        $this->observerService->run();
        $log = null;
        $logPath = __DIR__ . '/../../public/observer.log';
        if (file_exists($logPath)) {
            $log = file_get_contents($logPath);
        }
        return $this->render('pattern/observer.twig', [
            'log' => $log,
        ]);
    }

    /**
     * @Route("/decorator", name="decorator")
     * @param Request $request
     *
     * @return Response
     */
    public function indexDecorator(Request $request): Response
    {
        $type = (int)$request->get('type');
        $pizza = $this->pizzaService->getPizza($type);
        return $this->render('pattern/decorator.twig', [
            'pizza' => $pizza,
            'pizzaType' => new PizzaEnum(),
        ]);
    }

    /**
     * @Route("/abstract-factory", name="abstract-factory")
     */
    public function indexAbstractFactory(): Response
    {
        $factory = $this->factoryService->getFactory();
        return $this->render('pattern/abstract-factory.twig', [
            'button' => $factory->createButton(),
            'os' => $factory->getOsName(),
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home.twig');
    }
}