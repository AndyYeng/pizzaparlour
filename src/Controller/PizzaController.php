<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Entity\Pizzas;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PizzaController extends AbstractController
{
    #[Route('/pizza', name: 'app_pizza')]
    public function index(): Response
    {
        return $this->render('pizza/index.html.twig', [
            'controller_name' => 'PizzaController',
        ]);
    }
    #[Route('/categories', name: 'app_categories')]
    public function categories(EntityManagerInterface $entityManager,): Response
    {
        $category = $entityManager->getRepository(Categories::class)->findAll();
        return $this->render('pizza/categorie.html.twig', [
            'categories' => $category,
        ]);
    }
    #[Route('/categorie/{id}', name: 'app_category')]
    public function categorie(EntityManagerInterface $entityManager, int $id): Response
    {
        $category = $entityManager->getRepository(Categories::class)->find($id);
        return $this->render('pizza/pizzas.html.twig', [
            'categories' => $category,
        ]);
    }
    #[Route('/pizzas/{id}', name: 'app_pizzas')]
    public function pizzas(EntityManagerInterface $entityManager, int $id): Response
    {
        $pizzas = $entityManager->getRepository(Pizzas::class)->find($id);
        return $this->render('pizza/pizzas.html.twig', [
            'pizzas' => $pizzas,
        ]);
    }
    #[Route('/bestelling', name: 'app_takeout')]
    public function takeout(): Response
    {

        return $this->render('pizza/takeout.html.twig', [
            'controller_name' => 'PizzaController',
        ]);
    }
}
