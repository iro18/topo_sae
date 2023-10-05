<?php
# src/EventSubscriber/EasyAdminSubscriber.php
namespace App\EventSubscriber;

use App\Entity\CommentaireRoute;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class EasyAdminSubscriber implements EventSubscriberInterface
{

    private $passwordEncoder;

    public function __construct(UserPasswordHasherInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['attributeUserToCommentaire'],
        ];
    }

    public function attributeUserToCommentaire(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if ($entity instanceof \App\Entity\CommentaireRoute) {
        // Permet de réccupérer l'ID user pour les pages persos
         //$idUserOption = $this->getUser()->getIdOptionsClient()->getId() ;
         // dd($event);
           /* $plainPassword = $entity->getPassword();
            if ($plainPassword) {
                $hashedPassword = $this->passwordEncoder->hashPassword($entity, $plainPassword);
                $entity->setPassword($hashedPassword);
            }*/
        }
    }
}