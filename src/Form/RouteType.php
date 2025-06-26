<?php
namespace App\Form;

use App\Entity\Route;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RouteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // Ajoutez les autres champs ici, mais pas le champ "id"
            ->add('name') // Exemple : un champ "name"
            ->add('couleur') // Exemple : un champ "description"
            ->add('cotation'); // Exemple : un champ "description"
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Route::class,
        ]);
    }
}
?>