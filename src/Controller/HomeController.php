<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Route as RouteSae;
use Doctrine\ORM\EntityManagerInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EntityManagerInterface $em): Response
    {
    	$routes = $em->getRepository(RouteSae::class)->findAll();
    	$statsRoutes = [
    		'R4' => 0,
    		'R5' => 0,
    		'R6' => 0,
    		'R7' => 0,
    		'R8' => 0,
    	];
    	 foreach ($routes as $key => $value) {
    		$statsRoutes['R'.$value->getCotation()[0]]++;
    	}


        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'routes' => $routes,
            'statsRoute' => $statsRoutes,
        ]);
    }
}
