<?php

namespace App\Controller\Admin;

use App\Entity\CommentaireRoute;
use App\Entity\Route as RouteSae;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class CommentaireRouteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CommentaireRoute::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
           // IdField::new('id'),
            TextField::new('prenom'),
            TextEditorField::new('commentaire'),
            AssociationField::new('commentaires_route'),
        ];
    }
        
}
