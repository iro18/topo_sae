<?php

namespace App\Controller\Admin;

use App\Entity\Route as RouteSae;
use App\Entity\CommentaireRoute;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class DashboardController extends AbstractDashboardController
{
     public function __construct(
       private EntityManagerInterface $em,
    ){}


    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {   
        $voies = $this->em->getRepository(RouteSae::class)->findAll();

        //  return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
         //$adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
         return $this->render('admin/dash.html.twig',[
            'voies' => $voies]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Topo Sae');
    }

    public function configureMenuItems(): iterable
    {
       return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home')->setPermission('ROLE_USER'),

            MenuItem::section('Topo de la salle'),
            MenuItem::linkToCrud('Routes', 'fa fa-tags', RouteSae::class)->setPermission('ROLE_ADMIN'),
            MenuItem::linkToCrud('Commentaires', 'fa fa-tags', CommentaireRoute::class)->setPermission('ROLE_USER'),
        ];
    }
}
