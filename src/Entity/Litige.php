<?php

namespace App\Entity;

use App\Repository\LitigeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LitigeRepository::class)]
class Litige
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 2056, nullable: true)]
    private ?string $descr_litige = null;

    #[ORM\Column(nullable: true)]
    private ?int $status_litige = null;

    #[ORM\OneToMany(targetEntity: Reclamation::class, mappedBy: 'litige', orphanRemoval: true)]
    private Collection $reclamations;

    #[ORM\ManyToOne(inversedBy: 'litiges')]
    private ?Administrateur $administrateur = null;

    #[ORM\OneToMany(targetEntity: Prestations::class, mappedBy: 'litige')]
    private Collection $prestations;

    public function __construct()
    {
        $this->reclamations = new ArrayCollection();
        $this->prestations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescrLitige(): ?string
    {
        return $this->descr_litige;
    }

    public function setDescrLitige(?string $descr_litige): static
    {
        $this->descr_litige = $descr_litige;

        return $this;
    }

    public function getStatusLitige(): ?int
    {
        return $this->status_litige;
    }

    public function setStatusLitige(?int $status_litige): static
    {
        $this->status_litige = $status_litige;

        return $this;
    }

    /**
     * @return Collection<int, Reclamation>
     */
    public function getReclamations(): Collection
    {
        return $this->reclamations;
    }

    public function addReclamation(Reclamation $reclamation): static
    {
        if (!$this->reclamations->contains($reclamation)) {
            $this->reclamations->add($reclamation);
            $reclamation->setIdLitige($this);
        }

        return $this;
    }

    public function removeReclamation(Reclamation $reclamation): static
    {
        if ($this->reclamations->removeElement($reclamation)) {
            // set the owning side to null (unless already changed)
            if ($reclamation->getIdLitige() === $this) {
                $reclamation->setIdLitige(null);
            }
        }

        return $this;
    }

    public function getIdAdministrateur(): ?Administrateur
    {
        return $this->administrateur;
    }

    public function setIdAdministrateur(?Administrateur $administrateur): static
    {
        $this->administrateur = $administrateur;

        return $this;
    }

    /**
     * @return Collection<int, Prestations>
     */
    public function getPrestations(): Collection
    {
        return $this->prestations;
    }

    public function addPrestation(Prestations $prestation): static
    {
        if (!$this->prestations->contains($prestation)) {
            $this->prestations->add($prestation);
            $prestation->setIdLitige($this);
        }

        return $this;
    }

    public function removePrestation(Prestations $prestation): static
    {
        if ($this->prestations->removeElement($prestation)) {
            // set the owning side to null (unless already changed)
            if ($prestation->getIdLitige() === $this) {
                $prestation->setIdLitige(null);
            }
        }

        return $this;
    }
}
