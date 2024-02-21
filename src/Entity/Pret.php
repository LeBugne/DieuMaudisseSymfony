<?php

namespace App\Entity;

use App\Repository\PretRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PretRepository::class)]
class Pret extends Prestations
{
    #[ORM\Column(nullable: true)]
    private ?int $duree_pret = null;

    #[ORM\Column(nullable: true)]
    private ?int $status_pret = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDureePret(): ?int
    {
        return $this->duree_pret;
    }

    public function setDureePret(?int $duree_pret): static
    {
        $this->duree_pret = $duree_pret;

        return $this;
    }

    public function getStatusPret(): ?int
    {
        return $this->status_pret;
    }

    public function setStatusPret(?int $status_pret): static
    {
        $this->status_pret = $status_pret;

        return $this;
    }
}
