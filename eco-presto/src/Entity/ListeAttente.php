<?php

namespace App\Entity;

use App\Repository\ListeAttenteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ListeAttenteRepository::class)]
class ListeAttente
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $status_attente = null;

    #[ORM\OneToMany(targetEntity: Inscription::class, mappedBy: 'liste_attente', orphanRemoval: true)]
    private Collection $inscriptions;

    #[ORM\OneToOne(mappedBy: 'liste_attente', cascade: ['persist', 'remove'])]
    private ?Prestations $prestation = null;

    public function __construct()
    {
        $this->inscriptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatusAttente(): ?int
    {
        return $this->status_attente;
    }

    public function setStatusAttente(?int $status_attente): static
    {
        $this->status_attente = $status_attente;

        return $this;
    }

    /**
     * @return Collection<int, Inscription>
     */
    public function getInscriptions(): Collection
    {
        return $this->inscriptions;
    }

    public function addInscription(Inscription $inscription): static
    {
        if (!$this->inscriptions->contains($inscription)) {
            $this->inscriptions->add($inscription);
            $inscription->setIdListeAttente($this);
        }

        return $this;
    }

    public function removeInscription(Inscription $inscription): static
    {
        if ($this->inscriptions->removeElement($inscription)) {
            // set the owning side to null (unless already changed)
            if ($inscription->getIdListeAttente() === $this) {
                $inscription->setIdListeAttente(null);
            }
        }

        return $this;
    }

    public function getPrestation(): ?Prestations
    {
        return $this->prestation;
    }

    public function setPrestation(?Prestations $prestation): static
    {
        // unset the owning side of the relation if necessary
        if ($prestation === null && $this->prestation !== null) {
            $this->prestation->setIdListeAttente(null);
        }

        // set the owning side of the relation if necessary
        if ($prestation !== null && $prestation->getIdListeAttente() !== $this) {
            $prestation->setIdListeAttente($this);
        }

        $this->prestation = $prestation;

        return $this;
    }
}
