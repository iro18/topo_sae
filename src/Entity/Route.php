<?php

namespace App\Entity;

use App\Repository\RouteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RouteRepository::class)]
class Route
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $couleur = null;

    #[ORM\Column(length: 255)]
    private ?string $relai = null;

    #[ORM\Column(length: 255)]
    private ?string $cotation = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Description = null;

    #[ORM\Column]
    private ?int $aime = null;

    #[ORM\Column]
    private ?int $aimepas = null;

    #[ORM\OneToMany(mappedBy: 'id_route', targetEntity: CommentaireRoute::class, orphanRemoval: true)]
    private Collection $commentaireRoutes;

    #[ORM\OneToMany(mappedBy: 'commentaires_route', targetEntity: CommentaireRoute::class)]
    private Collection $commentaires;

    #[ORM\Column]
    private ?bool $isActive = false;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ouvreur = null;

    public function __construct()
    {
        $this->commentaireRoutes = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
        $this->aime = 0;
        $this->aimepas = 0;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): static
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getRelai(): ?string
    {
        return $this->relai;
    }

    public function setRelai(string $relai): static
    {
        $this->relai = $relai;

        return $this;
    }

    public function getCotation(): ?string
    {
        return $this->cotation;
    }

    public function setCotation(string $cotation): static
    {
        $this->cotation = $cotation;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getAime(): ?int
    {
        return $this->aime;
    }

    public function setAime(int $aime): static
    {
        $this->aime = $aime;

        return $this;
    }

    public function getAimepas(): ?int
    {
        return $this->aimepas;
    }

    public function setAimepas(int $aimepas): static
    {
        $this->aimepas = $aimepas;

        return $this;
    }
    public function incrementAime(): self
    {
        $this->aime++;
        return $this;
    }
    /**
     * @return Collection<int, CommentaireRoute>
     */
    public function getCommentaireRoutes(): Collection
    {
        return $this->commentaireRoutes;
    }

    public function addCommentaireRoute(CommentaireRoute $commentaireRoute): static
    {
        if (!$this->commentaireRoutes->contains($commentaireRoute)) {
            $this->commentaireRoutes->add($commentaireRoute);
            $commentaireRoute->setIdRoute($this);
        }

        return $this;
    }

    public function removeCommentaireRoute(CommentaireRoute $commentaireRoute): static
    {
        if ($this->commentaireRoutes->removeElement($commentaireRoute)) {
            // set the owning side to null (unless already changed)
            if ($commentaireRoute->getIdRoute() === $this) {
                $commentaireRoute->setIdRoute(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CommentaireRoute>
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(CommentaireRoute $commentaire): static
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires->add($commentaire);
            $commentaire->setCommentairesRoute($this);
        }

        return $this;
    }

    public function removeCommentaire(CommentaireRoute $commentaire): static
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getCommentairesRoute() === $this) {
                $commentaire->setCommentairesRoute(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }

    public function isIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): static
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getOuvreur(): ?string
    {
        return $this->ouvreur;
    }

    public function setOuvreur(?string $ouvreur): static
    {
        $this->ouvreur = $ouvreur;

        return $this;
    }

}
