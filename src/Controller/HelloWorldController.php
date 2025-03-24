<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HelloWorldController extends AbstractController
{
    #[Route('/hello/world', name: 'app_hello_world')]
    public function index(): Response
    {
        return $this->render('hello_world/index.html.twig', [
            'controller_name' => __CLASS__,
            'data' => [
                "1984, écrit par George Orwell",
                "Le Seigneur des Anneaux, écrit par J.R.R. Tolkien",
                "Dune, écrit par Frank Herbert",
                "Les Misérables, écrit par Victor Hugo",
                "Fondation, écrit par Isaac Asimov"
            ]
        ]);
    }
}
