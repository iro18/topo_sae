<?php

namespace App\Controller;

use App\Entity\Route as RouteSae;
use App\Entity\CommentaireRoute;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class RouteController extends AbstractController
{
    #[Route('/route', name: 'app_route')]
    public function index(): Response
    {
        return $this->render('route/index.html.twig', [
            'controller_name' => 'RouteController',
        ]);
    }

    #[Route('/route/{id}', name: 'voir_route')]
   	public function show_route(EntityManagerInterface $em, int $id): Response
    {	
    	$route = $em->getRepository(RouteSae::class)->find($id);


    	$commentaires = $em->getRepository(CommentaireRoute::class)->findBy(['commentaires_route' => $id]);

        return $this->render('route/route.html.twig', [
            'controller_name' => 'RouteController',
            'route' => $route,
            'commentaires' => $commentaires,
        ]);
    }
}
