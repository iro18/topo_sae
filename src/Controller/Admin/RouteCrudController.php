<?php

namespace App\Controller\Admin;

use App\Entity\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class RouteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Route::class;
    }


    public function configureFields(string $pageName): iterable
    {
        
       // yield IdField::new('id') ;
        yield TextField::new('name') ;
        yield  TextField::new('couleur');
        yield  TextField::new('cotation');
        yield  TextField::new('relai');
        yield  TextEditorField::new('description');
        yield  BooleanField::new('isActive');
        /*yield  AssociationField::new('user_commentaire')->hideOnForm()/*->setQueryBuilder(
                          fn(QueryBuilder $queryBuilder) => $queryBuilder->andWhere('entity.id = :user')
                                       ->setParameter('user', $this->getUser()) )*/
                     
        
    }

}
