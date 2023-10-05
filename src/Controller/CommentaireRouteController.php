<?php

namespace App\Controller;


use App\Entity\CommentaireRoute;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\Authentication\User\UserInterface;

class CommentaireRouteController extends AbstractController
{

	  private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    #[Route('/commentaire_route', name: 'app_commentaire_route')]
    public function index(EntityManagerInterface $em): Response
    {
    	$this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

    	$user = $this->security->getUser();
    	$userId = $user->getId();
    	


    	$commentaires = $em->getRepository(CommentaireRoute::class)->FindBy(['user_commentaire' => $userId]);
        return $this->render('commentaire_route/index.html.twig', [
            'commentaires' => $commentaires,
        ]);
    
    }


   
}
