<?php

namespace App\Entity;

use App\Repository\AdministrateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdministrateurRepository::class)]

class Administrateur extends Personne
{
    #[ORM\OneToMany(targetEntity: Litige::class, mappedBy: 'administrateur')]
    private Collection $litiges;

    public function __construct()
    {
        $this->litiges = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Litige>
     */
    public function getLitiges(): Collection
    {
        return $this->litiges;
    }

    public function addLitige(Litige $litige): static
    {
        if (!$this->litiges->contains($litige)) {
            $this->litiges->add($litige);
            $litige->setIdAdministrateur($this);
        }

        return $this;
    }

    public function removeLitige(Litige $litige): static
    {
        if ($this->litiges->removeElement($litige)) {
            // set the owning side to null (unless already changed)
            if ($litige->getIdAdministrateur() === $this) {
                $litige->setIdAdministrateur(null);
            }
        }

        return $this;
    }
}
