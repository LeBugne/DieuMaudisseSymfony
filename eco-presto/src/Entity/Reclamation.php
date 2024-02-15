<?php

namespace App\Entity;

use App\Repository\ReclamationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReclamationRepository::class)]
class Reclamation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_reclamation = null;

    #[ORM\ManyToOne(inversedBy: 'reclamations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $utilisateur = null;

    #[ORM\ManyToOne(inversedBy: 'reclamations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Litige $litige = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateReclamation(): ?\DateTimeInterface
    {
        return $this->date_reclamation;
    }

    public function setDateReclamation(?\DateTimeInterface $date_reclamation): static
    {
        $this->date_reclamation = $date_reclamation;

        return $this;
    }

    public function getIdUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setIdUtilisateur(?Utilisateur $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getIdLitige(): ?Litige
    {
        return $this->litige;
    }

    public function setIdLitige(?Litige $litige): static
    {
        $this->litige = $litige;

        return $this;
    }
}
