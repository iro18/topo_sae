<?php

namespace App\Entity;

use App\Repository\BlocRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlocRepository::class)]
class Bloc
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $Couleur = null;

    #[ORM\Column(length: 10)]
    private ?string $cotation = null;

    #[ORM\Column]
    private ?bool $isActive = false;

    #[ORM\Column]
    private ?bool $isDepartAssis = false;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $intructionDepart = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photoBloc = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->Couleur;
    }

    public function setCouleur(string $Couleur): static
    {
        $this->Couleur = $Couleur;

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

    public function isIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): static
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function isIsDepartAssis(): ?bool
    {
        return $this->isDepartAssis;
    }

    public function setIsDepartAssis(bool $isDepartAssis): static
    {
        $this->isDepartAssis = $isDepartAssis;

        return $this;
    }

    public function getIntructionDepart(): ?string
    {
        return $this->intructionDepart;
    }

    public function setIntructionDepart(?string $intructionDepart): static
    {
        $this->intructionDepart = $intructionDepart;

        return $this;
    }

    public function getPhotoBloc(): ?string
    {
        return $this->photoBloc;
    }

    public function setPhotoBloc(?string $photoBloc): static
    {
        $this->photoBloc = $photoBloc;

        return $this;
    }
}
