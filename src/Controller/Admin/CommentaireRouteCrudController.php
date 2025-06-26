<?php

namespace App\Controller\Admin;

use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use App\Entity\CommentaireRoute;
use App\Entity\User;
use App\Entity\Route as RouteSae;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Orm\EntityRepository;
use Symfony\Component\Security\Core\Security;
use Doctrine\ORM\EntityManagerInterface;

class CommentaireRouteCrudController extends AbstractCrudController
{
    private $security;
    private $em;

    public function __construct(Security $security, EntityManagerInterface $em)
    {
        $this->security = $security;
        $this->em = $em;
    }

    public static function getEntityFqcn(): string
    {
        return CommentaireRoute::class;
    }

    public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    {
        $user = $this->security->getUser();
        $hasAccess = $this->isGranted('ROLE_ADMIN');
        $qb = $this->container->get(EntityRepository::class)->createQueryBuilder($searchDto, $entityDto, $fields, $filters);
        if (!$hasAccess){
            $qb->andWhere('entity.user_commentaire = :user');
            $qb->setParameter('user', $this->getUser());
        }
        return $qb;
    }
    
    public function configureFields(string $pageName): iterable
    {
        $someRepository = $this->em->getRepository(User::class);
        yield TextField::new('prenom') ;
        yield  TextEditorField::new('commentaire');
        yield  AssociationField::new('commentaires_route');
        yield  DateTimeField::new('createAt')->hideOnForm();
        yield  AssociationField::new('user_commentaire')->hideOnForm()/*->setQueryBuilder(
                          fn(QueryBuilder $queryBuilder) => $queryBuilder->andWhere('entity.id = :user')
                                       ->setParameter('user', $this->getUser()) )*/
                     
        ;
    }
         public function createEntity(string $entityFqcn)
    {
        $comment = new CommentaireRoute();
        $comment->setUserCommentaire($this->getUser());

        return $comment;
    }
        
}
