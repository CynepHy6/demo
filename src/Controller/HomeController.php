<?php
declare(strict_types=1);

namespace App\Controller;

use App\Patterns\AbstractFactory\FactoryService;
use App\Patterns\Decorator\PizzaEnum;
use App\Patterns\Decorator\PizzaService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private FactoryService $factoryService;
    private PizzaService $pizzaService;

    public function __construct(FactoryService $factoryService, PizzaService $pizzaService)
    {
        $this->factoryService = $factoryService;
        $this->pizzaService = $pizzaService;
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