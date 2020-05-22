<?php
declare(strict_types=1);

namespace App\Controller;

use App\Patterns\AbstractFactory\FactoryService;
use App\Patterns\Builder\BuilderException;
use App\Patterns\Builder\BuilderService;
use App\Patterns\Decorator\Enum\PizzaEnum;
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
    private BuilderService $builderService;

    public function __construct(
        FactoryService $factoryService,
        PizzaService $pizzaService,
        ProducerService $observerService,
        BuilderService $builderService
    ) {
        $this->factoryService = $factoryService;
        $this->pizzaService = $pizzaService;
        $this->observerService = $observerService;
        $this->builderService = $builderService;
    }

    /**
     * @Route("/builder", name="builder")
     * @param Request $request
     *
     * @return Response
     * @throws BuilderException
     */
    public function indexBuilder(Request $request): Response
    {
        $img = null;
        if ($type = (int) $request->get('type')) {
            $builder = $this->builderService->getBuilder($type);
            $img = $builder->build();
        }

        return $this->render(
            'pattern/builder.twig',
            compact('type', 'img')
        );
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
        $type = (int) $request->get('type');
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
