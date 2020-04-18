<?php
declare(strict_types=1);

namespace App\Controller;

use App\Managers\PatternManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private PatternManager $manager;

    public function __construct(PatternManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @Route("/abstract-factory", name="abstract-factory")
     */
    public function indexAbstractFactory(): Response
    {
        $factory = $this->manager->getFactory();
        return $this->render('abstract-factory/abstract-factory.twig', [
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