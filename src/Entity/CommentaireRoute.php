<?php

namespace App\Entity;

use App\Repository\CommentaireRouteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Route as RouteSae;

#[ORM\Entity(repositoryClass: CommentaireRouteRepository::class)]
class CommentaireRoute
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Prenom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Commentaire = null;

    #[ORM\ManyToOne(inversedBy: 'commentaires')]
    private ?RouteSae $commentaires_route = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): static
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->Commentaire;
    }

    public function setCommentaire(string $Commentaire): static
    {
        $this->Commentaire = $Commentaire;

        return $this;
    }


    public function getCommentairesRoute(): ?RouteSae
    {
        return $this->commentaires_route;
    }

    public function setCommentairesRoute(?RouteSae $commentaires_route): static
    {
        $this->commentaires_route = $commentaires_route;

        return $this;
    }
}
